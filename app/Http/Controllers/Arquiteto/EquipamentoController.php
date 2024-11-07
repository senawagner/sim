<?php

namespace App\Http\Controllers\Arquiteto;

use App\Http\Controllers\Controller;
use App\Models\Equipamento;
use App\Models\Filial;
use App\Models\Fabricante;
use App\Models\Capacidade;
use App\Models\Modelo;
use App\Models\Localizacao;
use App\Models\Setor;
use App\Http\Requests\EquipamentoRequest;
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
        
        $filiais = Filial::orderBy('nome')->get(); // Para os filtros
        
        return view('arquiteto.equipamentos.index', compact('equipamentos', 'filiais'));
    }

    public function create()
    {
        $filiais = Filial::orderBy('nome')->get();
        $fabricantes = Fabricante::orderBy('nome')->get();
        $capacidades = Capacidade::orderBy('valor')->get();
        
        // Buscando os modelos separadamente
        $modelosEvaporadora = Modelo::where('tipo', 'Evaporadora')
            ->orderBy('codigo')
            ->get();
        
        $modelosCondensadora = Modelo::where('tipo', 'Condensadora')
            ->orderBy('codigo')
            ->get();
        
        $localizacoes = Localizacao::orderBy('nome')->get();
        $setores = Setor::orderBy('nome')->get();

        return view('arquiteto.equipamentos.create', compact(
            'filiais',
            'fabricantes',
            'capacidades',
            'modelosEvaporadora',
            'modelosCondensadora',
            'localizacoes',
            'setores'
        ));
    }

    public function store(EquipamentoRequest $request)
    {
        try {
            // Log para debug
            \Log::info('Dados recebidos do formulário:', $request->all());
            
            // Validar e criar o equipamento
            $dados = $request->validated();
            \Log::info('Dados validados:', $dados);
            
            $equipamento = Equipamento::create($dados);
            
            // Log do equipamento criado
            \Log::info('Equipamento criado com sucesso:', $equipamento->toArray());

            return redirect()
                ->route('arquiteto.equipamentos.index')
                ->with('success', 'Equipamento cadastrado com sucesso!');
            
        } catch (\Exception $e) {
            // Log detalhado do erro
            \Log::error('Erro ao criar equipamento:', [
                'message' => $e->getMessage(),
                'code' => $e->getCode(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'trace' => $e->getTraceAsString()
            ]);
            
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Erro ao cadastrar equipamento. Por favor, tente novamente.');
        }
    }

    public function show(Equipamento $equipamento)
    {
        return view('arquiteto.equipamentos.show', compact('equipamento'));
    }

    public function edit(Equipamento $equipamento)
    {
        $filiais = Filial::orderBy('nome')->get();
        $fabricantes = Fabricante::orderBy('nome')->get();
        $capacidades = Capacidade::orderBy('valor')->get();
        $modelosEvaporadora = Modelo::where('tipo', 'evaporadora')->orderBy('codigo')->get();
        $modelosCondensadora = Modelo::where('tipo', 'condensadora')->orderBy('codigo')->get();
        $localizacoes = Localizacao::where('ativo', true)->orderBy('nome')->get();
        $setores = Setor::where('ativo', true)->orderBy('nome')->get();

        return view('arquiteto.equipamentos.edit', compact(
            'equipamento',
            'filiais',
            'fabricantes',
            'capacidades',
            'modelosEvaporadora',
            'modelosCondensadora',
            'localizacoes',
            'setores'
        ));
    }

    public function update(EquipamentoRequest $request, Equipamento $equipamento)
    {
        $equipamento->update($request->validated());

        return redirect()->route('arquiteto.equipamentos.index')
            ->with('success', 'Equipamento atualizado com sucesso!');
    }

    public function destroy(Equipamento $equipamento)
    {
        $equipamento->delete();
        return redirect()->route('arquiteto.equipamentos.index')
            ->with('success', 'Equipamento excluído com sucesso!');
    }
}
