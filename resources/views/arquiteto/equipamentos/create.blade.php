@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <!-- Botão Voltar -->
    <div class="row mb-3">
        <div class="col-auto">
            <a href="{{ route('arquiteto.equipamentos.index') }}" class="btn btn-outline-primary">
                <i class="fas fa-arrow-left"></i> Voltar
            </a>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col">
            <h2>Novo Equipamento</h2>
        </div>
    </div>

    <div class="card">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Formulário de Cadastro</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('arquiteto.equipamentos.store') }}" method="POST">
                @csrf

                <!-- Informações Básicas -->
                <div class="card mb-4">
                    <div class="card-header bg-light">
                        <h6 class="mb-0">Informações Básicas</h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="numero_patrimonio" class="form-label">Número do Patrimônio</label>
                                <input type="text" class="form-control @error('numero_patrimonio') is-invalid @enderror"
                                    id="numero_patrimonio" name="numero_patrimonio" value="{{ old('numero_patrimonio') }}" required>
                                @error('numero_patrimonio')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="tipo" class="form-label">Tipo</label>
                                <select class="form-select @error('tipo') is-invalid @enderror" id="tipo" name="tipo" required>
                                    <option value="">Selecione o tipo</option>
                                    <option value="Split" {{ old('tipo') == 'Split' ? 'selected' : '' }}>Split</option>
                                    <option value="ACJ" {{ old('tipo') == 'ACJ' ? 'selected' : '' }}>ACJ</option>
                                </select>
                                @error('tipo')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="fabricante_id" class="form-label">Fabricante</label>
                                <select class="form-select @error('fabricante_id') is-invalid @enderror" 
                                        id="fabricante_id" name="fabricante_id" required>
                                    <option value="">Selecione o fabricante</option>
                                    @foreach($fabricantes as $fabricante)
                                        <option value="{{ $fabricante->id }}" 
                                                {{ old('fabricante_id') == $fabricante->id ? 'selected' : '' }}>
                                            {{ $fabricante->nome }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('fabricante_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Especificações Técnicas -->
                <div class="card mb-4">
                    <div class="card-header bg-light">
                        <h6 class="mb-0">Especificações Técnicas</h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="capacidade_id" class="form-label">Capacidade</label>
                                <select class="form-select @error('capacidade_id') is-invalid @enderror" 
                                        id="capacidade_id" name="capacidade_id" required>
                                    <option value="">Selecione a capacidade</option>
                                    @foreach($capacidades as $capacidade)
                                        <option value="{{ $capacidade->id }}" 
                                                {{ old('capacidade_id') == $capacidade->id ? 'selected' : '' }}>
                                            {{ $capacidade->valor }} BTUs
                                        </option>
                                    @endforeach
                                </select>
                                @error('capacidade_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="modelo_evaporadora_id" class="form-label">Modelo Evaporadora</label>
                                <select class="form-select @error('modelo_evaporadora_id') is-invalid @enderror" 
                                        id="modelo_evaporadora_id" name="modelo_evaporadora_id" required>
                                    <option value="">Selecione o modelo</option>
                                    @foreach($modelos as $modelo)
                                        <option value="{{ $modelo->id }}" 
                                                {{ old('modelo_evaporadora_id') == $modelo->id ? 'selected' : '' }}>
                                            {{ $modelo->codigo }} - {{ $modelo->tipo }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('modelo_evaporadora_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="modelo_condensadora_id" class="form-label">Modelo Condensadora</label>
                                <select class="form-select @error('modelo_condensadora_id') is-invalid @enderror" 
                                        id="modelo_condensadora_id" name="modelo_condensadora_id" required>
                                    <option value="">Selecione o modelo</option>
                                    @foreach($modelos as $modelo)
                                        <option value="{{ $modelo->id }}" 
                                                {{ old('modelo_condensadora_id') == $modelo->id ? 'selected' : '' }}>
                                            {{ $modelo->codigo }} - {{ $modelo->tipo }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('modelo_condensadora_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Localização -->
                <div class="card mb-4">
                    <div class="card-header bg-light">
                        <h6 class="mb-0">Localização</h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="filial_id" class="form-label">Filial</label>
                                <select class="form-select @error('filial_id') is-invalid @enderror" 
                                        id="filial_id" name="filial_id" required>
                                    <option value="">Selecione a filial</option>
                                    @if($filiais->isEmpty())
                                        <option value="" disabled>Nenhuma filial cadastrada</option>
                                    @else
                                        @foreach($filiais as $filial)
                                            <option value="{{ $filial->id }}" 
                                                    {{ old('filial_id') == $filial->id ? 'selected' : '' }}
                                                    data-cidade="{{ $filial->cidade }}"
                                                    data-estado="{{ $filial->estado }}">
                                                {{ $filial->nome }} - {{ $filial->cidade }}/{{ $filial->estado }}
                                            </option>
                                        @endforeach
                                    @endif
                                </select>
                                @error('filial_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                
                                {{-- Debug temporário --}}
                                <small class="text-muted">
                                    Total de filiais: {{ $filiais->count() }}
                                </small>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="localizacao_id" class="form-label">Localização</label>
                                <select class="form-select @error('localizacao_id') is-invalid @enderror" 
                                        id="localizacao_id" name="localizacao_id" required>
                                    <option value="">Selecione a localização</option>
                                    @foreach($localizacoes as $localizacao)
                                        <option value="{{ $localizacao->id }}" 
                                                {{ old('localizacao_id') == $localizacao->id ? 'selected' : '' }}>
                                            {{ $localizacao->nome }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('localizacao_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="setor_id" class="form-label">Setor</label>
                                <select class="form-select @error('setor_id') is-invalid @enderror" 
                                        id="setor_id" name="setor_id" required>
                                    <option value="">Selecione o setor</option>
                                    @foreach($setores as $setor)
                                        <option value="{{ $setor->id }}" 
                                                {{ old('setor_id') == $setor->id ? 'selected' : '' }}>
                                            {{ $setor->nome }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('setor_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Observações -->
                <div class="card mb-4">
                    <div class="card-header bg-light">
                        <h6 class="mb-0">Observações</h6>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <textarea class="form-control @error('observacoes') is-invalid @enderror" 
                                    id="observacoes" name="observacoes" rows="3">{{ old('observacoes') }}</textarea>
                            @error('observacoes')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Botões de Ação -->
                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('arquiteto.equipamentos.index') }}" class="btn btn-outline-secondary">
                        <i class="fas fa-times"></i> Cancelar
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Salvar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const filialSelect = document.getElementById('filial_id');
    
    filialSelect.addEventListener('change', function() {
        const selectedOption = this.options[this.selectedIndex];
        const cidade = selectedOption.getAttribute('data-cidade');
        const estado = selectedOption.getAttribute('data-estado');
        
        // Aqui você pode adicionar lógica adicional, como:
        // - Atualizar um elemento com mais informações da filial
        // - Filtrar setores/localizações baseado na filial selecionada
        // - etc
    });
});
</script>
@endpush
