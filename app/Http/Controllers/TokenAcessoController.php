<?php

namespace App\Http\Controllers;


use App\Http\Requests\StoreTokenAcessoRequest;
use Auth;



class TokenAcessoController extends Controller
{

    public function store(StoreTokenAcessoRequest $request)
    {


        $token = TokenAcessoController::create($request->all());

        $user->roles()->sync($request->input('roles', []));


        $serial = guid();
        return $serial;
    }


}
