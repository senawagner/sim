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
            <h2>Editar Manutenção #{{ $manutencao->id }}</h2>
        </div>
    </div>

    <div class="card">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Formulário de Edição</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('arquiteto.manutencoes.update', $manutencao) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="tipo" class="form-label">Tipo</label>
                        <select class="form-select @error('tipo') is-invalid @enderror" 
                                id="tipo" 
                                name="tipo" 
                                required>
                            <option value="Preventiva" {{ $manutencao->tipo == 'Preventiva' ? 'selected' : '' }}>Preventiva</option>
                            <option value="Corretiva" {{ $manutencao->tipo == 'Corretiva' ? 'selected' : '' }}>Corretiva</option>
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
                            <option value="Mensal" {{ $manutencao->periodicidade == 'Mensal' ? 'selected' : '' }}>Mensal</option>
                            <option value="Trimestral" {{ $manutencao->periodicidade == 'Trimestral' ? 'selected' : '' }}>Trimestral</option>
                            <option value="Semestral" {{ $manutencao->periodicidade == 'Semestral' ? 'selected' : '' }}>Semestral</option>
                        </select>
                        @error('periodicidade')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-select @error('status') is-invalid @enderror" 
                                id="status" 
                                name="status" 
                                required>
                            <option value="Pendente" {{ $manutencao->status == 'Pendente' ? 'selected' : '' }}>Pendente</option>
                            <option value="Realizada" {{ $manutencao->status == 'Realizada' ? 'selected' : '' }}>Realizada</option>
                            <option value="Atrasada" {{ $manutencao->status == 'Atrasada' ? 'selected' : '' }}>Atrasada</option>
                        </select>
                        @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Campos Filial e Equipamento -->
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="filial_id" class="form-label">Filial</label>
                        <select class="form-select @error('filial_id') is-invalid @enderror" 
                                id="filial_id" 
                                name="filial_id" 
                                required>
                            @foreach($filiais as $filial)
                                <option value="{{ $filial->id }}" {{ $manutencao->filial_id == $filial->id ? 'selected' : '' }}>
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
                            @foreach($equipamentos as $equipamento)
                                <option value="{{ $equipamento->id }}" 
                                        {{ $manutencao->equipamento_id == $equipamento->id ? 'selected' : '' }}>
                                    {{ $equipamento->descricao_completa }}
                                </option>
                            @endforeach
                        </select>
                        @error('equipamento_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Campos de Data -->
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="data_programada" class="form-label">Data Programada</label>
                        <input type="date" 
                               class="form-control @error('data_programada') is-invalid @enderror"
                               id="data_programada" 
                               name="data_programada" 
                               value="{{ $manutencao->data_programada->format('Y-m-d') }}" 
                               required>
                        @error('data_programada')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="data_realizada" class="form-label">Data Realizada</label>
                        <input type="date" 
                               class="form-control @error('data_realizada') is-invalid @enderror"
                               id="data_realizada" 
                               name="data_realizada" 
                               value="{{ $manutencao->data_realizada ? $manutencao->data_realizada->format('Y-m-d') : '' }}">
                        @error('data_realizada')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Campos de Texto -->
                <div class="mb-3">
                    <label for="itens_verificacao" class="form-label">Itens de Verificação</label>
                    <textarea class="form-control @error('itens_verificacao') is-invalid @enderror"
                              id="itens_verificacao" 
                              name="itens_verificacao" 
                              rows="3" 
                              required>{{ $manutencao->itens_verificacao }}</textarea>
                    @error('itens_verificacao')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="observacoes" class="form-label">Observações</label>
                    <textarea class="form-control @error('observacoes') is-invalid @enderror"
                              id="observacoes" 
                              name="observacoes" 
                              rows="3">{{ $manutencao->observacoes }}</textarea>
                    @error('observacoes')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Botões de Ação -->
                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('arquiteto.manutencoes.index') }}" class="btn btn-outline-secondary">
                        <i class="fas fa-times"></i> Cancelar
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Atualizar
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
    });
});
</script>
@endpush
@endsection
