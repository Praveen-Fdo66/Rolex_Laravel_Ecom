<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserRole
{
public function handle($request, \Closure $next)
{
    if (auth()->check() && auth()->user()->role === 'user') {
        return $next($request);
    }

    // Redirect non-users or guests
    return redirect()->route('login')->with('error', 'You must be logged in as a user to access this page.');
    }
}
