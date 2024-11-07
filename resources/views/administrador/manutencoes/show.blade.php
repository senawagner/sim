@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalhes da Manutenção</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Manutenção #{{ $manutencao->id }}</h5>
            <p><strong>Tipo:</strong> {{ $manutencao->tipo ?? 'Não definido' }}</p>
            <p><strong>Periodicidade:</strong> {{ $manutencao->periodicidade ?? 'Não definida' }}</p>
            <p><strong>Filial:</strong> {{ $manutencao->filial->nome ?? 'Não definida' }}</p>
            <p><strong>Equipamento:</strong> {{ $manutencao->equipamento->descricao_completa ?? 'Não definido' }}</p>
            <p><strong>Data Programada:</strong> {{ $manutencao->data_programada ? $manutencao->data_programada->format('d/m/Y') : 'Não definida' }}</p>
            <p><strong>Data Realizada:</strong> {{ $manutencao->data_realizada ? $manutencao->data_realizada->format('d/m/Y') : 'Não realizada' }}</p>
            <p><strong>Status:</strong> {{ $manutencao->status ?? 'Não definido' }}</p>
            <p><strong>Observações:</strong> {{ $manutencao->observacoes ?? 'Nenhuma observação' }}</p>
        </div>
    </div>

    <div class="mt-3">
        <a href="{{ route('administrador.manutencoes.edit', $manutencao) }}" class="btn btn-primary">Editar</a>
        <a href="{{ route('administrador.manutencoes.index') }}" class="btn btn-secondary">Voltar</a>
    </div>
</div>
@endsection

