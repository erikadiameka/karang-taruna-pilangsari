<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, string ...$roles): mixed
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }
        if (!auth()->user()->is_active || !in_array(auth()->user()->role, $roles, true)) {
            abort(403, 'Akses ditolak.');
        }
        return $next($request);
    }
}
