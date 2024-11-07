<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    protected $redirectTo = '/home';

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
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();
            
            // Redireciona baseado no perfil
            switch ($user->perfil) {
                case 'arquiteto':
                    return redirect()->route('arquiteto.dashboard');
                case 'administrador':
                    return redirect()->route('administrador.dashboard');
                case 'coordenador':
                    return redirect()->route('coordenador.dashboard');
                case 'tecnico':
                    return redirect()->route('tecnico.dashboard');
                default:
                    return redirect()->intended($this->redirectTo);
            }
        }

        return back()->withErrors([
            'nome_usuario' => 'As credenciais fornecidas não correspondem aos nossos registros.',
        ])->withInput($request->except('password'));
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function username()
    {
        return 'nome_usuario';
    }
}
