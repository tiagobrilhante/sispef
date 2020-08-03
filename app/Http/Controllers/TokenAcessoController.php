<?php

namespace App\Http\Controllers;


use App\Http\Requests\SerialRequest;
use App\Http\Requests\StoreTokenAcessoRequest;
use App\Models\TokenAcesso;
use App\Models\User;
use Auth;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;



class TokenAcessoController extends Controller
{

    // cria um novo token de acesso
    public function store(StoreTokenAcessoRequest $request)
    {

        $serial = guid();
        $type = $request['type'];
        $om_id = $request['om_id'];
        $reference = $request['reference'];
        $status = 'Aguardando Uso';
        $quem_gerou = Auth::user()->id;

        $token = TokenAcesso::create([
            'token'=> $serial,
            'type'=> $type,
            'reference'=> $reference,
            'om_id'=> $om_id,
            'status'=> $status,
            'quem_gerou'=> $quem_gerou,

        ]);

        return $token->load('om','geradorTokens');
    }

    // retorna os seriais para a tabela de seriais
    public function returnSeriais($tipo)
    {


        $seriais = TokenAcesso::where('status','Aguardando Uso')->get();

        // verifica os tokens e ajusta para expirado os que tiverem mais do que 10 dias
        foreach ($seriais as $serial){

            if (contatempo(explode(' ',$serial->created_at)[0],dataDeHoje()) > 10 && $serial->status != 'Utilizado'){

                $serial->status = 'Expirado';
                $serial->save();

            }

        }


        if ($tipo == 'serialtodos' ){

            $retorna_serial = TokenAcesso::all()->load('om','geradorTokens','user');

        } elseif ($tipo == 'serialusado' ) {

            $retorna_serial = TokenAcesso::where('status', 'Utilizado')->get()->load('om', 'geradorTokens', 'user');

        }
        elseif ($tipo == 'serialunused' ) {

            $retorna_serial = TokenAcesso::where('status', 'Aguardando Uso')->get()->load('om','geradorTokens','user');

        } else {

            $retorna_serial = TokenAcesso::where('status', 'Expirado')->get()->load('om','geradorTokens','user');

        }


        return ['data'=>$retorna_serial];

    }

    //renova uma chave de acesso
    public function renewToken($id)
    {

        $token = TokenAcesso::find($id);
        $token->status = 'Aguardando Uso';
        $token->created_at = Carbon::today()->toDateTimeString();
        $token->quem_gerou = Auth::user()->id;
        $token->save();

        return $token->load('om','geradorTokens','user');


    }

    // exclui um token
    public function destroy($id)
    {
        $token = TokenAcesso::find($id);

        if ($token->user_id != null){

            return 'Token já utilizado! não é possível a sua remoção.';

        } else {

            $token->quem_gerou = Auth::user()->id;
            $token->save();
            $token->delete();

            return 'Ok';

        }



    }


    public function getSerial(SerialRequest $request)
    {


        $seriais = TokenAcesso::where('status','Aguardando Uso')->get();

        // verifica os tokens e ajusta para expirado os que tiverem mais do que 10 dias
        foreach ($seriais as $serial){

            if (contatempo(explode(' ',$serial->created_at)[0],dataDeHoje()) > 10){

                $serial->status = 'Expirado';
                $serial->save();

            }

        }

        $token = TokenAcesso::where('token', $request['serial'])->first();

        if ($token){

            if ($token->status == 'Expirado'){
                return 'Serial Expirado';
            } elseif ($token->status == 'Utilizado'){
                return 'Serial em uso';
            } else {
                return $token->load('om','geradorTokens');
            }

        } else {

            return 'Token Inexistente';

        }



    }
}
