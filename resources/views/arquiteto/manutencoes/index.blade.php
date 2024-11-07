@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <!-- Botão Voltar ao Dashboard -->
    <div class="row mb-3">
        <div class="col-auto">
            <a href="{{ route('arquiteto.dashboard') }}" class="btn btn-outline-primary">
                <i class="fas fa-arrow-left"></i> Voltar ao Dashboard
            </a>
        </div>
    </div>

    <div class="row justify-content-between align-items-center mb-4">
        <div class="col-auto">
            <h1>Manutenções</h1>
        </div>
        <div class="col-auto">
            <a href="{{ route('arquiteto.manutencoes.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Nova Manutenção
            </a>
        </div>
    </div>

    <div class="card">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Lista de Manutenções</h5>
            <div class="d-flex gap-2">
                <button class="btn btn-light btn-sm" id="btnFiltrar">
                    <i class="fas fa-filter"></i> Filtrar
                </button>
                <button class="btn btn-light btn-sm" id="btnExportar">
                    <i class="fas fa-download"></i> Exportar
                </button>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Tipo</th>
                            <th>Filial</th>
                            <th>Equipamento</th>
                            <th>Data Programada</th>
                            <th>Status</th>
                            <th width="150">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($manutencoes as $manutencao)
                        <tr>
                            <td>{{ $manutencao->id }}</td>
                            <td>
                                <span class="badge {{ $manutencao->tipo == 'Preventiva' ? 'bg-info' : 'bg-warning' }}">
                                    {{ $manutencao->tipo }}
                                </span>
                            </td>
                            <td>{{ $manutencao->filial->nome }}</td>
                            <td>{{ $manutencao->equipamento->descricao_completa }}</td>
                            <td>{{ $manutencao->data_programada->format('d/m/Y') }}</td>
                            <td>
                                <span class="badge {{ 
                                    $manutencao->status == 'Pendente' ? 'bg-warning' : 
                                    ($manutencao->status == 'Realizada' ? 'bg-success' : 'bg-danger') 
                                }}">
                                    {{ $manutencao->status }}
                                </span>
                            </td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('arquiteto.manutencoes.show', $manutencao) }}" 
                                       class="btn btn-sm btn-info" 
                                       title="Visualizar">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('arquiteto.manutencoes.edit', $manutencao) }}" 
                                       class="btn btn-sm btn-primary"
                                       title="Editar">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <button type="button" 
                                            class="btn btn-sm btn-danger" 
                                            onclick="confirmarExclusao({{ $manutencao->id }})"
                                            title="Excluir">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
            <div class="d-flex justify-content-end mt-3">
                {{ $manutencoes->links() }}
            </div>
        </div>
    </div>
</div>

<!-- Modal de Confirmação de Exclusão -->
<div class="modal fade" id="modalExclusao" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title">Confirmar Exclusão</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                Tem certeza que deseja excluir esta manutenção?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <form id="formExclusao" method="POST" style="display: inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Confirmar Exclusão</button>
                </form>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
function confirmarExclusao(id) {
    const modal = new bootstrap.Modal(document.getElementById('modalExclusao'));
    const form = document.getElementById('formExclusao');
    form.action = `/arquiteto/manutencoes/${id}`;
    modal.show();
}

document.addEventListener('DOMContentLoaded', function() {
    // Implementar lógica de filtros e exportação aqui
});
</script>
@endpush
@endsection
