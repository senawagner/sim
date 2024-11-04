@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row mb-4">
        <div class="col">
            <h2>Editar Equipamento</h2>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.equipamentos.update', $equipamento->equipamento_id) }}" method="POST">
                @csrf
                @method('PUT')

                {{-- Usar o mesmo formulário do create.blade.php, mas com os valores do $equipamento --}}
                {{-- Copie todo o conteúdo do formulário do create.blade.php e substitua old('campo') por old('campo', $equipamento->campo) --}}

                <div class="d-flex justify-content-end">
                    <a href="{{ route('admin.equipamentos.index') }}" class="btn btn-secondary me-2">Cancelar</a>
                    <button type="submit" class="btn btn-primary">Atualizar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
