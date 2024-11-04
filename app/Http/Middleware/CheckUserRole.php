<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckUserRole
{
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        if (!auth()->check()) {
            return redirect('login');
        }

        // Arquiteto tem acesso total
        if (auth()->user()->perfil === 'arquiteto') {
            return $next($request);
        }

        if (!in_array(auth()->user()->perfil, $roles)) {
            abort(403, 'Acesso não autorizado.');
        }

        return $next($request);
    }
}
