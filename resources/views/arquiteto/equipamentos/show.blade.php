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
            <h2>Detalhes do Equipamento #{{ $equipamento->id }}</h2>
        </div>
    </div>

    <div class="card">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Informações do Equipamento</h5>
            <div>
                <a href="{{ route('arquiteto.equipamentos.edit', $equipamento) }}" class="btn btn-light btn-sm">
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
                                <dt class="col-sm-4">Patrimônio:</dt>
                                <dd class="col-sm-8">{{ $equipamento->numero_patrimonio }}</dd>

                                <dt class="col-sm-4">Tipo:</dt>
                                <dd class="col-sm-8">
                                    <span class="badge {{ $equipamento->tipo == 'Split' ? 'bg-info' : 'bg-secondary' }}">
                                        {{ $equipamento->tipo }}
                                    </span>
                                </dd>

                                <dt class="col-sm-4">Fabricante:</dt>
                                <dd class="col-sm-8">{{ $equipamento->fabricante->nome }}</dd>
                            </dl>
                        </div>
                    </div>
                </div>

                <!-- Especificações Técnicas -->
                <div class="col-md-6">
                    <div class="card mb-3">
                        <div class="card-header bg-light">
                            <h6 class="mb-0">Especificações Técnicas</h6>
                        </div>
                        <div class="card-body">
                            <dl class="row mb-0">
                                <dt class="col-sm-4">Capacidade:</dt>
                                <dd class="col-sm-8">{{ $equipamento->capacidade->valor }} BTUs</dd>

                                <dt class="col-sm-4">Modelo Evaporadora:</dt>
                                <dd class="col-sm-8">{{ $equipamento->modeloEvaporadora->modelo }}</dd>

                                <dt class="col-sm-4">Modelo Condensadora:</dt>
                                <dd class="col-sm-8">{{ $equipamento->modeloCondensadora->modelo }}</dd>
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
                                <dd class="col-sm-8">{{ $equipamento->filial->nome }}</dd>

                                <dt class="col-sm-4">Localização:</dt>
                                <dd class="col-sm-8">{{ $equipamento->localizacao->nome }}</dd>

                                <dt class="col-sm-4">Setor:</dt>
                                <dd class="col-sm-8">{{ $equipamento->setor->nome }}</dd>
                            </dl>
                        </div>
                    </div>
                </div>

                <!-- Observações -->
                <div class="col-md-12">
                    <div class="card mb-3">
                        <div class="card-header bg-light">
                            <h6 class="mb-0">Observações</h6>
                        </div>
                        <div class="card-body">
                            <p class="mb-0">{{ $equipamento->observacoes ?? 'Nenhuma observação registrada.' }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Botões de Ação -->
            <div class="d-flex justify-content-end gap-2">
                <a href="{{ route('arquiteto.equipamentos.index') }}" class="btn btn-outline-secondary">
                    <i class="fas fa-arrow-left"></i> Voltar
                </a>
                <a href="{{ route('arquiteto.equipamentos.edit', $equipamento) }}" class="btn btn-primary">
                    <i class="fas fa-edit"></i> Editar
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
