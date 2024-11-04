<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'nome_usuario' => ['required'],
            'senha' => ['required'],
        ]);

        if (Auth::attempt(['nome_usuario' => $credentials['nome_usuario'], 'password' => $credentials['senha']])) {
            $request->session()->regenerate();

            Log::info('Usuário autenticado', ['user' => Auth::user()]);

            // Redirecionar para o dashboard baseado no perfil
            switch (Auth::user()->perfil) {
                case 'arquiteto':
                case 'administrador':
                case 'coordenador':
                case 'tecnico':
                    return redirect()->route('dashboard');
                default:
                    return redirect()->route('dashboard');
            }
        }

        Log::warning('Falha na autenticação', ['nome_usuario' => $credentials['nome_usuario']]);

        return back()->withErrors([
            'nome_usuario' => 'As credenciais fornecidas não correspondem aos nossos registros.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
