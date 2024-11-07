@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row mb-4">
        <div class="col">
            <h2>Relatórios</h2>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('administrador.relatorios.gerar') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="report_type" class="form-label">Tipo de Relatório</label>
                        <select name="report_type" id="report_type" class="form-select" required>
                            <option value="">Selecione o tipo</option>
                            <option value="manutencoes">Manutenções</option>
                            <option value="equipamentos">Equipamentos</option>
                            <option value="usuarios">Usuários</option>
                        </select>
                    </div>
                    
                    <div class="col-md-4 mb-3">
                        <label for="start_date" class="form-label">Data Inicial</label>
                        <input type="date" name="start_date" id="start_date" class="form-control" required>
                    </div>
                    
                    <div class="col-md-4 mb-3">
                        <label for="end_date" class="form-label">Data Final</label>
                        <input type="date" name="end_date" id="end_date" class="form-control" required>
                    </div>
                </div>

                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">Gerar Relatório</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
