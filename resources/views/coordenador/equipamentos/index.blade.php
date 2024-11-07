@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Equipamentos</h2>
        <a href="{{ route('tecnico.equipamentos.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Novo Equipamento
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Patrimônio</th>
                            <th>Fabricante</th>
                            <th>Tipo</th>
                            <th>Capacidade</th>
                            <th>Filial</th>
                            <th>Localização</th>
                            <th>Andar</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($equipamentos as $equipamento)
                            <tr>
                                <td>{{ $equipamento->numero_patrimonio }}</td>
                                <td>{{ $equipamento->fabricante }}</td>
                                <td>{{ $equipamento->tipo }}</td>
                                <td>{{ $equipamento->capacidade }}</td>
                                <td>{{ $equipamento->filial->nome ?? 'N/A' }}</td>
                                <td>{{ $equipamento->localizacao }}</td>
                                <td>{{ $equipamento->andar }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('tecnico.equipamentos.edit', $equipamento->equipamento_id) }}" 
                                           class="btn btn-sm btn-primary">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('tecnico.equipamentos.destroy', $equipamento->equipamento_id) }}" 
                                              method="POST" 
                                              class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    class="btn btn-sm btn-danger" 
                                                    onclick="return confirm('Tem certeza que deseja excluir este equipamento?')">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center">Nenhum equipamento cadastrado.</td>
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
@endsection
