@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Sidebar com tema específico do coordenador -->
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-success sidebar">
            <div class="position-sticky pt-3">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('coordenador/dashboard') ? 'active' : '' }}" 
                           href="{{ route('coordenador.dashboard') }}">
                            <i class="fas fa-tachometer-alt"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('coordenador/manutencoes*') ? 'active' : '' }}" 
                           href="{{ route('coordenador.manutencoes.index') }}">
                            <i class="fas fa-tools"></i> Manutenções
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('coordenador/relatorios*') ? 'active' : '' }}" 
                           href="{{ route('coordenador.relatorios.index') }}">
                            <i class="fas fa-chart-line"></i> Relatórios
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- Main content -->
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Dashboard do Coordenador - Bem-vindo, {{ Auth::user()->nome }}</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <div class="btn-group me-2">
                        <button type="button" class="btn btn-sm btn-outline-success">
                            <i class="fas fa-share-alt"></i> Compartilhar
                        </button>
                        <button type="button" class="btn btn-sm btn-outline-success">
                            <i class="fas fa-download"></i> Exportar
                        </button>
                    </div>
                </div>
            </div>

            <!-- Cards de Estatísticas -->
            <div class="row mb-4">
                <div class="col-md-4">
                    <div class="card border-success">
                        <div class="card-body">
                            <h5 class="card-title text-success">Total de Equipamentos</h5>
                            <p class="card-text display-4">{{ $totalEquipments ?? 0 }}</p>
                            <small class="text-success"><i class="fas fa-arrow-up"></i> 2.4% desde a última semana</small>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card border-success">
                        <div class="card-body">
                            <h5 class="card-title text-success">Manutenções Pendentes</h5>
                            <p class="card-text display-4">{{ $pendingMaintenances ?? 0 }}</p>
                            <small class="text-warning"><i class="fas fa-exclamation-triangle"></i> Requer atenção</small>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card border-success">
                        <div class="card-body">
                            <h5 class="card-title text-success">Total de Filiais</h5>
                            <p class="card-text display-4">{{ $totalBranches ?? 0 }}</p>
                            <small class="text-success"><i class="fas fa-arrow-up"></i> 1.5% desde a última semana</small>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Gráfico de Manutenções -->
            <div class="row mb-4">
                <div class="col-md-12">
                    <div class="card border-success">
                        <div class="card-header bg-success text-white">
                            <span>Manutenções por Mês</span>
                            <div class="float-end">
                                <i class="fas fa-ellipsis-v"></i>
                            </div>
                        </div>
                        <div class="card-body">
                            <canvas id="maintenancesByMonthChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tabela de Manutenções Recentes -->
            <div class="card border-success">
                <div class="card-header bg-success text-white d-flex justify-content-between align-items-center">
                    <span>Manutenções Recentes</span>
                    <button class="btn btn-sm btn-outline-light">
                        <i class="fas fa-filter"></i> Filtrar
                    </button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
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
                                        <a href="{{ route('coordenador.manutencoes.show', $maintenance->id) }}" 
                                           class="btn btn-sm btn-success">
                                            <i class="fas fa-eye"></i>
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
    /* Estilos específicos do tema do coordenador */
    .sidebar {
        background: linear-gradient(180deg, #198754 0%, #157347 100%);
    }

    .sidebar .nav-link {
        color: rgba(255, 255, 255, 0.9);
    }

    .sidebar .nav-link:hover {
        color: #fff;
    }

    .sidebar .nav-link.active {
        color: #fff;
        background-color: rgba(255, 255, 255, 0.1);
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
        // Gráfico de Manutenções por Mês
        var maintenancesByMonthCtx = document.getElementById('maintenancesByMonthChart').getContext('2d');
        var maintenancesByMonthChart = new Chart(maintenancesByMonthCtx, {
            type: 'bar',
            data: {
                labels: @json($maintenancesByMonthLabels),
                datasets: [{
                    label: 'Manutenções por Mês',
                    data: @json($maintenancesByMonthData),
                    backgroundColor: '#198754'
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
