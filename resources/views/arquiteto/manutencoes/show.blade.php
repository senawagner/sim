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
            <h2>Detalhes da Manutenção #{{ $manutencao->id }}</h2>
        </div>
    </div>

    <div class="card">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Informações da Manutenção</h5>
            <div>
                <a href="{{ route('arquiteto.manutencoes.edit', $manutencao) }}" class="btn btn-light btn-sm">
                    <i class="fas fa-edit"></i> Editar
                </a>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <!-- Informações Básicas -->
                <div class="col-md-6">
                    <div class="card mb-3">
                        <div class="card-header bg-light">
                            <h6 class="mb-0">Informações Básicas</h6>
                        </div>
                        <div class="card-body">
                            <dl class="row mb-0">
                                <dt class="col-sm-4">Tipo:</dt>
                                <dd class="col-sm-8">
                                    <span class="badge {{ $manutencao->tipo == 'Preventiva' ? 'bg-info' : 'bg-warning' }}">
                                        {{ $manutencao->tipo }}
                                    </span>
                                </dd>

                                <dt class="col-sm-4">Periodicidade:</dt>
                                <dd class="col-sm-8">{{ $manutencao->periodicidade }}</dd>

                                <dt class="col-sm-4">Status:</dt>
                                <dd class="col-sm-8">
                                    <span class="badge {{ 
                                        $manutencao->status == 'Pendente' ? 'bg-warning' : 
                                        ($manutencao->status == 'Realizada' ? 'bg-success' : 'bg-danger') 
                                    }}">
                                        {{ $manutencao->status }}
                                    </span>
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>

                <!-- Localização -->
                <div class="col-md-6">
                    <div class="card mb-3">
                        <div class="card-header bg-light">
                            <h6 class="mb-0">Localização</h6>
                        </div>
                        <div class="card-body">
                            <dl class="row mb-0">
                                <dt class="col-sm-4">Filial:</dt>
                                <dd class="col-sm-8">{{ $manutencao->filial->nome }}</dd>

                                <dt class="col-sm-4">Equipamento:</dt>
                                <dd class="col-sm-8">{{ $manutencao->equipamento->descricao_completa }}</dd>
                            </dl>
                        </div>
                    </div>
                </div>

                <!-- Datas -->
                <div class="col-md-6">
                    <div class="card mb-3">
                        <div class="card-header bg-light">
                            <h6 class="mb-0">Datas</h6>
                        </div>
                        <div class="card-body">
                            <dl class="row mb-0">
                                <dt class="col-sm-4">Data Programada:</dt>
                                <dd class="col-sm-8">{{ $manutencao->data_programada->format('d/m/Y') }}</dd>

                                <dt class="col-sm-4">Data Realizada:</dt>
                                <dd class="col-sm-8">
                                    {{ $manutencao->data_realizada ? $manutencao->data_realizada->format('d/m/Y') : 'Não realizada' }}
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>

                <!-- Detalhes -->
                <div class="col-md-12">
                    <div class="card mb-3">
                        <div class="card-header bg-light">
                            <h6 class="mb-0">Detalhes</h6>
                        </div>
                        <div class="card-body">
                            <dl class="row mb-0">
                                <dt class="col-sm-2">Itens de Verificação:</dt>
                                <dd class="col-sm-10">{{ $manutencao->itens_verificacao }}</dd>

                                <dt class="col-sm-2">Observações:</dt>
                                <dd class="col-sm-10">{{ $manutencao->observacoes ?? 'Nenhuma observação' }}</dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Botões de Ação -->
            <div class="d-flex justify-content-end gap-2">
                <a href="{{ route('arquiteto.manutencoes.index') }}" class="btn btn-outline-secondary">
                    <i class="fas fa-arrow-left"></i> Voltar
                </a>
                <a href="{{ route('arquiteto.manutencoes.edit', $manutencao) }}" class="btn btn-primary">
                    <i class="fas fa-edit"></i> Editar
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
