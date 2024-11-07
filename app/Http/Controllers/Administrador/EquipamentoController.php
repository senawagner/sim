<?php

namespace App\Http\Controllers\Administrador;

use App\Http\Controllers\Controller;
use App\Models\Equipamento;
use App\Models\Filial;
use App\Models\Fabricante;
use App\Models\Capacidade;
use App\Models\Modelo;
use App\Models\Localizacao;
use App\Models\Setor;
use Illuminate\Http\Request;

class EquipamentoController extends Controller
{
    public function index()
    {
        $equipamentos = Equipamento::with([
            'filial',
            'fabricante',
            'capacidade',
            'modeloEvaporadora',
            'modeloCondensadora',
            'localizacao',
            'setor'
        ])->paginate(10);
        return view('administrador.equipamentos.index', compact('equipamentos'));
    }

    public function create()
    {
        $filiais = Filial::orderBy('nome')->get();
        $fabricantes = Fabricante::orderBy('nome')->get();
        $capacidades = Capacidade::orderBy('valor')->get();
        $modelos = Modelo::orderBy('nome')->get();
        $localizacoes = Localizacao::orderBy('nome')->get();
        $setores = Setor::orderBy('nome')->get();

        return view('administrador.equipamentos.create', compact(
            'filiais',
            'fabricantes',
            'capacidades',
            'modelos',
            'localizacoes',
            'setores'
        ));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'numero_patrimonio' => 'required|string|max:50|unique:equipamentos',
            'tipo' => 'required|in:Split,ACJ',
            'fabricante_id' => 'required|exists:fabricantes,id',
            'capacidade_id' => 'required|exists:capacidades,id',
            'modelo_evaporadora_id' => 'required|exists:modelos,id',
            'modelo_condensadora_id' => 'required|exists:modelos,id',
            'filial_id' => 'required|exists:filiais,id',
            'localizacao_id' => 'required|exists:localizacoes,id',
            'setor_id' => 'required|exists:setores,id',
            'observacoes' => 'nullable|string',
        ]);

        Equipamento::create($validated);

        return redirect()->route('administrador.equipamentos.index')
            ->with('success', 'Equipamento cadastrado com sucesso!');
    }

    public function edit(Equipamento $equipamento)
    {
        $filiais = Filial::orderBy('nome')->get();
        $fabricantes = Fabricante::orderBy('nome')->get();
        $capacidades = Capacidade::orderBy('valor')->get();
        $modelos = Modelo::orderBy('nome')->get();
        $localizacoes = Localizacao::orderBy('nome')->get();
        $setores = Setor::orderBy('nome')->get();

        return view('administrador.equipamentos.edit', compact(
            'equipamento',
            'filiais',
            'fabricantes',
            'capacidades',
            'modelos',
            'localizacoes',
            'setores'
        ));
    }

    public function update(Request $request, Equipamento $equipamento)
    {
        $validated = $request->validate([
            'numero_patrimonio' => 'required|string|max:50|unique:equipamentos,numero_patrimonio,' . $equipamento->id,
            'tipo' => 'required|in:Split,ACJ',
            'fabricante_id' => 'required|exists:fabricantes,id',
            'capacidade_id' => 'required|exists:capacidades,id',
            'modelo_evaporadora_id' => 'required|exists:modelos,id',
            'modelo_condensadora_id' => 'required|exists:modelos,id',
            'filial_id' => 'required|exists:filiais,id',
            'localizacao_id' => 'required|exists:localizacoes,id',
            'setor_id' => 'required|exists:setores,id',
            'observacoes' => 'nullable|string',
        ]);

        $equipamento->update($validated);

        return redirect()->route('administrador.equipamentos.index')
            ->with('success', 'Equipamento atualizado com sucesso!');
    }

    public function destroy(Equipamento $equipamento)
    {
        $equipamento->delete();
        return redirect()->route('administrador.equipamentos.index')
            ->with('success', 'Equipamento excluído com sucesso!');
    }
}
