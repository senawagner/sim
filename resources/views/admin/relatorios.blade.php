@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Relatórios</h1>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Gerar Relatório</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.relatorios.gerar') }}">
                        @csrf
                        <div class="form-group">
                            <label for="report_type">Tipo de Relatório</label>
                            <select class="form-control" id="report_type" name="report_type">
                                <option value="manutencoes">Manutenções</option>
                                <option value="equipamentos">Equipamentos</option>
                                <option value="usuarios">Usuários</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="start_date">Data Inicial</label>
                            <input type="date" class="form-control" id="start_date" name="start_date">
                        </div>
                        <div class="form-group">
                            <label for="end_date">Data Final</label>
                            <input type="date" class="form-control" id="end_date" name="end_date">
                        </div>
                        <button type="submit" class="btn btn-primary">Gerar Relatório</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
