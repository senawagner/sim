<?php

namespace App\Http\Controllers\Administrador;

use App\Http\Controllers\Controller;
use App\Models\Manutencao;
use App\Models\Equipamento;
use App\Models\Filial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Validation\ValidationException;

class ManutencaoController extends Controller
{
    public function index()
    {
        $manutencoes = Manutencao::with(['filial', 'equipamento', 'usuario'])
            ->orderBy('data_programada', 'desc')
            ->paginate(10);
        return view('administrador.manutencoes.index', compact('manutencoes'));
    }

    public function create()
    {
        $filiais = Filial::orderBy('nome')->get();
        $tiposManutenção = ['Preventiva', 'Corretiva', 'Preditiva'];
        $periodicidades = ['Diária', 'Semanal', 'Quinzenal', 'Mensal', 'Trimestral', 'Semestral', 'Anual'];
        
        return view('administrador.manutencoes.create', compact('filiais', 'tiposManutenção', 'periodicidades'));
    }

    public function store(Request $request)
    {
        try {
            // Validação dos dados
            $validatedData = $request->validate([
                'tipo' => 'required|in:Preventiva,Corretiva',
                'periodicidade' => 'required|in:Mensal,Trimestral,Semestral',
                'filial_id' => 'required|exists:filiais,id',
                'equipamento_id' => 'required|exists:equipamentos,id',
                'data_programada' => 'required|date',
                'observacoes' => 'nullable|string|max:1000',
            ]);

            // Obtém o ID do usuário autenticado
            $usuario = auth()->user();
            
            // Log para debug
            \Log::info('Usuário autenticado:', [
                'id' => $usuario->id,
                'nome' => $usuario->nome,
                'email' => $usuario->email
            ]);

            // Prepara os dados para salvar
            $manutencao = new Manutencao();
            $manutencao->tipo = $validatedData['tipo'];
            $manutencao->periodicidade = $validatedData['periodicidade'];
            $manutencao->filial_id = $validatedData['filial_id'];
            $manutencao->equipamento_id = $validatedData['equipamento_id'];
            $manutencao->data_programada = $validatedData['data_programada'];
            $manutencao->observacoes = $validatedData['observacoes'];
            $manutencao->usuario_id = $usuario->id; // Usa o ID numérico do usuário
            $manutencao->status = 'Pendente';

            // Salva a manutenção
            $manutencao->save();

            // Log de sucesso
            \Log::info('Manutenção criada com sucesso', [
                'id' => $manutencao->id,
                'usuario_id' => $manutencao->usuario_id
            ]);

            return redirect()
                ->route('administrador.manutencoes.index')
                ->with('success', 'Manutenção registrada com sucesso!');

        } catch (\Exception $e) {
            // Log detalhado do erro
            \Log::error('Erro ao criar manutenção:', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'request' => $request->all(),
                'usuario' => auth()->user()
            ]);

            return redirect()
                ->back()
                ->with('error', 'Erro ao registrar manutenção: ' . $e->getMessage())
                ->withInput();
        }
    }

    public function show($id)
    {
        try {
            $manutencao = Manutencao::with(['filial', 'equipamento', 'usuario'])
                ->findOrFail($id);
            
            // Log para debug
            \Log::info('Manutenção carregada:', [
                'id' => $manutencao->id,
                'attributes' => $manutencao->toArray()
            ]);
            
            return view('administrador.manutencoes.show', compact('manutencao'));
        } catch (\Exception $e) {
            \Log::error('Erro ao carregar manutenção:', [
                'id' => $id,
                'error' => $e->getMessage()
            ]);
            
            return redirect()
                ->route('administrador.manutencoes.index')
                ->with('error', 'Manutenção não encontrada.');
        }
    }

    public function edit($id)
    {
        try {
            $manutencao = Manutencao::with(['filial', 'equipamento'])
                ->findOrFail($id);
            $filiais = Filial::all();
            $equipamentos = Equipamento::all();
            
            return view('administrador.manutencoes.edit', compact('manutencao', 'filiais', 'equipamentos'));
        } catch (\Exception $e) {
            return redirect()
                ->route('administrador.manutencoes.index')
                ->with('error', 'Manutenção não encontrada.');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $manutencao = Manutencao::findOrFail($id);
            
            $validatedData = $request->validate([
                'tipo' => 'required|in:Preventiva,Corretiva',
                'periodicidade' => 'required|in:Mensal,Trimestral,Semestral',
                'filial_id' => 'required|exists:filiais,id',
                'equipamento_id' => 'required|exists:equipamentos,id',
                'data_programada' => 'required|date',
                'data_realizada' => 'nullable|date',
                'observacoes' => 'nullable|string',
                'status' => 'required|in:Pendente,Realizada,Atrasada',
            ]);

            $manutencao->update($validatedData);
            
            return redirect()
                ->route('administrador.manutencoes.index')
                ->with('success', 'Manutenção atualizada com sucesso!');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', 'Erro ao atualizar manutenção: ' . $e->getMessage())
                ->withInput();
        }
    }

    public function destroy(Manutencao $manutencao)
    {
        try {
            $manutencao->delete();
            Log::info('Manutenção excluída', ['manutencao_id' => $manutencao->id]);
            return redirect()->route('administrador.manutencoes.index')->with('success', 'Manutenção excluída com sucesso!');
        } catch (\Exception $e) {
            Log::error('Erro ao excluir manutenção', ['error' => $e->getMessage(), 'manutencao_id' => $manutencao->id]);
            return redirect()->route('administrador.manutencoes.index')->with('error', 'Erro ao excluir manutenção. Por favor, tente novamente.');
        }
    }

    public function getEquipamentosPorFilial($filialId)
    {
        try {
            $equipamentos = Equipamento::where('filial_id', $filialId)
                ->select('id', 'tipo', 'fabricante', 'numero_patrimonio', 'localizacao')
                ->orderBy('tipo')
                ->orderBy('numero_patrimonio')
                ->get();

            // Formata os equipamentos para o select
            $equipamentosFormatados = $equipamentos->mapWithKeys(function ($equipamento) {
                return [
                    $equipamento->id => sprintf(
                        '%s - %s - %s (%s)',
                        $equipamento->tipo,
                        $equipamento->fabricante,
                        $equipamento->numero_patrimonio,
                        $equipamento->localizacao
                    )
                ];
            })->toArray();

            return response()->json($equipamentosFormatados);

        } catch (\Exception $e) {
            \Log::error('Erro ao buscar equipamentos', [
                'filial_id' => $filialId,
                'erro' => $e->getMessage()
            ]);

            return response()->json([
                'error' => 'Erro ao buscar equipamentos'
            ], 500);
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
            'usuario_id' => Auth::id(),
            'status' => 'Pendente',
        ]);
    }
}