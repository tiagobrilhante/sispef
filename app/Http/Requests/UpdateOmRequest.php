<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class UpdateOmRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => [
                'required',
            ],
            'sigla' => [
                'required',
            ],
            'eixo_x' => [
                'required',
                'numeric',
            ],
            'eixo_y' => [
                'required',
                'numeric',
            ],
            'om_id' => [
                'required'
            ]


        ];
    }
}
