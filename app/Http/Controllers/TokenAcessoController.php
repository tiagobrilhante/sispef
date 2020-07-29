<?php

namespace App\Http\Controllers;


use App\Http\Requests\StoreTokenAcessoRequest;
use App\Models\TokenAcesso;
use Auth;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;



class TokenAcessoController extends Controller
{

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

        return $token;
    }

    // retorna os seriais para a tabela de seriais
    public function returnSeriais($tipo)
    {

        $seriais = TokenAcesso::all();

        // verifica os tokens e ajusta para expirado os que tiverem mais do que 10 dias
        foreach ($seriais as $serial){

            if (contatempo(explode(' ',$serial->created_at)[0],dataDeHoje()) > 10){

                $serial->status = 'Expirado';
                $serial->save();

            }

        }

        $retorna_serial = TokenAcesso::all()->load('om','geradorTokens','user');

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

        return ['data'=>$token->load('om','geradorTokens','user')];


    }

}
