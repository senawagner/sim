@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalhes da Manutenção</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Manutenção #{{ $manutencao->id }}</h5>
            <p><strong>Tipo:</strong> {{ $manutencao->tipo }}</p>
            <p><strong>Periodicidade:</strong> {{ $manutencao->periodicidade }}</p>
            <p><strong>Filial:</strong> {{ $manutencao->filial->nome }}</p>
            <p><strong>Equipamento:</strong> {{ $manutencao->equipamento->descricao_completa }}</p>
            <p><strong>Data Programada:</strong> {{ $manutencao->data_programada->format('d/m/Y') }}</p>
            <p><strong>Data Realizada:</strong> {{ $manutencao->data_realizada ? $manutencao->data_realizada->format('d/m/Y') : 'Não realizada' }}</p>
            <p><strong>Status:</strong> {{ $manutencao->status }}</p>
            <p><strong>Itens de Verificação:</strong> {{ $manutencao->itens_verificacao }}</p>
            <p><strong>Observações:</strong> {{ $manutencao->observacoes ?? 'Nenhuma observação' }}</p>
        </div>
    </div>
    <a href="{{ route('admin.manutencoes.edit', $manutencao) }}" class="btn btn-primary mt-3">Editar</a>
    <a href="{{ route('admin.manutencoes.index') }}" class="btn btn-secondary mt-3">Voltar</a>
</div>
@endsection
