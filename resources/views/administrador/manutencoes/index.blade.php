@extends('layouts.app')

@section('content')
<div class="container">
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <h1>Manutenções</h1>
    <a href="{{ route('administrador.manutencoes.create') }}" class="btn btn-primary mb-3">Nova Manutenção</a>
    
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tipo</th>
                    <th>Filial</th>
                    <th>Equipamento</th>
                    <th>Data Programada</th>
                    <th>Status</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($manutencoes as $manutencao)
                <tr>
                    <td>{{ $manutencao->id }}</td>
                    <td>{{ $manutencao->tipo }}</td>
                    <td>{{ $manutencao->filial->nome }}</td>
                    <td>{{ $manutencao->equipamento->descricao_completa }}</td>
                    <td>{{ $manutencao->data_programada->format('d/m/Y') }}</td>
                    <td>{{ $manutencao->status }}</td>
                    <td>
                        <a href="{{ route('administrador.manutencoes.show', $manutencao) }}" class="btn btn-sm btn-info">Ver</a>
                        <a href="{{ route('administrador.manutencoes.edit', $manutencao) }}" class="btn btn-sm btn-primary">Editar</a>
                        <form action="{{ route('administrador.manutencoes.destroy', $manutencao) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza que deseja excluir esta manutenção?')">Excluir</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
    {{ $manutencoes->links() }}
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const deleteButtons = document.querySelectorAll('.delete-manutencao');
    deleteButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            if (confirm('Tem certeza que deseja excluir esta manutenção?')) {
                this.closest('form').submit();
            }
        });
    });
});
</script>
@endpush
