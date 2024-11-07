@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Nova Manutenção</h1>
        <a href="{{ route('administrador.dashboard') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Voltar ao Dashboard
        </a>
    </div>

    <form id="manutencaoForm" method="POST" action="{{ route('administrador.manutencoes.store') }}">
        @csrf
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="tipo" class="form-label">Tipo</label>
                <select name="tipo" id="tipo" class="form-select @error('tipo') is-invalid @enderror" required>
                    <option value="">Selecione o tipo</option>
                    <option value="Preventiva" {{ old('tipo') == 'Preventiva' ? 'selected' : '' }}>Preventiva</option>
                    <option value="Corretiva" {{ old('tipo') == 'Corretiva' ? 'selected' : '' }}>Corretiva</option>
                </select>
                @error('tipo')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="periodicidade" class="form-label">Periodicidade</label>
                <select name="periodicidade" id="periodicidade" class="form-select @error('periodicidade') is-invalid @enderror" required>
                    <option value="">Selecione a periodicidade</option>
                    <option value="Mensal" {{ old('periodicidade') == 'Mensal' ? 'selected' : '' }}>Mensal</option>
                    <option value="Trimestral" {{ old('periodicidade') == 'Trimestral' ? 'selected' : '' }}>Trimestral</option>
                    <option value="Semestral" {{ old('periodicidade') == 'Semestral' ? 'selected' : '' }}>Semestral</option>
                </select>
                @error('periodicidade')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="filial_id" class="form-label">Filial</label>
                <select name="filial_id" id="filial_id" class="form-select @error('filial_id') is-invalid @enderror" required>
                    <option value="">Selecione a filial</option>
                    @foreach($filiais as $filial)
                        <option value="{{ $filial->id }}" {{ old('filial_id') == $filial->id ? 'selected' : '' }}>{{ $filial->nome }}</option>
                    @endforeach
                </select>
                @error('filial_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="equipamento_id" class="form-label">Equipamento</label>
                <select name="equipamento_id" id="equipamento_id" class="form-select @error('equipamento_id') is-invalid @enderror" required>
                    <option value="">Selecione o equipamento</option>
                    <!-- Será preenchido via JavaScript -->
                </select>
                @error('equipamento_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="mb-3">
            <label for="data_programada" class="form-label">Data Programada</label>
            <input type="date" name="data_programada" id="data_programada" class="form-control @error('data_programada') is-invalid @enderror" value="{{ old('data_programada') }}" required>
            @error('data_programada')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="observacoes" class="form-label">Observações</label>
            <textarea name="observacoes" id="observacoes" class="form-control @error('observacoes') is-invalid @enderror" rows="3">{{ old('observacoes') }}</textarea>
            @error('observacoes')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="d-flex gap-2 mt-3">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Salvar
            </button>
            <a href="{{ route('administrador.dashboard') }}" class="btn btn-secondary">
                <i class="fas fa-times"></i> Cancelar
            </a>
        </div>
    </form>
</div>

@if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

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

@push('scripts')
<script>
// Antes dos outros scripts
window.onerror = function(msg, url, line) {
    console.error('Erro JS:', {msg, url, line});
    return false;
};
</script>

<!-- Seus scripts normais -->
<script src="{{ asset('js/manutencao-form-validation.js') }}"></script>
<script src="{{ asset('js/manutencao-equipamentos.js') }}"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Toast auto-hide
    const toastElList = document.querySelectorAll('.toast');
    toastElList.forEach(toast => {
        setTimeout(() => {
            toast.classList.remove('show');
        }, 3000);
    });
});
</script>
@endpush
@endsection
