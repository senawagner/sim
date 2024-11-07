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
            <h2>Equipamentos</h2>
        </div>
        <div class="col-auto">
            <a href="{{ route('arquiteto.equipamentos.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Novo Equipamento
            </a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <!-- Filtros -->
            <div class="row mb-4">
                <div class="col-md-3">
                    <input type="text" class="form-control" id="filtro-patrimonio" placeholder="Filtrar por patrimônio">
                </div>
                <div class="col-md-3">
                    <select class="form-select" id="filtro-filial">
                        <option value="">Todas as filiais</option>
                        @foreach($filiais as $filial)
                            <option value="{{ $filial->id }}">{{ $filial->nome }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <select class="form-select" id="filtro-tipo">
                        <option value="">Todos os tipos</option>
                        <option value="Split">Split</option>
                        <option value="ACJ">ACJ</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <button class="btn btn-outline-secondary" id="limpar-filtros">
                        <i class="fas fa-eraser"></i> Limpar Filtros
                    </button>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Patrimônio</th>
                            <th>Tipo</th>
                            <th>Fabricante</th>
                            <th>Capacidade</th>
                            <th>Modelos (Evap/Cond)</th>
                            <th>Filial</th>
                            <th>Localização</th>
                            <th>Setor</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($equipamentos as $equipamento)
                            <tr>
                                <td>{{ $equipamento->numero_patrimonio }}</td>
                                <td>
                                    <span class="badge {{ $equipamento->tipo == 'Split' ? 'bg-info' : 'bg-secondary' }}">
                                        {{ $equipamento->tipo }}
                                    </span>
                                </td>
                                <td>{{ $equipamento->fabricante->nome }}</td>
                                <td>{{ $equipamento->capacidade->valor }} BTUs</td>
                                <td>
                                    {{ $equipamento->modeloEvaporadora->nome }} /
                                    {{ $equipamento->modeloCondensadora->nome }}
                                </td>
                                <td>{{ $equipamento->filial->nome }}</td>
                                <td>{{ $equipamento->localizacao->nome }}</td>
                                <td>{{ $equipamento->setor->nome }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('arquiteto.equipamentos.show', $equipamento->id) }}" 
                                           class="btn btn-sm btn-info" 
                                           title="Visualizar">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('arquiteto.equipamentos.edit', $equipamento->id) }}" 
                                           class="btn btn-sm btn-primary"
                                           title="Editar">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <button type="button" 
                                                class="btn btn-sm btn-danger" 
                                                onclick="confirmarExclusao({{ $equipamento->id }})"
                                                title="Excluir">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="text-center">Nenhum equipamento cadastrado.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-3">
                {{ $equipamentos->links() }}
            </div>
        </div>
    </div>
</div>

<!-- Modal de Confirmação de Exclusão -->
<div class="modal fade" id="modalExclusao" tabindex="-1" aria-labelledby="modalExclusaoLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalExclusaoLabel">Confirmar Exclusão</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Tem certeza que deseja excluir este equipamento?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <form id="formExclusao" method="POST" class="d-inline">
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
    form.action = `{{ route('arquiteto.equipamentos.destroy', '') }}/${id}`;
    modal.show();
}

document.addEventListener('DOMContentLoaded', function() {
    // Implementação dos filtros
    const filtroPatrimonio = document.getElementById('filtro-patrimonio');
    const filtroFilial = document.getElementById('filtro-filial');
    const filtroTipo = document.getElementById('filtro-tipo');
    const btnLimparFiltros = document.getElementById('limpar-filtros');

    function aplicarFiltros() {
        // Implementar lógica de filtros aqui
    }

    filtroPatrimonio.addEventListener('input', aplicarFiltros);
    filtroFilial.addEventListener('change', aplicarFiltros);
    filtroTipo.addEventListener('change', aplicarFiltros);

    btnLimparFiltros.addEventListener('click', function() {
        filtroPatrimonio.value = '';
        filtroFilial.value = '';
        filtroTipo.value = '';
        aplicarFiltros();
    });
});
</script>
@endpush
@endsection
