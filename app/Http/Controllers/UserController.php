<?php

namespace App\Http\Controllers;

use App\Http\Requests\SenhaRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use App\Models\UserTipo;
use Request;
use Auth;

class UserController extends Controller
{
    // chama a pagina de acesso a guarnições
    public function index()
    {

        return view('insideApp.usermanager.index');
    }

    public function alluser()
    {
        return ['data'=>User::all()->load('userTipo','Om')];
    }

    // update uma usuário
    public function update(UpdateUserRequest $request, $id)
    {
        $user = User::find($id);

        $user->update([
            'name'=>$request['name'],
            'email'=>$request['email'],
            'password' => bcrypt($request['password']),
            'comando_conjunto_id'=>$request['comando_conjunto_id']
        ]);

        return $user;

    }

    // mostra detralhes de um usuário
    public function show($id)
    {
        $user = User::find($id);

        return $user->load('userTipo','om','token');
    }


    // exclui um user
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
    }



    //update senha
    public function updatesenha(SenhaRequest $request, $id)
    {
        $user = User::find($id);

        if ($user->status == 'Resetado'){
            $novo_status = 'Ok';
        } else {
            $novo_status = $user->status;
        }

        $user->update([
            'password' => bcrypt($request['password']),
            'status'=> $novo_status
        ]);

    }

    //reset de senha
    public function resetsenha($id)
    {

        $user = User::find($id);

        if ((Auth::user()->usertipo->tipo == 'Administrador' && Auth::user()->comandoConjunto->id == $user->comandoConjunto->id ) || Auth::user()->usertipo->tipo == 'Administrador Geral'){

            $user->update([
                'password' => bcrypt($user->email),
                'status'=> 'Resetado'
            ]);

            return 'Success';

        } else {
            return 'error';
        }

    }

    // Altera o tipo de usuário (atribui status de OK se existir "Aguardando Aprovação"
    public function alteratipo($id_user_tipo)
    {

        $id_user = explode('_', $id_user_tipo)[0];
        $tipo_cru = explode('_', $id_user_tipo)[1];

        if ($tipo_cru == 'admgeral'){
            $tipo = 'Administrador Geral';
        }
        elseif ($tipo_cru == 'adm'){
            $tipo = 'Administrador';
        }
        elseif ($tipo_cru == 'ger'){
            $tipo = 'Gerente';
        }
        elseif ($tipo_cru == 'admlog'){
            $tipo = 'Administrador Logístico';
        }
        else {
            $tipo = 'Usuário';
        }

        $usertipo = UserTipo::where('user_id',$id_user)->first();
        $usertipo->update([
            'tipo' => $tipo
        ]);

        $user = User::find($id_user);
        $user->update(['status'=>'Ok']);

        return $usertipo;

    }



}
