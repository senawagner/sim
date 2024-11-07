@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-between align-items-center mb-4">
        <div class="col-auto">
            <h1>Dashboard</h1>
        </div>
        <div class="col-auto">
            <a href="{{ route('administrador.manutencoes.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Nova Manutenção
            </a>
        </div>
    </div>

    <div class="row">
        <!-- Cards de resumo -->
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Manutenções Pendentes</h5>
                    <p class="card-text display-4">
                        {{ App\Models\Manutencao::where('status', 'Pendente')->count() }}
                    </p>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Manutenções do Mês</h5>
                    <p class="card-text display-4">
                        {{ App\Models\Manutencao::whereMonth('data_programada', now()->month)->count() }}
                    </p>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Total de Equipamentos</h5>
                    <p class="card-text display-4">
                        {{ App\Models\Equipamento::count() }}
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Lista das últimas manutenções -->
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Últimas Manutenções</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Data</th>
                            <th>Tipo</th>
                            <th>Equipamento</th>
                            <th>Filial</th>
                            <th>Status</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach(App\Models\Manutencao::with(['equipamento', 'filial'])->latest()->take(5)->get() as $manutencao)
                        <tr>
                            <td>{{ \Carbon\Carbon::parse($manutencao->data_programada)->format('d/m/Y') }}</td>
                            <td>{{ $manutencao->tipo }}</td>
                            <td>{{ $manutencao->equipamento->tipo }} - {{ $manutencao->equipamento->numero_patrimonio }}</td>
                            <td>{{ $manutencao->filial->nome }}</td>
                            <td>
                                <span class="badge bg-{{ $manutencao->status === 'Pendente' ? 'warning' : ($manutencao->status === 'Realizada' ? 'success' : 'danger') }}">
                                    {{ $manutencao->status }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('administrador.manutencoes.show', $manutencao) }}" class="btn btn-sm btn-info">
                                    <i class="fas fa-eye"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@if(session('success'))
<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
    <div class="toast show bg-success text-white" role="alert">
        <div class="toast-header bg-success text-white">
            <strong class="me-auto">Sucesso!</strong>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast"></button>
        </div>
        <div class="toast-body">
            {{ session('success') }}
        </div>
    </div>
</div>
@endif

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const toastElList = document.querySelectorAll('.toast');
    toastElList.forEach(toast => {
        setTimeout(() => {
            toast.classList.remove('show');
        }, 3000);
    });
});
</script>
@endpush
@endsection