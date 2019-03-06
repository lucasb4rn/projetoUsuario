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

            'name' => 'required | max:40',
            'email' => 'required | max:40',
            'cpf' => 'required | cpf',
            'data_nascimento' => 'required',

        ];
    }

    public function messages()
        {
        return [
            'name.max' => 'O tamanho do nome pode ter no maximo 40 caracteres',
            'email.max' => 'O tamanho do email pode ter no maximo 40 caracteres',
            'name.required' => 'O Nome não pode ser vazio.',
            'email.required' => 'O Email não pode ser vazio',
            'cpf.required' => 'O CPF não pode ser vazio.',
            "cpf" => 'CPF em formato inválido, verifique.',
            "data_nascimento.required" => 'A data de nascimento não pode ser vazia.'
        ];
        }

}
