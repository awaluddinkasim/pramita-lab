<?php

use Illuminate\Auth\Middleware\RedirectIfAuthenticated;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Facades\Auth;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        RedirectIfAuthenticated::redirectUsing(function () {
            if (Auth::guard('admin')->check()) {
                return route('admin.dashboard');
            } else if (Auth::guard('delivery')->check()) {
                return route('delivery.dashboard');
            } else if (Auth::guard('user')->check()) {
                return route('dashboard');
            } else {
                Auth::logout();
                return route('login');
            }
        });
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
