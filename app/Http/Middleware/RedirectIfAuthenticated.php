<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    public function handle(Request $request, Closure $next, ?string $guard = null): Response
    {
        if (Auth::guard($guard)->check()) {
            $user = Auth::guard($guard)->user();

            return redirect($user->isEngineer() ? route('engineer.dashboard') : route('user.tickets.index'));
        }

        return $next($request);
    }
}
