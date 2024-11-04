<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Equipamento;
use App\Models\Filial;
use Illuminate\Http\Request;

class EquipamentoController extends Controller
{
    public function index()
    {
        $equipamentos = Equipamento::with('filial')->paginate(10);
        return view('admin.equipamentos.index', compact('equipamentos'));
    }

    public function create()
    {
        $filiais = Filial::all();
        return view('admin.equipamentos.create', compact('filiais'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'fabricante' => 'required|string|max:100',
            'tipo' => 'required|in:Split,ACJ',
            'capacidade' => 'required|string|max:50',
            'numero_patrimonio' => 'required|string|max:50|unique:equipamentos',
            'modelo_evaporadora' => 'required|string|max:50',
            'modelo_condensadora' => 'required|string|max:50',
            'caracteristicas' => ['nullable', 'array', function ($attribute, $value, $fail) {
                $invalidCaracteristicas = array_diff($value, Equipamento::CARACTERISTICAS);
                if (!empty($invalidCaracteristicas)) {
                    $fail('Algumas características selecionadas são inválidas.');
                }
            }],
            'filial_id' => 'required|exists:filiais,id',
            'localizacao' => 'required|string|max:100',
            'andar' => 'required|string|max:10',
            'observacoes' => 'nullable|string',
        ]);

        Equipamento::create($validated);

        return redirect()->route('admin.equipamentos.index')
            ->with('success', 'Equipamento cadastrado com sucesso!');
    }

    public function edit(Equipamento $equipamento)
    {
        $filiais = Filial::all();
        return view('admin.equipamentos.edit', compact('equipamento', 'filiais'));
    }

    public function update(Request $request, Equipamento $equipamento)
    {
        $validated = $request->validate([
            'fabricante' => 'required|string|max:100',
            'tipo' => 'required|in:Split,ACJ',
            'capacidade' => 'required|string|max:50',
            'numero_patrimonio' => 'required|string|max:50|unique:equipamentos,numero_patrimonio,' . $equipamento->equipamento_id . ',equipamento_id',
            'modelo_evaporadora' => 'required|string|max:50',
            'modelo_condensadora' => 'required|string|max:50',
            'caracteristicas' => 'nullable|array',
            'filial_id' => 'required|exists:filiais,id',
            'localizacao' => 'required|string|max:100',
            'andar' => 'required|string|max:10',
            'observacoes' => 'nullable|string',
        ]);

        $equipamento->update($validated);

        return redirect()->route('admin.equipamentos.index')
            ->with('success', 'Equipamento atualizado com sucesso!');
    }

    public function destroy(Equipamento $equipamento)
    {
        $equipamento->delete();
        return redirect()->route('admin.equipamentos.index')
            ->with('success', 'Equipamento excluído com sucesso!');
    }
}
