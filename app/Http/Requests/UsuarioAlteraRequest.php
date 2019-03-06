<?php

namespace projetoUsuario\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

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
            'email' => [
                 'required', 'max:40', 
                  Rule::unique('usuarios')->ignore($this->id),
             ],
             'cpf' => [
                 'required', 'max:11', 'cpf',
                  Rule::unique('usuarios')->ignore($this->id),
               ],

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
            "cpf.cpf" => 'Combinação de digitos do CPF não é válida.',
            "data_nascimento.required" => 'A data de nascimento não pode ser vazia.',
            "email.unique" => 'Este email já está sendo usuado.'
        ];
        }

}
