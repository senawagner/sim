@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Manutenções</h1>
    <a href="{{ route('admin.manutencoes.create') }}" class="btn btn-primary mb-3">Nova Manutenção</a>
    
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tipo</th>
                <th>Filial</th>
                <th>Equipamento</th>
                <th>Data Programada</th>
                <th>Status</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($manutencoes as $manutencao)
            <tr>
                <td>{{ $manutencao->id }}</td>
                <td>{{ $manutencao->tipo }}</td>
                <td>{{ $manutencao->filial->nome }}</td>
                <td>{{ $manutencao->equipamento->descricao_completa }}</td>
                <td>{{ $manutencao->data_programada->format('d/m/Y') }}</td>
                <td>{{ $manutencao->status }}</td>
                <td>
                    <a href="{{ route('admin.manutencoes.show', $manutencao) }}" class="btn btn-sm btn-info">Ver</a>
                    <a href="{{ route('admin.manutencoes.edit', $manutencao) }}" class="btn btn-sm btn-primary">Editar</a>
                    <form action="{{ route('admin.manutencoes.destroy', $manutencao) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza que deseja excluir esta manutenção?')">Excluir</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
    {{ $manutencoes->links() }}
</div>
@endsection
