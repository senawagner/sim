@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        @include('arquiteto.partials.sidebar')

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Detalhes do Usuário</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <div class="btn-group me-2">
                        <a href="{{ route('arquiteto.usuarios.edit', $usuario) }}" class="btn btn-sm btn-primary">
                            <i class="fas fa-edit"></i> Editar
                        </a>
                        <form action="{{ route('arquiteto.usuarios.destroy', $usuario) }}" 
                              method="POST" 
                              class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    class="btn btn-sm btn-danger" 
                                    onclick="return confirm('Tem certeza que deseja excluir este usuário?')">
                                <i class="fas fa-trash"></i> Excluir
                            </button>
                        </form>
                    </div>
                    <a href="{{ route('arquiteto.usuarios.index') }}" class="btn btn-sm btn-secondary">
                        <i class="fas fa-arrow-left"></i> Voltar
                    </a>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <p><strong>Nome:</strong> {{ $usuario->nome_usuario }}</p>
                            <p><strong>E-mail:</strong> {{ $usuario->email }}</p>
                            <p><strong>Perfil:</strong> {{ ucfirst($usuario->perfil) }}</p>
                            <p><strong>Criado em:</strong> {{ $usuario->created_at->format('d/m/Y H:i:s') }}</p>
                            <p><strong>Última atualização:</strong> {{ $usuario->updated_at->format('d/m/Y H:i:s') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
@endsection
