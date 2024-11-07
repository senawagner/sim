@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <!-- Botão Voltar -->
    <div class="row mb-3">
        <div class="col-auto">
            <a href="{{ route('arquiteto.manutencoes.index') }}" class="btn btn-outline-primary">
                <i class="fas fa-arrow-left"></i> Voltar
            </a>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col">
            <h2>Nova Manutenção</h2>
        </div>
    </div>

    <div class="card">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Formulário de Manutenção</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('arquiteto.manutencoes.store') }}" method="POST">
                @csrf
                
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="tipo" class="form-label">Tipo</label>
                        <select class="form-select @error('tipo') is-invalid @enderror" 
                                id="tipo" 
                                name="tipo" 
                                required>
                            <option value="">Selecione o tipo</option>
                            <option value="Preventiva" {{ old('tipo') == 'Preventiva' ? 'selected' : '' }}>Preventiva</option>
                            <option value="Corretiva" {{ old('tipo') == 'Corretiva' ? 'selected' : '' }}>Corretiva</option>
                        </select>
                        @error('tipo')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="periodicidade" class="form-label">Periodicidade</label>
                        <select class="form-select @error('periodicidade') is-invalid @enderror" 
                                id="periodicidade" 
                                name="periodicidade" 
                                required>
                            <option value="">Selecione a periodicidade</option>
                            <option value="Mensal" {{ old('periodicidade') == 'Mensal' ? 'selected' : '' }}>Mensal</option>
                            <option value="Trimestral" {{ old('periodicidade') == 'Trimestral' ? 'selected' : '' }}>Trimestral</option>
                            <option value="Semestral" {{ old('periodicidade') == 'Semestral' ? 'selected' : '' }}>Semestral</option>
                        </select>
                        @error('periodicidade')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="data_programada" class="form-label">Data Programada</label>
                        <input type="date" 
                               class="form-control @error('data_programada') is-invalid @enderror" 
                               id="data_programada" 
                               name="data_programada" 
                               value="{{ old('data_programada') }}">
                        @error('data_programada')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="filial_id" class="form-label">Filial</label>
                        <select class="form-select @error('filial_id') is-invalid @enderror" 
                                id="filial_id" 
                                name="filial_id" 
                                required>
                            <option value="">Selecione a filial</option>
                            @foreach($filiais as $filial)
                                <option value="{{ $filial->id }}" {{ old('filial_id') == $filial->id ? 'selected' : '' }}>
                                    {{ $filial->nome }}
                                </option>
                            @endforeach
                        </select>
                        @error('filial_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="equipamento_id" class="form-label">Equipamento</label>
                        <select class="form-select @error('equipamento_id') is-invalid @enderror" 
                                id="equipamento_id" 
                                name="equipamento_id" 
                                required>
                            <option value="">Selecione primeiro a filial</option>
                        </select>
                        @error('equipamento_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label for="itens_verificacao" class="form-label">Itens de Verificação</label>
                    <textarea class="form-control @error('itens_verificacao') is-invalid @enderror" 
                              id="itens_verificacao" 
                              name="itens_verificacao" 
                              rows="3" 
                              required>{{ old('itens_verificacao') }}</textarea>
                    @error('itens_verificacao')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
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

                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('arquiteto.manutencoes.index') }}" class="btn btn-outline-secondary">
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

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const filialSelect = document.getElementById('filial_id');
    const equipamentoSelect = document.getElementById('equipamento_id');
    
    filialSelect.addEventListener('change', function() {
        const filialId = this.value;
        equipamentoSelect.innerHTML = '<option value="">Carregando...</option>';
        
        if (filialId) {
            fetch(`/arquiteto/equipamentos-por-filial/${filialId}`)
                .then(response => response.json())
                .then(data => {
                    equipamentoSelect.innerHTML = '<option value="">Selecione o equipamento</option>';
                    data.forEach(equipamento => {
                        const option = new Option(equipamento.text, equipamento.id);
                        equipamentoSelect.add(option);
                    });
                })
                .catch(error => {
                    console.error('Erro:', error);
                    equipamentoSelect.innerHTML = '<option value="">Erro ao carregar equipamentos</option>';
                });
        } else {
            equipamentoSelect.innerHTML = '<option value="">Selecione primeiro a filial</option>';
        }
    });
});
</script>
@endpush
@endsection
