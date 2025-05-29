<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\EnsureUserIsAdmin;
use App\Http\Middleware\EnsureUserRole;
use App\Http\Middleware\UserOnly;



return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
        

)

    
    ->withMiddleware(function (Middleware $middleware) {
                // Middleware alias
        $middleware->alias([
            'admin' => EnsureUserIsAdmin::class, // This line is critical
            'user' => EnsureUserRole::class,
            'user.only' => UserOnly::class,
    
        ]);

            $middleware->api([
        \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class,
        \Illuminate\Routing\Middleware\ThrottleRequests::class.':api',
        \Illuminate\Routing\Middleware\SubstituteBindings::class,
    ]);



    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();



