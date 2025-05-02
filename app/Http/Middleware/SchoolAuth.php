<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SchoolMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if ($request->session()->get('user_type') === 'school') {
            return $next($request);
        }

        return redirect()->route('login')->withErrors(['auth' => 'Acceso no autorizado.']);
    }
}

