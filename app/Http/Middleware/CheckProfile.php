<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckProfile
{
    public function handle(Request $request, Closure $next, $profile)
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        if ($request->user()->perfil !== $profile) {
            $perfil = $request->user()->perfil;
            return redirect()->route("$perfil.dashboard")
                ->with('error', 'Acesso não autorizado. Redirecionado para sua área.');
        }

        return $next($request);
    }
}
