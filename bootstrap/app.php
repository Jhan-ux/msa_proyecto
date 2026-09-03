<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\HttpException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        //
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        // Redirección elegante en caso de 403 en el panel de administración
        $exceptions->render(function (HttpException $e, Request $request) {
            if ($e->getStatusCode() === 403 && $request->is('admin*')) {
                if (auth()->check()) {
                    if (auth()->user()->isVendedor()) {
                        return redirect()->to('/admin/contactos');
                    }
                    return redirect()->to('/admin');
                }
                return redirect()->to('/admin/login');
            }
        });
    })->create();
