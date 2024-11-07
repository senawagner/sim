@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Nova Manutenção</h1>
    <form id="manutencaoForm" method="POST" action="{{ route('admin.manutencoes.store') }}">
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
            <label for="itens_verificacao" class="form-label">Itens de Verificação</label>
            <textarea name="itens_verificacao" id="itens_verificacao" class="form-control @error('itens_verificacao') is-invalid @enderror" rows="3" required>{{ old('itens_verificacao') }}</textarea>
            @error('itens_verificacao')
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
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
</div>

@push('scripts')
    <script src="{{ asset('js/manutencao-form-validation.js') }}"></script>
    <script src="{{ asset('js/manutencao-equipamentos.js') }}"></script>
@endpush
@endsection
