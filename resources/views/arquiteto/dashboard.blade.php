@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Sidebar com tema específico do arquiteto -->
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-primary sidebar">
            <div class="position-sticky pt-3">
                <ul class="nav flex-column">
                    <!-- Dashboard -->
                    <li class="nav-item">
                        <a class="nav-link text-white {{ Request::is('arquiteto/dashboard') ? 'bg-primary-dark' : '' }}" 
                           href="{{ route('arquiteto.dashboard') }}">
                            <i class="fas fa-home me-2"></i> Dashboard
                        </a>
                    </li>

                    <!-- Cadastros -->
                    <li class="nav-item mt-3">
                        <span class="text-white-50 px-3 text-uppercase small fw-bold">Cadastros</span>
                    </li>
                    
                    <!-- Usuários -->
                    <li class="nav-item">
                        <a class="nav-link text-white {{ Request::is('arquiteto/usuarios*') ? 'bg-primary-dark' : '' }}" 
                           href="{{ route('arquiteto.usuarios.index') }}">
                            <i class="fas fa-users me-2"></i> Usuários
                        </a>
                    </li>

                    <!-- Manutenções -->
                    <li class="nav-item">
                        <a class="nav-link text-white {{ Request::is('arquiteto/manutencoes*') ? 'bg-primary-dark' : '' }}" 
                           href="{{ route('arquiteto.manutencoes.index') }}">
                            <i class="fas fa-wrench me-2"></i> Manutenções
                        </a>
                    </li>

                    <!-- Filiais -->
                    <li class="nav-item">
                        <a class="nav-link text-white {{ Request::is('arquiteto/filiais*') ? 'bg-primary-dark' : '' }}" 
                           href="{{ route('arquiteto.filiais.index') }}">
                            <i class="fas fa-building me-2"></i> Filiais
                        </a>
                    </li>

                    <!-- Equipamentos (Dropdown) -->
                    <li class="nav-item">
                        <a class="nav-link text-white d-flex justify-content-between align-items-center {{ 
                            Request::is('arquiteto/equipamentos*') || 
                            Request::is('arquiteto/fabricante*') || 
                            Request::is('arquiteto/capacidade*') || 
                            Request::is('arquiteto/modelo*') || 
                            Request::is('arquiteto/localizacao*') || 
                            Request::is('arquiteto/setor*') ? 'bg-primary-dark' : '' }}" 
                           data-bs-toggle="collapse" 
                           href="#equipamentosSubmenu" 
                           role="button" 
                           aria-expanded="{{ 
                            Request::is('arquiteto/equipamentos*') || 
                            Request::is('arquiteto/fabricante*') || 
                            Request::is('arquiteto/capacidade*') || 
                            Request::is('arquiteto/modelo*') || 
                            Request::is('arquiteto/localizacao*') || 
                            Request::is('arquiteto/setor*') ? 'true' : 'false' }}" 
                           aria-controls="equipamentosSubmenu">
                            <span>
                                <i class="fas fa-cogs me-2"></i> Equipamentos
                            </span>
                            <i class="fas fa-chevron-down"></i>
                        </a>
                        <div class="collapse {{ 
                            Request::is('arquiteto/equipamentos*') || 
                            Request::is('arquiteto/fabricante*') || 
                            Request::is('arquiteto/capacidade*') || 
                            Request::is('arquiteto/modelo*') || 
                            Request::is('arquiteto/localizacao*') || 
                            Request::is('arquiteto/setor*') ? 'show' : '' }}" 
                             id="equipamentosSubmenu">
                            <ul class="nav flex-column ms-3">
                                <li class="nav-item">
                                    <a class="nav-link text-white py-2 {{ Request::is('arquiteto/equipamentos*') ? 'bg-primary-dark' : '' }}" 
                                       href="{{ route('arquiteto.equipamentos.index') }}">
                                        <i class="fas fa-server me-2"></i> Listagem
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-white py-2 {{ Request::is('arquiteto/fabricante*') ? 'bg-primary-dark' : '' }}" 
                                       href="{{ route('arquiteto.fabricante.index') }}">
                                        <i class="fas fa-industry me-2"></i> Fabricantes
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-white py-2 {{ Request::is('arquiteto/capacidade*') ? 'bg-primary-dark' : '' }}" 
                                       href="{{ route('arquiteto.capacidade.index') }}">
                                        <i class="fas fa-temperature-high me-2"></i> Capacidades
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-white py-2 {{ Request::is('arquiteto/modelo*') ? 'bg-primary-dark' : '' }}" 
                                       href="{{ route('arquiteto.modelo.index') }}">
                                        <i class="fas fa-box me-2"></i> Modelos
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-white py-2 {{ Request::is('arquiteto/localizacao*') ? 'bg-primary-dark' : '' }}" 
                                       href="{{ route('arquiteto.localizacao.index') }}">
                                        <i class="fas fa-map-marker me-2"></i> Localizações
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-white py-2 {{ Request::is('arquiteto/setor*') ? 'bg-primary-dark' : '' }}" 
                                       href="{{ route('arquiteto.setor.index') }}">
                                        <i class="fas fa-building me-2"></i> Setores
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <!-- Relatórios -->
                    <li class="nav-item mt-3">
                        <a class="nav-link text-white {{ Request::is('arquiteto/relatorios*') ? 'bg-primary-dark' : '' }}" 
                           href="{{ route('arquiteto.relatorios.index') }}">
                            <i class="fas fa-chart-bar me-2"></i> Relatórios
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- Main content -->
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Bem-vindo, {{ Auth::user()->nome_usuario }}</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <div class="btn-group me-2">
                        <button type="button" class="btn btn-sm btn-outline-primary">
                            <i class="fas fa-share-alt"></i> Compartilhar
                        </button>
                        <button type="button" class="btn btn-sm btn-outline-primary">
                            <i class="fas fa-download"></i> Exportar
                        </button>
                    </div>
                </div>
            </div>

            <!-- Cards de Estatísticas -->
            <div class="row mb-4">
                <div class="col-md-4">
                    <div class="card border-primary">
                        <div class="card-body">
                            <h5 class="card-title text-primary">Total de Equipamentos</h5>
                            <p class="card-text display-4">{{ $totalEquipments ?? 0 }}</p>
                            <small class="text-success"><i class="fas fa-arrow-up"></i> 2.4% desde a última semana</small>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card border-primary">
                        <div class="card-body">
                            <h5 class="card-title text-primary">Manutenções Pendentes</h5>
                            <p class="card-text display-4">{{ $pendingMaintenances ?? 0 }}</p>
                            <small class="text-warning"><i class="fas fa-exclamation-triangle"></i> Requer atenção</small>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card border-primary">
                        <div class="card-body">
                            <h5 class="card-title text-primary">Total de Filiais</h5>
                            <p class="card-text display-4">{{ $totalBranches ?? 0 }}</p>
                            <small class="text-success"><i class="fas fa-arrow-up"></i> 1.5% desde a última semana</small>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Gráficos -->
            <div class="row mb-4">
                <div class="col-md-6">
                    <div class="card border-primary">
                        <div class="card-header bg-primary text-white">
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
                <div class="col-md-6">
                    <div class="card border-primary">
                        <div class="card-header bg-primary text-white">
                            <span>Equipamentos por Filial</span>
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
            <div class="card border-primary">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <span>Manutenções Recentes</span>
                    <button class="btn btn-sm btn-light">
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
                                        <a href="{{ route('arquiteto.manutencoes.show', $maintenance->id) }}" 
                                           class="btn btn-sm btn-primary">
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
    /* Estilos específicos do tema do arquiteto */
    .sidebar {
        background: linear-gradient(180deg, #0d6efd 0%, #0a58ca 100%);
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

    .nav-divider {
        border-top: 1px solid rgba(255, 255, 255, 0.1);
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
                    backgroundColor: '#0d6efd'
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
                        '#0d6efd',
                        '#6610f2',
                        '#6f42c1',
                        '#d63384',
                        '#dc3545'
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
