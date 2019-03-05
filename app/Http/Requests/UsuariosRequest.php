<?php

namespace projetoUsuario\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsuariosRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [

            'name' => 'required | max:100',
            'email' => 'required | max:100',
            'cpf' => 'required | cpf',
            'data_nascimento' => 'required',
            'password' => 'required | min:8',
            'password1' => 'required | min:8 | same:password'

        ];
    }

    public function messages()
        {
        return [
            'required' => 'The :attribute field can not be empty.',
            "cpf" => 'CPF inválido',
        ];
        }

}
