@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row mb-4">
        <div class="col">
            <h2>Novo Equipamento</h2>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.equipamentos.store') }}" method="POST">
                @csrf

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="numero_patrimonio" class="form-label">Número do Patrimônio</label>
                        <input type="text" 
                               class="form-control @error('numero_patrimonio') is-invalid @enderror" 
                               id="numero_patrimonio" 
                               name="numero_patrimonio" 
                               value="{{ old('numero_patrimonio') }}" 
                               required>
                        @error('numero_patrimonio')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="fabricante" class="form-label">Fabricante</label>
                        <input type="text" 
                               class="form-control @error('fabricante') is-invalid @enderror" 
                               id="fabricante" 
                               name="fabricante" 
                               value="{{ old('fabricante') }}" 
                               required>
                        @error('fabricante')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="tipo" class="form-label">Tipo</label>
                        <input type="text" 
                               class="form-control @error('tipo') is-invalid @enderror" 
                               id="tipo" 
                               name="tipo" 
                               value="{{ old('tipo') }}" 
                               required>
                        @error('tipo')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="capacidade" class="form-label">Capacidade</label>
                        <input type="text" 
                               class="form-control @error('capacidade') is-invalid @enderror" 
                               id="capacidade" 
                               name="capacidade" 
                               value="{{ old('capacidade') }}" 
                               required>
                        @error('capacidade')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="filial_id" class="form-label">Filial</label>
                        <select class="form-select @error('filial_id') is-invalid @enderror" 
                                id="filial_id" 
                                name="filial_id" 
                                required>
                            <option value="">Selecione uma filial</option>
                            @foreach($filiais as $filial)
                                <option value="{{ $filial->id }}" 
                                        {{ old('filial_id') == $filial->id ? 'selected' : '' }}>
                                    {{ $filial->nome }}
                                </option>
                            @endforeach
                        </select>
                        @error('filial_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="modelo_evaporadora" class="form-label">Modelo Evaporadora</label>
                        <input type="text" 
                               class="form-control @error('modelo_evaporadora') is-invalid @enderror" 
                               id="modelo_evaporadora" 
                               name="modelo_evaporadora" 
                               value="{{ old('modelo_evaporadora') }}" 
                               required>
                        @error('modelo_evaporadora')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="modelo_condensadora" class="form-label">Modelo Condensadora</label>
                        <input type="text" 
                               class="form-control @error('modelo_condensadora') is-invalid @enderror" 
                               id="modelo_condensadora" 
                               name="modelo_condensadora" 
                               value="{{ old('modelo_condensadora') }}" 
                               required>
                        @error('modelo_condensadora')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="localizacao" class="form-label">Localização</label>
                        <input type="text" 
                               class="form-control @error('localizacao') is-invalid @enderror" 
                               id="localizacao" 
                               name="localizacao" 
                               value="{{ old('localizacao') }}" 
                               required>
                        @error('localizacao')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="andar" class="form-label">Andar</label>
                        <input type="text" 
                               class="form-control @error('andar') is-invalid @enderror" 
                               id="andar" 
                               name="andar" 
                               value="{{ old('andar') }}" 
                               required>
                        @error('andar')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label for="observacoes" class="form-label">Observações</label>
                    <textarea class="form-control @error('observacoes') is-invalid @enderror" 
                              id="observacoes" 
                              name="observacoes" 
                              rows="3">{{ old('observacoes') }}</textarea>
                    @error('observacoes')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-end">
                    <a href="{{ route('admin.equipamentos.index') }}" class="btn btn-secondary me-2">Cancelar</a>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
