<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RelatoriosController extends Controller
{
    public function index()
    {
        $reportTypes = ['manutencoes', 'equipamentos', 'usuarios'];
        return view('admin.relatorios', compact('reportTypes'));
    }
}
