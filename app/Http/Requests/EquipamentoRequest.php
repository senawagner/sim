<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EquipamentoRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->check() && auth()->user()->perfil === 'arquiteto';
    }

    public function rules()
    {
        $rules = [
            'numero_patrimonio' => [
                'required',
                'string',
                'max:255',
                Rule::unique('equipamentos')->ignore($this->equipamento)
            ],
            'tipo' => 'required|in:Split,ACJ',
            'fabricante_id' => 'required|exists:fabricantes,id',
            'capacidade_id' => 'required|exists:capacidades,id',
            'modelo_evaporadora_id' => 'required|exists:modelos,id',
            'modelo_condensadora_id' => 'required|exists:modelos,id',
            'filial_id' => 'required|exists:filiais,id',
            'localizacao_id' => 'required|exists:localizacao,id',
            'setor_id' => 'required|exists:setor,id',
            'observacoes' => 'nullable|string'
        ];

        return $rules;
    }

    public function messages()
    {
        return [
            'required' => 'O campo :attribute é obrigatório.',
            'string' => 'O campo :attribute deve ser um texto.',
            'max' => 'O campo :attribute não pode ter mais que :max caracteres.',
            'exists' => 'O :attribute selecionado não existe na base de dados.',
            'in' => 'O valor selecionado para :attribute é inválido.',
            'unique' => 'Este número de patrimônio já está em uso.',
        ];
    }

    public function attributes()
    {
        return [
            'numero_patrimonio' => 'número do patrimônio',
            'tipo' => 'tipo',
            'fabricante_id' => 'fabricante',
            'capacidade_id' => 'capacidade',
            'modelo_evaporadora_id' => 'modelo da evaporadora',
            'modelo_condensadora_id' => 'modelo da condensadora',
            'filial_id' => 'filial',
            'localizacao_id' => 'localização',
            'setor_id' => 'setor',
            'observacoes' => 'observações'
        ];
    }
}
