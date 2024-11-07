@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Manutenção</h1>
    
    <form action="{{ route('administrador.manutencoes.update', ['manutenco' => $manutencao->id]) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group mb-3">
            <label for="tipo">Tipo</label>
            <select name="tipo" id="tipo" class="form-control" required>
                <option value="Preventiva" {{ $manutencao->tipo == 'Preventiva' ? 'selected' : '' }}>Preventiva</option>
                <option value="Corretiva" {{ $manutencao->tipo == 'Corretiva' ? 'selected' : '' }}>Corretiva</option>
            </select>
        </div>

        <div class="form-group mb-3">
            <label for="periodicidade">Periodicidade</label>
            <select name="periodicidade" id="periodicidade" class="form-control" required>
                <option value="Mensal" {{ $manutencao->periodicidade == 'Mensal' ? 'selected' : '' }}>Mensal</option>
                <option value="Trimestral" {{ $manutencao->periodicidade == 'Trimestral' ? 'selected' : '' }}>Trimestral</option>
                <option value="Semestral" {{ $manutencao->periodicidade == 'Semestral' ? 'selected' : '' }}>Semestral</option>
            </select>
        </div>

        <div class="form-group mb-3">
            <label for="filial_id">Filial</label>
            <select name="filial_id" id="filial_id" class="form-control" required>
                @foreach($filiais as $filial)
                    <option value="{{ $filial->id }}" {{ $manutencao->filial_id == $filial->id ? 'selected' : '' }}>
                        {{ $filial->nome }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group mb-3">
            <label for="equipamento_id">Equipamento</label>
            <select name="equipamento_id" id="equipamento_id" class="form-control" required>
                @foreach($equipamentos as $equipamento)
                    <option value="{{ $equipamento->id }}" {{ $manutencao->equipamento_id == $equipamento->id ? 'selected' : '' }}>
                        {{ $equipamento->descricao_completa }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group mb-3">
            <label for="data_programada">Data Programada</label>
            <input type="date" name="data_programada" id="data_programada" class="form-control" 
                value="{{ $manutencao->data_programada ? $manutencao->data_programada->format('Y-m-d') : '' }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="observacoes">Observações</label>
            <textarea name="observacoes" id="observacoes" class="form-control" rows="3">{{ $manutencao->observacoes }}</textarea>
        </div>

        <div class="form-group mb-3">
            <label for="status">Status</label>
            <select name="status" id="status" class="form-control" required>
                <option value="Pendente" {{ $manutencao->status == 'Pendente' ? 'selected' : '' }}>Pendente</option>
                <option value="Realizada" {{ $manutencao->status == 'Realizada' ? 'selected' : '' }}>Realizada</option>
                <option value="Atrasada" {{ $manutencao->status == 'Atrasada' ? 'selected' : '' }}>Atrasada</option>
            </select>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Atualizar</button>
            <a href="{{ route('administrador.manutencoes.index') }}" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</div>
@endsection
