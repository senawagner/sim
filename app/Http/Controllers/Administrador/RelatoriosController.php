<?php

namespace App\Http\Controllers\Administrador;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Manutencao;
use App\Models\Equipamento;
use App\Models\Usuario;

class RelatoriosController extends Controller
{
    public function index()
    {
        return view('administrador.relatorios.index');
    }

    public function gerar(Request $request)
    {
        $request->validate([
            'report_type' => 'required|in:manutencoes,equipamentos,usuarios',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        switch ($request->report_type) {
            case 'manutencoes':
                $data = Manutencao::whereBetween('data_programada', [$request->start_date, $request->end_date])
                    ->with(['equipamento', 'filial'])
                    ->get();
                break;
            case 'equipamentos':
                $data = Equipamento::with('filial')
                    ->whereBetween('created_at', [$request->start_date, $request->end_date])
                    ->get();
                break;
            case 'usuarios':
                $data = Usuario::whereBetween('created_at', [$request->start_date, $request->end_date])
                    ->get();
                break;
        }

        return response()->json($data);
    }
}
