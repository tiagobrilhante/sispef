<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nome' => [
                'required',
            ],
            'posto_grad' => [
                'required',
            ],
            'nome_guerra' => [
                'required',
            ],
            'tel_contato' => [
                'required',

            ],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',

            ],
            'om_id' => [
                'required',
                'numeric'
            ],
            'type' =>[
                'required',
            ]


        ];
    }
}
