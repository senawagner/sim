<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
// Controllers de Autenticação
use App\Http\Controllers\Auth\LoginController;

// Controllers do Administrador
use App\Http\Controllers\Administrador\DashboardController as AdministradorDashboardController;
use App\Http\Controllers\Administrador\EquipamentoController as AdministradorEquipamentoController;
use App\Http\Controllers\Administrador\ManutencaoController as AdministradorManutencaoController;
use App\Http\Controllers\Administrador\RelatoriosController;
use App\Http\Controllers\Administrador\UsuarioController;

// Controllers do Arquiteto
use App\Http\Controllers\Arquiteto\DashboardController as ArquitetoDashboardController;
use App\Http\Controllers\Arquiteto\EquipamentoController as ArquitetoEquipamentoController;
use App\Http\Controllers\Arquiteto\ManutencaoController as ArquitetoManutencaoController;
use App\Http\Controllers\Arquiteto\UsuarioController as ArquitetoUsuarioController;
use App\Http\Controllers\Arquiteto\FilialController;
use App\Http\Controllers\Arquiteto\RelatorioController;

// Controllers do Coordenador
use App\Http\Controllers\Coordenador\DashboardController as CoordenadorDashboardController;
use App\Http\Controllers\Coordenador\EquipamentoController as CoordenadorEquipamentoController;
use App\Http\Controllers\Coordenador\ManutencaoController as CoordenadorManutencaoController;

// Controllers do Técnico
use App\Http\Controllers\Tecnico\DashboardController as TecnicoDashboardController;
use App\Http\Controllers\Tecnico\EquipamentoController as TecnicoEquipamentoController;
use App\Http\Controllers\Tecnico\ManutencaoController as TecnicoManutencaoController;

// Rota raiz
Route::get('/', function () {
    return redirect()->route('login');
});

// Rotas de autenticação
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

// Rotas protegidas
Route::middleware(['auth'])->group(function () {
    
    // Rotas do Administrador
    Route::prefix('administrador')
        ->name('administrador.')
        ->middleware(['auth', 'check.profile:administrador'])
        ->group(function () {
            // Dashboard
            Route::get('/dashboard', function () {
                return view('administrador.dashboard');
            })->name('dashboard');

            // Manutenções
            Route::resource('manutencoes', AdministradorManutencaoController::class);
            Route::get('/equipamentos-por-filial/{filial}', [AdministradorManutencaoController::class, 'getEquipamentosPorFilial'])
                ->name('equipamentos.por.filial');

            // Equipamentos
            Route::resource('equipamentos', AdministradorEquipamentoController::class);

            // Relatórios
            Route::resource('relatorios', RelatoriosController::class);

            // Usuários
            Route::resource('usuarios', UsuarioController::class);
        });
    
    // Rotas do Técnico
    Route::prefix('tecnico')
        ->name('tecnico.')
        ->middleware('check.profile:tecnico')
        ->group(function () {
            Route::get('/dashboard', [TecnicoDashboardController::class, 'index'])->name('dashboard');
            Route::resource('manutencoes', TecnicoManutencaoController::class);
            Route::resource('equipamentos', TecnicoEquipamentoController::class);
            Route::get('equipamentos-por-filial/{filial}', [TecnicoManutencaoController::class, 'getEquipamentosPorFilial']);
        });
    
    // Rotas do Arquiteto
    Route::prefix('arquiteto')
        ->name('arquiteto.')
        ->middleware('check.profile:arquiteto')
        ->group(function () {
            // Dashboard
            Route::get('/dashboard', [ArquitetoDashboardController::class, 'index'])->name('dashboard');
            
            // Usuários
            Route::resource('usuarios', ArquitetoUsuarioController::class);
            
            // Manutenções
            Route::resource('manutencoes', ArquitetoManutencaoController::class);
            Route::get('equipamentos-por-filial/{filial}', [ArquitetoManutencaoController::class, 'getEquipamentosPorFilial']);
            
            // Filiais
            Route::resource('filiais', FilialController::class);
            
            // Equipamentos e seus cadastros básicos
            Route::resource('equipamentos', ArquitetoEquipamentoController::class);
            Route::resource('fabricante', FabricanteController::class);
            Route::resource('capacidade', CapacidadeController::class);
            Route::resource('modelo', ModeloController::class);
            Route::resource('localizacao', LocalizacaoController::class);
            Route::resource('setor', SetorController::class);
            
            // Relatórios
            Route::resource('relatorios', RelatorioController::class);
        });
    
    // Rotas do Coordenador
    Route::prefix('coordenador')
        ->name('coordenador.')
        ->middleware('check.profile:coordenador')
        ->group(function () {
            Route::get('/dashboard', [CoordenadorDashboardController::class, 'index'])->name('dashboard');
            Route::resource('manutencoes', CoordenadorManutencaoController::class);
            Route::get('equipamentos-por-filial/{filial}', [CoordenadorManutencaoController::class, 'getEquipamentosPorFilial']);
        });
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
