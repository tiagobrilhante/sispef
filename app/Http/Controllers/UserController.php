<?php

namespace App\Http\Controllers;

use App\Http\Requests\SenhaRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use App\Models\UserTipo;
use Request;
use Auth;
use Illuminate\Database\Eloquent\Builder;

class UserController extends Controller
{
    // chama a pagina de acesso a guarnições
    public function index()
    {

        return view('insideApp.usermanager.index');
    }

    // retorna dados de usuários para a montagem da tabela em usermanager
    public function alluser($tipo)
    {



        if ($tipo == 'todos'){

            return ['data' => User::all()->load('userTipo', 'Om')];

        } else {

            if ($tipo == 'admin'){
                $retorno = 'Administrador';
            }
            if ($tipo == 'visu'){
                $retorno = 'Visualizador';
            }
            if ($tipo == 'pef'){
                $retorno = 'Cmt / Scmt PEF';
            }

            $users = User::whereHas('userTipo', function (Builder $query)use($retorno) {
                $query->where('tipo', $retorno);
            })->get();

            return ['data' => $users->load('userTipo', 'Om')];
        }


    }

    // update uma usuário
    public function update(UpdateUserRequest $request, $id)
    {
        $user = User::find($id);

        $user->update([
            'nome' => $request['nome'],
            'nome_guerra' => $request['nome_guerra'],
            'posto_grad' => $request['posto_grad'],
            'tel_contato' => $request['tel_contato'],
            'om_id' => $request['om_id']
        ]);

        if ($user->email != $request['email']){
            $user->update([
                'email'=>$request['email']
            ]);
        }

        $type_user = UserTipo::where('user_id', $id)->first();
        $type_user->tipo = $request['type'];
        $type_user->save();

        return $user->load('om', 'userTipo');

    }

    // mostra detralhes de um usuário
    public function show($id)
    {
        $user = User::find($id);

        return $user->load('userTipo', 'om', 'token.geradorTokens.om');
    }

    // exclui um user
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
    }

    // desativa ou ativa um user
    public function mudaStatus($id)
    {
        $user = User::find($id);

        if ($user->status == 'Inativo') {

            $user->status = 'Ativo';
            $user->save();

        } elseif ($user->status == 'Ativo') {

            $user->status = 'Inativo';
            $user->save();

        }

        return $user;

    }

    //update senha (Falta Fazer)
    public function updatesenha(SenhaRequest $request, $id)
    {
        $user = User::find($id);

        if ($user->status == 'Resetado') {
            $novo_status = 'Ok';
        } else {
            $novo_status = $user->status;
        }

        $user->update([
            'password' => bcrypt($request['password']),
            'status' => $novo_status
        ]);

    }

    //reset de senha (Falta Fazer)
    public function resetsenha($id)
    {

        $user = User::find($id);

        if ((Auth::user()->usertipo->tipo == 'Administrador' && Auth::user()->comandoConjunto->id == $user->comandoConjunto->id) || Auth::user()->usertipo->tipo == 'Administrador Geral') {

            $user->update([
                'password' => bcrypt($user->email),
                'status' => 'Resetado'
            ]);

            return 'Success';

        } else {
            return 'error';
        }

    }


}
