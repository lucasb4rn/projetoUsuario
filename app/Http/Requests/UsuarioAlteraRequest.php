<?php

namespace projetoUsuario\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UsuarioAlteraRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [

            'name' => 'required | max:100',
            //'email' => 'required | unique:usuarios,email,$this->id,id| max:100',
            'cpf' => 'required | cpf',
            'data_nascimento' => 'required',

        ];
    }

    public function messages()
        {
        return [
            'required' => 'O campo :attribute não pode ser vazio.',
            "cpf" => 'CPF inválido',
        ];
        }

}
