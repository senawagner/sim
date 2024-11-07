@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>{{ $title ?? 'Lista de Registros' }}</h2>
        <a href="{{ route($routePrefix . '.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Novo Registro
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Status</th>
                            <th width="150">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($records as $record)
                            <tr>
                                <td>{{ $record->id }}</td>
                                <td>{{ $record->nome }}</td>
                                <td>
                                    <span class="badge {{ $record->ativo ? 'bg-success' : 'bg-danger' }}">
                                        {{ $record->ativo ? 'Ativo' : 'Inativo' }}
                                    </span>
                                </td>
                                <td>
                                    <a href="{{ route($routePrefix . '.show', $record) }}" 
                                       class="btn btn-sm btn-info" 
                                       title="Visualizar">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route($routePrefix . '.edit', $record) }}" 
                                       class="btn btn-sm btn-primary"
                                       title="Editar">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route($routePrefix . '.destroy', $record) }}" 
                                          method="POST" 
                                          class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="btn btn-sm btn-danger" 
                                                onclick="return confirm('Tem certeza que deseja excluir este registro?')"
                                                title="Excluir">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">Nenhum registro encontrado.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            @if($records instanceof \Illuminate\Pagination\LengthAwarePaginator)
                <div class="mt-3">
                    {{ $records->links() }}
                </div>
            @endif
        </div>
    </div>
</div>
@endsection