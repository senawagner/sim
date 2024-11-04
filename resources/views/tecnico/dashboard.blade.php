@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Sidebar com tema específico do técnico -->
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-warning sidebar">
            <div class="position-sticky pt-3">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('tecnico/dashboard') ? 'active' : '' }}" 
                           href="{{ route('tecnico.dashboard') }}">
                            <i class="fas fa-tachometer-alt"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('tecnico/manutencoes*') ? 'active' : '' }}" 
                           href="{{ route('tecnico.manutencoes.index') }}">
                            <i class="fas fa-tools"></i> Minhas Manutenções
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('tecnico/equipamentos*') ? 'active' : '' }}" 
                           href="{{ route('tecnico.equipamentos.index') }}">
                            <i class="fas fa-server"></i> Equipamentos
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- Main content -->
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Dashboard do Técnico - Bem-vindo, {{ Auth::user()->nome }}</h1>
            </div>

            <!-- Cards de Estatísticas -->
            <div class="row mb-4">
                <div class="col-md-4">
                    <div class="card border-warning">
                        <div class="card-body">
                            <h5 class="card-title text-warning">Total de Manutenções</h5>
                            <p class="card-text display-4">{{ $totalMaintenances ?? 0 }}</p>
                            <small class="text-success"><i class="fas fa-arrow-up"></i> 3.2% desde ontem</small>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card border-warning">
                        <div class="card-body">
                            <h5 class="card-title text-warning">Manutenções Hoje</h5>
                            <p class="card-text display-4">{{ $todayMaintenances ?? 0 }}</p>
                            <small class="text-warning"><i class="fas fa-clock"></i> Programadas para hoje</small>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card border-warning">
                        <div class="card-body">
                            <h5 class="card-title text-warning">Manutenções Pendentes</h5>
                            <p class="card-text display-4">{{ $pendingMaintenances->count() ?? 0 }}</p>
                            <small class="text-danger"><i class="fas fa-exclamation-triangle"></i> Requer atenção</small>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Lista de Manutenções Pendentes e Gráfico -->
            <div class="row mb-4">
                <div class="col-md-8">
                    <div class="card border-warning">
                        <div class="card-header bg-warning text-dark">
                            <i class="fas fa-clipboard-list"></i> Manutenções Pendentes
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Equipamento</th>
                                            <th>Filial</th>
                                            <th>Data Programada</th>
                                            <th>Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($pendingMaintenances as $maintenance)
                                        <tr>
                                            <td>{{ $maintenance->equipamento->nome }}</td>
                                            <td>{{ $maintenance->filial->nome }}</td>
                                            <td>{{ Carbon\Carbon::parse($maintenance->data_programada)->format('d/m/Y') }}</td>
                                            <td>
                                                <a href="{{ route('tecnico.manutencoes.show', $maintenance->id) }}" 
                                                   class="btn btn-sm btn-warning">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="4" class="text-center">Nenhuma manutenção pendente</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card border-warning">
                        <div class="card-header bg-warning text-dark">
                            <i class="fas fa-chart-bar"></i> Manutenções por Mês
                        </div>
                        <div class="card-body">
                            <canvas id="maintenancesByMonthChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Equipamentos que Precisam de Manutenção -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card border-warning">
                        <div class="card-header bg-warning text-dark">
                            <i class="fas fa-exclamation-triangle"></i> Equipamentos que Precisam de Manutenção
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Equipamento</th>
                                            <th>Última Manutenção</th>
                                            <th>Status</th>
                                            <th>Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($equipmentsNeedingMaintenance as $equipment)
                                        <tr>
                                            <td>{{ $equipment->nome }}</td>
                                            <td>{{ $equipment->ultima_manutencao ? Carbon\Carbon::parse($equipment->ultima_manutencao)->format('d/m/Y') : 'Nunca' }}</td>
                                            <td><span class="badge bg-warning text-dark">Manutenção Pendente</span></td>
                                            <td>
                                                <a href="{{ route('tecnico.equipamentos.show', $equipment->id) }}" 
                                                   class="btn btn-sm btn-warning">
                                                    <i class="fas fa-wrench"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="4" class="text-center">Nenhum equipamento precisa de manutenção no momento</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
@endsection

@push('styles')
<style>
    .sidebar {
        background: linear-gradient(180deg, #ffc107 0%, #ffca2c 100%);
    }

    .sidebar .nav-link {
        color: rgba(0, 0, 0, 0.7);
    }

    .sidebar .nav-link:hover {
        color: #000;
    }

    .sidebar .nav-link.active {
        color: #000;
        background-color: rgba(0, 0, 0, 0.1);
    }

    .card {
        transition: transform 0.2s;
    }

    .card:hover {
        transform: translateY(-5px);
    }
</style>
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var maintenancesByMonthCtx = document.getElementById('maintenancesByMonthChart').getContext('2d');
        var maintenancesByMonthChart = new Chart(maintenancesByMonthCtx, {
            type: 'bar',
            data: {
                labels: @json($maintenancesByMonthLabels),
                datasets: [{
                    label: 'Manutenções por Mês',
                    data: @json($maintenancesByMonthData),
                    backgroundColor: '#ffc107'
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    });
</script>
@endpush
