<?php

namespace App\Http\Controllers\Tecnico;

use App\Http\Controllers\Controller;
use App\Models\Manutencao;
use App\Models\Equipamento;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        Log::info('Acessando dashboard do técnico');
        
        // Estatísticas específicas do técnico
        $totalMaintenances = Manutencao::count();
        $pendingMaintenances = Manutencao::where('status', 'Pendente')
            ->orderBy('data_programada')
            ->with(['equipamento', 'filial'])
            ->take(5)
            ->get();
        
        $todayMaintenances = Manutencao::whereDate('data_programada', Carbon::today())
            ->count();

        // Manutenções do mês atual
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

        // Equipamentos com manutenção pendente
        $equipmentsNeedingMaintenance = Equipamento::whereHas('manutencoes', function($query) {
            $query->where('status', 'Pendente');
        })->take(5)->get();

        return view('tecnico.dashboard', compact(
            'totalMaintenances',
            'pendingMaintenances',
            'todayMaintenances',
            'maintenancesByMonthLabels',
            'maintenancesByMonthData',
            'equipmentsNeedingMaintenance'
        ));
    }
}
