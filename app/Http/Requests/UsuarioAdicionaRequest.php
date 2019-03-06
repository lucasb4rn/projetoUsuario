<?php

namespace projetoUsuario\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class UsuarioAdicionaRequest extends FormRequest
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
            'password' => 'required | min:8',
            'password1' => 'required | min:8 | same:password'

        ];
    }

    public function messages()
        {
        return [
            'name.required' => 'O Nome não pode ser vazio.',
            'name.max' => 'O tamanho do nome pode ter no maximo 40 caracteres',
            'email.max' => 'O tamanho do email pode ter no maximo 40 caracteres',
            'email.required' => 'O Email não pode ser vazio',
            'password1.required' => 'A confirmação da senha não pode ser vazia.',
            'password.required' => 'A senha não pode ser vazia',
            'password.min' => 'A senha não pode ter menos que 8 caracteres',
            'password1.min' => 'A confirmação da senha não pode ter menos que 8 caracteres',
            'cpf.required' => 'O CPF não pode ser vazio.',
            "cpf.cpf" => 'Combinação de digitos do CPF não é válida.',
            "cpf" => 'CPF em formato inválido, verifique.',
            'password1.same' => 'As senhas não são iguais, verifique.',
            "data_nascimento.required" => 'A data de nascimento não pode ser vazia.'
        ];
        }

}
