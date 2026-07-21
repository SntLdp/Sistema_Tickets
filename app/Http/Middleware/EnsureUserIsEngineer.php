<?php

namespace App\Http\Middleware;

use App\Models\Role;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserIsEngineer
{
    public function handle(Request $request, Closure $next): Response
    {
        if (! $request->user() || ! $request->user()->isEngineer()) {
            abort(403, 'No tienes permisos de Ingeniero de Sistemas para acceder a esta sección.');
        }

        return $next($request);
    }
}
