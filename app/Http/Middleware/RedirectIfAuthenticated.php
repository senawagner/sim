<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                $user = Auth::user();
                switch ($user->perfil) {
                    case 'administrador':
                        return redirect()->route('administrador.dashboard');
                    case 'tecnico':
                        return redirect()->route('tecnico.dashboard');
                    case 'arquiteto':
                        return redirect()->route('arquiteto.dashboard');
                    case 'coordenador':
                        return redirect()->route('coordenador.dashboard');
                    default:
                        return redirect()->route('login');
                }
            }
        }

        return $next($request);
    }
}
