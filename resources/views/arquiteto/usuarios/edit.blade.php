@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        @include('arquiteto.partials.sidebar')

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Editar Usuário</h1>
            </div>

            <form action="{{ route('arquiteto.usuarios.update', $usuario) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="nome_usuario" class="form-label">Nome</label>
                            <input type="text" 
                                   class="form-control @error('nome_usuario') is-invalid @enderror" 
                                   id="nome_usuario" 
                                   name="nome_usuario" 
                                   value="{{ old('nome_usuario', $usuario->nome_usuario) }}" 
                                   required>
                            @error('nome_usuario')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">E-mail</label>
                            <input type="email" 
                                   class="form-control @error('email') is-invalid @enderror" 
                                   id="email" 
                                   name="email" 
                                   value="{{ old('email', $usuario->email) }}" 
                                   required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="perfil" class="form-label">Perfil</label>
                            <select class="form-select @error('perfil') is-invalid @enderror" 
                                    id="perfil" 
                                    name="perfil" 
                                    required>
                                <option value="">Selecione...</option>
                                <option value="arquiteto" {{ old('perfil', $usuario->perfil) == 'arquiteto' ? 'selected' : '' }}>Arquiteto</option>
                                <option value="administrador" {{ old('perfil', $usuario->perfil) == 'administrador' ? 'selected' : '' }}>Administrador</option>
                                <option value="coordenador" {{ old('perfil', $usuario->perfil) == 'coordenador' ? 'selected' : '' }}>Coordenador</option>
                                <option value="tecnico" {{ old('perfil', $usuario->perfil) == 'tecnico' ? 'selected' : '' }}>Técnico</option>
                            </select>
                            @error('perfil')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Nova Senha (opcional)</label>
                            <input type="password" 
                                   class="form-control @error('password') is-invalid @enderror" 
                                   id="password" 
                                   name="password">
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Confirmar Nova Senha</label>
                            <input type="password" 
                                   class="form-control" 
                                   id="password_confirmation" 
                                   name="password_confirmation">
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <a href="{{ route('arquiteto.usuarios.index') }}" class="btn btn-secondary">Cancelar</a>
                    <button type="submit" class="btn btn-primary">Atualizar</button>
                </div>
            </form>
        </main>
    </div>
</div>
@endsection
