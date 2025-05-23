<?php

namespace App\Http\Middleware;

use Closure;

class AdminMiddleware
{
    public function handle($request, Closure $next)
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login')->with('error', 'Acceso no autorizado');
        }
        return $next($request);
    }
}