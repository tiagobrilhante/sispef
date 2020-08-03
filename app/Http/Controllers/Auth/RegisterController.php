<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\TokenAcesso;
use App\Models\UserTipo;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nome' => ['required', 'string', 'max:255'],
            'nome_guerra' => ['required', 'string', 'max:255'],
            'posto_grad' => ['required', 'string', 'max:255'],
            'tel_contato' => ['required', 'string', 'max:255'],
            'token_serial' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {

        $le_Token = TokenAcesso::where('token', $data['token_serial'])->first();

        // crio o usuário
        $user = User::create([
            'nome' => $data['nome'],
            'posto_grad' => $data['posto_grad'],
            'nome_guerra' => $data['nome_guerra'],
            'tel_contato' => $data['tel_contato'],
            'tu_formacao' => $data['tu_formacao'],
            'status' => 'Ativo',
            'om_id' => $le_Token->om_id,
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        // crio o tipo

        $tipo = UserTipo::create([
            'tipo'=>$le_Token->type,
            'user_id'=>$user->id
        ]);

        //vinculo o token
        $le_Token->status = 'Utilizado';
        $le_Token->user_id = $user->id;
        $le_Token->save();


        return $user;
    }
}
