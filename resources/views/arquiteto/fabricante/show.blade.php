@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Detalhes do Registro</h2>
        <div>
            <a href="{{ route($routePrefix . '.edit', $record) }}" class="btn btn-primary">
                <i class="fas fa-edit"></i> Editar
            </a>
            <a href="{{ route($routePrefix . '.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Voltar
            </a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <dl class="row">
                <dt class="col-sm-3">ID:</dt>
                <dd class="col-sm-9">{{ $record->id }}</dd>

                <dt class="col-sm-3">Nome:</dt>
                <dd class="col-sm-9">{{ $record->nome }}</dd>

                <dt class="col-sm-3">Status:</dt>
                <dd class="col-sm-9">
                    <span class="badge {{ $record->ativo ? 'bg-success' : 'bg-danger' }}">
                        {{ $record->ativo ? 'Ativo' : 'Inativo' }}
                    </span>
                </dd>

                <dt class="col-sm-3">Criado em:</dt>
                <dd class="col-sm-9">{{ $record->created_at->format('d/m/Y H:i:s') }}</dd>

                <dt class="col-sm-3">Atualizado em:</dt>
                <dd class="col-sm-9">{{ $record->updated_at->format('d/m/Y H:i:s') }}</dd>
            </dl>
        </div>
    </div>
</div>
@endsection