<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\UsuarioController;
use App\Http\Controllers\Admin\RelatoriosController;
use App\Http\Controllers\Admin\ManutencaoController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController; 
use App\Http\Controllers\Arquiteto\DashboardController as ArquitetoDashboardController;
use App\Http\Controllers\Coordenador\DashboardController as CoordenadorDashboardController;
use App\Http\Controllers\Tecnico\DashboardController as TecnicoDashboardController;

// Rota raiz
Route::get('/', function () {
    return redirect()->route('login');
});

// Rotas de autenticação
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Rotas protegidas
Route::middleware(['auth'])->group(function () {
    
    // Rotas do Administrador
    Route::prefix('admin')->name('admin.')->group(function () {
        // Dashboard
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
        
        // Manutenções
        Route::resource('manutencoes', ManutencaoController::class);
        
        // Relatórios
        Route::get('relatorios', [RelatoriosController::class, 'index'])->name('relatorios');
        
        // Usuários
        Route::resource('usuarios', UsuarioController::class);
    });
    
    // Rotas do Técnico
    Route::prefix('tecnico')->name('tecnico.')->group(function () {
        Route::get('/dashboard', [TecnicoDashboardController::class, 'index'])->name('dashboard');
        Route::resource('manutencoes', ManutencaoController::class);
        Route::resource('equipamentos', EquipamentoController::class);
    });
    
    // Rotas do Arquiteto
    Route::prefix('arquiteto')->name('arquiteto.')->group(function () {
        Route::get('/dashboard', [ArquitetoDashboardController::class, 'index'])->name('dashboard');
        Route::resource('manutencoes', ManutencaoController::class);
        Route::resource('equipamentos', EquipamentoController::class);
    });
    
    // Rotas do Coordenador
    Route::prefix('coordenador')->name('coordenador.')->group(function () {
        Route::get('/dashboard', [CoordenadorDashboardController::class, 'index'])->name('dashboard');
        Route::resource('manutencoes', ManutencaoController::class);
        Route::resource('relatorios', RelatoriosController::class);
    });
});
