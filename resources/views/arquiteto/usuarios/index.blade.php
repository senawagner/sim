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
            <h1>Usuários</h1>
        </div>
        <div class="col-auto">
            <a href="{{ route('arquiteto.usuarios.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Novo Usuário
            </a>
        </div>
    </div>

    @include('partials.alerts')

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Perfil</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse($usuarios as $usuario)
                    <tr>
                        <td>{{ $usuario->nome_usuario }}</td>
                        <td>{{ $usuario->email }}</td>
                        <td>{{ ucfirst($usuario->perfil) }}</td>
                        <td>
                            <a href="{{ route('arquiteto.usuarios.show', $usuario) }}" 
                               class="btn btn-sm btn-info text-white">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('arquiteto.usuarios.edit', $usuario) }}" 
                               class="btn btn-sm btn-primary">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('arquiteto.usuarios.destroy', $usuario) }}" 
                                  method="POST" 
                                  class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="btn btn-sm btn-danger" 
                                        onclick="return confirm('Tem certeza que deseja excluir este usuário?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">Nenhum usuário encontrado</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-center">
        {{ $usuarios->links() }}
    </div>
</div>
@endsection
