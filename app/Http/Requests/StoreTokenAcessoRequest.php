<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class StoreTokenAcessoRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'token' => [
                'required',
            ],
            'type' => [
                'required',
            ],
            'reference' => [
                'required',
            ],
            'om_id' => [
                'required'
            ]


        ];
    }
}
