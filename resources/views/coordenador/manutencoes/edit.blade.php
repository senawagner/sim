@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Manutenção</h1>
    <form action="{{ route('admin.manutencoes.update', $manutencao) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="tipo">Tipo</label>
            <select name="tipo" id="tipo" class="form-control" required>
                <option value="Preventiva" {{ $manutencao->tipo == 'Preventiva' ? 'selected' : '' }}>Preventiva</option>
                <option value="Corretiva" {{ $manutencao->tipo == 'Corretiva' ? 'selected' : '' }}>Corretiva</option>
            </select>
        </div>
        <div class="form-group">
            <label for="periodicidade">Periodicidade</label>
            <select name="periodicidade" id="periodicidade" class="form-control" required>
                <option value="Mensal" {{ $manutencao->periodicidade == 'Mensal' ? 'selected' : '' }}>Mensal</option>
                <option value="Trimestral" {{ $manutencao->periodicidade == 'Trimestral' ? 'selected' : '' }}>Trimestral</option>
                <option value="Semestral" {{ $manutencao->periodicidade == 'Semestral' ? 'selected' : '' }}>Semestral</option>
            </select>
        </div>
        <div class="form-group">
            <label for="filial_id">Filial</label>
            <select name="filial_id" id="filial_id" class="form-control" required>
                @foreach($filiais as $filial)
                    <option value="{{ $filial->id }}" {{ $manutencao->filial_id == $filial->id ? 'selected' : '' }}>{{ $filial->nome }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="equipamento_id">Equipamento</label>
            <select name="equipamento_id" id="equipamento_id" class="form-control" required>
                @foreach($equipamentos as $equipamento)
                    <option value="{{ $equipamento->equipamento_id }}" {{ $manutencao->equipamento_id == $equipamento->equipamento_id ? 'selected' : '' }}>{{ $equipamento->descricao_completa }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="data_programada">Data Programada</label>
            <input type="date" name="data_programada" id="data_programada" class="form-control" value="{{ $manutencao->data_programada->format('Y-m-d') }}" required>
        </div>
        <div class="form-group">
            <label for="data_realizada">Data Realizada</label>
            <input type="date" name="data_realizada" id="data_realizada" class="form-control" value="{{ $manutencao->data_realizada ? $manutencao->data_realizada->format('Y-m-d') : '' }}">
        </div>
        <div class="form-group">
            <label for="itens_verificacao">Itens de Verificação</label>
            <textarea name="itens_verificacao" id="itens_verificacao" class="form-control" rows="3" required>{{ $manutencao->itens_verificacao }}</textarea>
        </div>
        <div class="form-group">
            <label for="observacoes">Observações</label>
            <textarea name="observacoes" id="observacoes" class="form-control" rows="3">{{ $manutencao->observacoes }}</textarea>
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" id="status" class="form-control" required>
                <option value="Pendente" {{ $manutencao->status == 'Pendente' ? 'selected' : '' }}>Pendente</option>
                <option value="Realizada" {{ $manutencao->status == 'Realizada' ? 'selected' : '' }}>Realizada</option>
                <option value="Atrasada" {{ $manutencao->status == 'Atrasada' ? 'selected' : '' }}>Atrasada</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Atualizar</button>
    </form>
</div>

@push('scripts')
<script>
    document.getElementById('filial_id').addEventListener('change', function() {
        const filialId = this.value;
        fetch(`/admin/equipamentos-por-filial/${filialId}`)
            .then(response => response.json())
            .then(data => {
                const equipamentoSelect = document.getElementById('equipamento_id');
                equipamentoSelect.innerHTML = '';
                for (const [id, descricao] of Object.entries(data)) {
                    const option = new Option(descricao, id);
                    equipamentoSelect.add(option);
                }
            });
    });
</script>
@endpush
@endsection
