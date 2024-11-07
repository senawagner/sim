@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        @include('arquiteto.partials.sidebar')

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Novo Usuário</h1>
            </div>

            <form action="{{ route('arquiteto.usuarios.store') }}" method="POST">
                @csrf
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="nome_usuario" class="form-label">Nome</label>
                            <input type="text" 
                                   class="form-control @error('nome_usuario') is-invalid @enderror" 
                                   id="nome_usuario" 
                                   name="nome_usuario" 
                                   value="{{ old('nome_usuario') }}" 
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
                                   value="{{ old('email') }}" 
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
                                <option value="arquiteto" {{ old('perfil') == 'arquiteto' ? 'selected' : '' }}>Arquiteto</option>
                                <option value="administrador" {{ old('perfil') == 'administrador' ? 'selected' : '' }}>Administrador</option>
                                <option value="coordenador" {{ old('perfil') == 'coordenador' ? 'selected' : '' }}>Coordenador</option>
                                <option value="tecnico" {{ old('perfil') == 'tecnico' ? 'selected' : '' }}>Técnico</option>
                            </select>
                            @error('perfil')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Senha</label>
                            <input type="password" 
                                   class="form-control @error('password') is-invalid @enderror" 
                                   id="password" 
                                   name="password" 
                                   required>
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Confirmar Senha</label>
                            <input type="password" 
                                   class="form-control" 
                                   id="password_confirmation" 
                                   name="password_confirmation" 
                                   required>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <a href="{{ route('arquiteto.usuarios.index') }}" class="btn btn-secondary">Cancelar</a>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </form>
        </main>
    </div>
</div>
@endsection
