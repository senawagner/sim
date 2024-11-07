@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>{{ isset($record) ? 'Editar Registro' : 'Novo Registro' }}</h2>
        <a href="{{ route($routePrefix . '.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Voltar
        </a>
    </div>

    @if($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <form action="{{ isset($record) ? route($routePrefix . '.update', $record) : route($routePrefix . '.store') }}" 
                  method="POST">
                @csrf
                @if(isset($record))
                    @method('PUT')
                @endif

                <div class="mb-3">
                    <label for="nome" class="form-label">Nome</label>
                    <input type="text" 
                           class="form-control @error('nome') is-invalid @enderror" 
                           id="nome" 
                           name="nome" 
                           value="{{ old('nome', $record->nome ?? '') }}" 
                           required>
                    @error('nome')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <div class="form-check">
                        <input type="checkbox" 
                               class="form-check-input" 
                               id="ativo" 
                               name="ativo" 
                               value="1" 
                               {{ old('ativo', $record->ativo ?? true) ? 'checked' : '' }}>
                        <label class="form-check-label" for="ativo">Ativo</label>
                    </div>
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Salvar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection