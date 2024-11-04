@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-dark sidebar">
            <div class="position-sticky pt-3">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('admin/dashboard') ? 'active' : '' }}" 
                           href="{{ route('admin.dashboard') }}">
                            <i class="fas fa-tachometer-alt"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('admin/manutencoes*') ? 'active' : '' }}" 
                           href="{{ route('admin.manutencoes.index') }}">
                            <i class="fas fa-tools"></i> Manutenções
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('admin/relatorios') ? 'active' : '' }}" 
                           href="{{ route('admin.relatorios') }}">
                            <i class="fas fa-chart-bar"></i> Relatórios
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('admin/usuarios*') ? 'active' : '' }}" 
                           href="{{ route('admin.usuarios.index') }}">
                            <i class="fas fa-users"></i> Usuários
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- Main content -->
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Bem-vindo de volta, {{ Auth::user()->nome }}</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <div class="btn-group me-2">
                        <button type="button" class="btn btn-sm btn-outline-secondary">
                            <i class="fas fa-share-alt"></i> Compartilhar
                        </button>
                        <button type="button" class="btn btn-sm btn-outline-secondary">
                            <i class="fas fa-download"></i> Exportar
                        </button>
                    </div>
                </div>
            </div>

            <!-- Cards de Estatísticas -->
            <div class="row mb-4">
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Total de Usuários</h5>
                            <p class="card-text display-4">{{ $totalUsers ?? 0 }}</p>
                            <small class="text-success"><i class="fas fa-arrow-up"></i> 4.6% desde a última semana</small>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Manutenções Pendentes</h5>
                            <p class="card-text display-4">{{ $pendingMaintenances ?? 0 }}</p>
                            <small class="text-danger">↓ 1.0% desde a última semana</small>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Total de Equipamentos</h5>
                            <p class="card-text display-4">{{ $totalEquipments ?? 0 }}</p>
                            <small class="text-success">↑ 2.4% desde a última semana</small>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Total de Filiais</h5>
                            <p class="card-text display-4">{{ $totalBranches ?? 0 }}</p>
                            <small class="text-success">↑ 1.5% desde a última semana</small>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Gráficos -->
            <div class="row mb-4">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <span>Manutenções por Mês</span>
                            <div class="dropdown">
                                <button class="btn btn-link" type="button" id="maintenanceChartMenu" 
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v"></i>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="maintenanceChartMenu">
                                    <li><a class="dropdown-item" href="#">Exportar Dados</a></li>
                                    <li><a class="dropdown-item" href="#">Personalizar Gráfico</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body">
                            <canvas id="maintenancesByMonthChart"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            Equipamentos por Filial
                            <div class="float-end">
                                <i class="fas fa-ellipsis-v"></i>
                            </div>
                        </div>
                        <div class="card-body">
                            <canvas id="equipmentsByBranchChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tabela de Manutenções Recentes -->
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>Manutenções Recentes</span>
                    <button class="btn btn-sm btn-outline-secondary">
                        <i class="fas fa-filter"></i> Filtrar
                    </button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Equipamento</th>
                                    <th>Tipo</th>
                                    <th>Data Programada</th>
                                    <th>Status</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($recentMaintenances as $maintenance)
                                <tr>
                                    <td>{{ $maintenance->id }}</td>
                                    <td>{{ $maintenance->equipamento->nome }}</td>
                                    <td>{{ $maintenance->tipo }}</td>
                                    <td>{{ \Carbon\Carbon::parse($maintenance->data_programada)->format('d/m/Y') }}</td>
                                    <td>
                                        <span class="badge bg-{{ $maintenance->status == 'pendente' ? 'warning' : 'success' }}">
                                            {{ $maintenance->status }}
                                        </span>
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.manutencoes.edit', $maintenance->id) }}" 
                                           class="btn btn-sm btn-primary">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="text-center">Nenhuma manutenção encontrada</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
@endsection

@push('styles')
<style>
    body {
        font-size: .875rem;
    }

    .sidebar {
        position: fixed;
        top: 0;
        bottom: 0;
        left: 0;
        z-index: 100;
        padding: 48px 0 0;
        box-shadow: inset -1px 0 0 rgba(0, 0, 0, .1);
    }

    @media (max-width: 767.98px) {
        .sidebar {
            top: 5rem;
        }
    }

    .sidebar-sticky {
        position: relative;
        top: 0;
        height: calc(100vh - 48px);
        padding-top: .5rem;
        overflow-x: hidden;
        overflow-y: auto;
    }

    .sidebar .nav-link {
        font-weight: 500;
        color: #f8f9fa;
    }

    .sidebar .nav-link.active {
        color: #007bff;
    }

    main {
        padding-top: 48px;
    }

    .card {
        border-radius: 15px;
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
    }

    .card-header {
        background-color: #fff;
        border-bottom: none;
    }
</style>
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Gráfico de Manutenções por Mês
        var maintenancesByMonthCtx = document.getElementById('maintenancesByMonthChart').getContext('2d');
        var maintenancesByMonthChart = new Chart(maintenancesByMonthCtx, {
            type: 'bar',
            data: {
                labels: @json($maintenancesByMonthLabels),
                datasets: [{
                    label: 'Manutenções por Mês',
                    data: @json($maintenancesByMonthData),
                    backgroundColor: 'rgba(75, 192, 192, 0.6)'
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

        // Gráfico de Equipamentos por Filial
        var equipmentsByBranchCtx = document.getElementById('equipmentsByBranchChart').getContext('2d');
        var equipmentsByBranchChart = new Chart(equipmentsByBranchCtx, {
            type: 'pie',
            data: {
                labels: @json($equipmentsByBranchLabels),
                datasets: [{
                    data: @json($equipmentsByBranchData),
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.6)',
                        'rgba(54, 162, 235, 0.6)',
                        'rgba(255, 206, 86, 0.6)',
                        'rgba(75, 192, 192, 0.6)',
                        'rgba(153, 102, 255, 0.6)'
                    ]
                }]
            },
            options: {
                responsive: true
            }
        });
    });
</script>
@endpush