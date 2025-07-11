<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserIsAdmin
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->check()) {
            return redirect()->route('login'); // Redirect if not logged in
        }

        if (auth()->user()->role !== 'admin') {
            abort(403, 'Access denied. Admins only.');
        }

        return $next($request);
    }
}
