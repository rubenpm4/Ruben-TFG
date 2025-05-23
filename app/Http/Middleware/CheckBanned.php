<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckBanned
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->baneado) {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect()->route('baneado');
        }

        return $next($request);
    }
}