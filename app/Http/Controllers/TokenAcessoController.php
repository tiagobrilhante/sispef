<?php

namespace App\Http\Controllers;


use App\Http\Requests\StoreTokenAcessoRequest;
use App\Models\TokenAcesso;
use Auth;
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

        $token = TokenAcesso::create([
            'token'=> $serial,
            'type'=> $type,
            'reference'=> $reference,
            'om_id'=> $om_id,
            'status'=> $status,

        ]);

        return $token;
    }


}
