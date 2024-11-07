<?php

namespace App\Http\Controllers\Arquiteto;

use App\Http\Controllers\Controller;
use App\Models\Manutencao;
use App\Models\Equipamento;
use App\Models\Filial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ManutencaoController extends Controller
{
    public function index()
    {
        $manutencoes = Manutencao::with(['filial', 'equipamento', 'usuario'])
            ->orderBy('data_programada', 'desc')
            ->paginate(10);
        return view('arquiteto.manutencoes.index', compact('manutencoes'));
    }

    public function create()
    {
        $filiais = Filial::all();
        $equipamentos = Equipamento::all();
        return view('arquiteto.manutencoes.create', compact('filiais', 'equipamentos'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'tipo' => 'required|in:Preventiva,Corretiva',
            'periodicidade' => 'required|in:Mensal,Trimestral,Semestral',
            'filial_id' => 'required|exists:filiais,id',
            'equipamento_id' => 'required|exists:equipamentos,id',
            'data_programada' => 'nullable|date',
            'itens_verificacao' => 'required|string',
            'observacoes' => 'nullable|string',
        ]);

        try {
            $filial = Filial::findOrFail($validatedData['filial_id']);
            
            // Herdar a data padrão da filial se não for especificada
            if (!$request->filled('data_programada')) {
                $validatedData['data_programada'] = $this->calcularDataProgramada($filial, $validatedData['periodicidade']);
            }

            $validatedData['usuario_id'] = Auth::id();
            $validatedData['status'] = 'Pendente';

            $manutencao = Manutencao::create($validatedData);

            // Agendar próxima manutenção se for preventiva
            if ($validatedData['tipo'] === 'Preventiva') {
                $this->agendarProximaManutencao($manutencao);
            }

            Log::info('Nova manutenção registrada', ['manutencao_id' => $manutencao->id]);
            return redirect()->route('arquiteto.manutencoes.index')->with('success', 'Manutenção registrada com sucesso!');
        } catch (\Exception $e) {
            Log::error('Erro ao registrar manutenção', ['error' => $e->getMessage()]);
            return redirect()->route('arquiteto.manutencoes.create')->with('error', 'Erro ao registrar manutenção. Por favor, tente novamente.');
        }
    }

    public function show(Manutencao $manutencao)
    {
        return view('arquiteto.manutencoes.show', compact('manutencao'));
    }

    public function edit(Manutencao $manutencao)
    {
        $filiais = Filial::all();
        $equipamentos = Equipamento::all();
        return view('arquiteto.manutencoes.edit', compact('manutencao', 'filiais', 'equipamentos'));
    }

    public function update(Request $request, Manutencao $manutencao)
    {
        $validatedData = $request->validate([
            'tipo' => 'required|in:Preventiva,Corretiva',
            'periodicidade' => 'required|in:Mensal,Trimestral,Semestral',
            'filial_id' => 'required|exists:filiais,id',
            'equipamento_id' => 'required|exists:equipamentos,equipamento_id',
            'data_programada' => 'required|date',
            'data_realizada' => 'nullable|date',
            'itens_verificacao' => 'required|string',
            'observacoes' => 'nullable|string',
            'status' => 'required|in:Pendente,Realizada,Atrasada',
        ]);

        try {
            $manutencao->update($validatedData);
            Log::info('Manutenção atualizada', ['manutencao_id' => $manutencao->id]);
            return redirect()->route('arquiteto.manutencoes.index')->with('success', 'Manutenção atualizada com sucesso!');
        } catch (\Exception $e) {
            Log::error('Erro ao atualizar manutenção', ['error' => $e->getMessage(), 'manutencao_id' => $manutencao->id]);
            return redirect()->route('arquiteto.manutencoes.edit', $manutencao)->with('error', 'Erro ao atualizar manutenção. Por favor, tente novamente.');
        }
    }

    public function destroy(Manutencao $manutencao)
    {
        try {
            $manutencao->delete();
            Log::info('Manutenção excluída', ['manutencao_id' => $manutencao->id]);
            return redirect()->route('arquiteto.manutencoes.index')->with('success', 'Manutenção excluída com sucesso!');
        } catch (\Exception $e) {
            Log::error('Erro ao excluir manutenção', ['error' => $e->getMessage(), 'manutencao_id' => $manutencao->id]);
            return redirect()->route('arquiteto.manutencoes.index')->with('error', 'Erro ao excluir manutenção. Por favor, tente novamente.');
        }
    }

    public function getEquipamentosPorFilial($filialId)
    {
        try {
            $equipamentos = Equipamento::where('filial_id', $filialId)
                ->orderBy('descricao')
                ->get()
                ->map(function ($equipamento) {
                    return [
                        'id' => $equipamento->id,
                        'text' => "{$equipamento->numero_patrimonio} - {$equipamento->descricao}"
                    ];
                });
            
            return response()->json($equipamentos);
        } catch (\Exception $e) {
            Log::error('Erro ao buscar equipamentos por filial', ['error' => $e->getMessage(), 'filial_id' => $filialId]);
            return response()->json(['error' => 'Erro ao buscar equipamentos'], 500);
        }
    }

    private function calcularDataProgramada(Filial $filial, $periodicidade)
    {
        $dataBase = Carbon::parse($filial->data_padrao_manutencao);
        $hoje = Carbon::today();

        while ($dataBase <= $hoje) {
            switch ($periodicidade) {
                case 'Mensal':
                    $dataBase->addMonth();
                    break;
                case 'Trimestral':
                    $dataBase->addMonths(3);
                    break;
                case 'Semestral':
                    $dataBase->addMonths(6);
                    break;
            }
        }

        return $dataBase;
    }

    private function agendarProximaManutencao(Manutencao $manutencao)
    {
        $proximaData = Carbon::parse($manutencao->data_programada);

        switch ($manutencao->periodicidade) {
            case 'Mensal':
                $proximaData->addMonth();
                break;
            case 'Trimestral':
                $proximaData->addMonths(3);
                break;
            case 'Semestral':
                $proximaData->addMonths(6);
                break;
        }

        Manutencao::create([
            'tipo' => $manutencao->tipo,
            'periodicidade' => $manutencao->periodicidade,
            'filial_id' => $manutencao->filial_id,
            'equipamento_id' => $manutencao->equipamento_id,
            'data_programada' => $proximaData,
            'itens_verificacao' => $manutencao->itens_verificacao,
            'usuario_id' => Auth::id(),
            'status' => 'Pendente',
        ]);
    }
}