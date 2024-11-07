<?php

namespace App\Http\Controllers\Administrador;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Manutencao;
use App\Models\Equipamento;
use App\Models\Filial;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        Log::info('Acessando dashboard do administrador');
        
        $totalUsers = Usuario::count();
        $pendingMaintenances = Manutencao::where('status', 'Pendente')->count();
        $totalEquipments = Equipamento::count();
        $totalBranches = Filial::count();

        $filiais = Filial::all();
        $tiposManutenção = ['Preventiva', 'Corretiva', 'Preditiva'];
        $periodicidades = ['Diária', 'Semanal', 'Quinzenal', 'Mensal', 'Trimestral', 'Semestral', 'Anual'];

        // Dados para o gráfico de Manutenções por Mês
        try {
            $maintenancesByMonthData = Manutencao::selectRaw('MONTH(data_programada) as month, COUNT(*) as count')
                ->whereYear('data_programada', date('Y'))
                ->groupBy('month')
                ->orderBy('month')
                ->get()
                ->pluck('count', 'month')
                ->all();
        } catch (\Exception $e) {
            Log::error('Erro ao carregar dados do gráfico: ' . $e->getMessage());
            $maintenancesByMonthData = [];
        }

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

        // Dados para o gráfico de Equipamentos por Filial
        $equipmentsByBranch = Filial::withCount('equipamentos')
            ->having('equipamentos_count', '>', 0)
            ->get();
        $equipmentsByBranchLabels = $equipmentsByBranch->pluck('nome');
        $equipmentsByBranchData = $equipmentsByBranch->pluck('equipamentos_count');

        $recentMaintenances = Manutencao::with('equipamento')
            ->orderBy('data_programada', 'desc')
            ->take(5)
            ->get();

        return view('administrador.dashboard', compact(
            'totalUsers',
            'pendingMaintenances',
            'totalEquipments',
            'totalBranches',
            'filiais',
            'tiposManutenção',
            'periodicidades',
            'maintenancesByMonthLabels',
            'maintenancesByMonthData',
            'equipmentsByBranchLabels',
            'equipmentsByBranchData',
            'recentMaintenances'
        ));
    }
}
