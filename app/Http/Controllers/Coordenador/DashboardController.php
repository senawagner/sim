<?php

namespace App\Http\Controllers\Coordenador;

use App\Http\Controllers\Controller;
use App\Models\Manutencao;
use App\Models\Equipamento;
use App\Models\Filial;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        Log::info('Acessando dashboard do coordenador');
        
        // Estatísticas específicas do coordenador
        $totalEquipments = Equipamento::count();
        $pendingMaintenances = Manutencao::where('status', 'pendente')->count();
        $totalBranches = Filial::count();

        // Dados para o gráfico de Manutenções por Mês
        $maintenancesByMonthData = Manutencao::selectRaw('MONTH(data_programada) as month, COUNT(*) as count')
            ->whereYear('data_programada', date('Y'))
            ->groupBy('month')
            ->orderBy('month')
            ->get()
            ->pluck('count', 'month')
            ->all();

        $allMonths = collect(range(1, 12));
        $maintenancesByMonth = $allMonths->map(function ($month) use ($maintenancesByMonthData) {
            return [
                'month' => $month,
                'count' => $maintenancesByMonthData[$month] ?? 0
            ];
        });

        $maintenancesByMonthLabels = $maintenancesByMonth->pluck('month')->map(function($month) {
            return date('F', mktime(0, 0, 0, $month, 1));
        });
        $maintenancesByMonthData = $maintenancesByMonth->pluck('count');

        // Manutenções recentes
        $recentMaintenances = Manutencao::with('equipamento')
            ->orderBy('data_programada', 'desc')
            ->take(5)
            ->get();

        return view('coordenador.dashboard', compact(
            'pendingMaintenances',
            'totalEquipments',
            'totalBranches',
            'maintenancesByMonthLabels',
            'maintenancesByMonthData',
            'recentMaintenances'
        ));
    }
} 