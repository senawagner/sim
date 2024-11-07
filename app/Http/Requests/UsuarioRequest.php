<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UsuarioRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $rules = [
            'nome_usuario' => ['required', 'string', 'max:191'],
            'email' => [
                'required',
                'email',
                'max:191',
                Rule::unique('usuarios')->ignore($this->usuario)
            ],
            'perfil' => ['required', 'string', Rule::in(['arquiteto', 'administrador', 'coordenador', 'tecnico'])],
        ];

        // Senha obrigatória apenas na criação
        if ($this->isMethod('post')) {
            $rules['password'] = ['required', 'string', 'min:6', 'confirmed'];
        }

        return $rules;
    }

    public function messages(): array
    {
        return [
            'nome_usuario.required' => 'O nome é obrigatório',
            'nome_usuario.max' => 'O nome não pode ter mais que 191 caracteres',
            'email.required' => 'O e-mail é obrigatório',
            'email.email' => 'Digite um e-mail válido',
            'email.unique' => 'Este e-mail já está em uso',
            'perfil.required' => 'O perfil é obrigatório',
            'perfil.in' => 'Perfil inválido',
            'password.required' => 'A senha é obrigatória',
            'password.min' => 'A senha deve ter no mínimo 6 caracteres',
            'password.confirmed' => 'As senhas não conferem'
        ];
    }
}
