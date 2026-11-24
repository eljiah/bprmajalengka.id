<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->redirectGuestsTo('/admin/login');
        $middleware->validateCsrfTokens(except: [
            'api/*',
            '/pengajuan-kredit',
            '/pengaduan',
            '/pengaduan/*',
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        $exceptions->shouldRenderJsonWhen(
            fn (Request $request) => $request->is('api/*') || $request->expectsJson(),
        );

        $exceptions->render(function (\Illuminate\Database\Eloquent\ModelNotFoundException $e, Request $request) {
            if ($request->is('admin/loans*')) {
                return redirect()->route('admin.loans.index')->with('warning', 'Berkas pengajuan pinjaman tidak ditemukan atau sudah dihapus sebelumnya.');
            }
            if ($request->is('admin/complaints*')) {
                return redirect()->route('admin.complaints.index')->with('warning', 'Data pengaduan nasabah tidak ditemukan atau sudah dihapus sebelumnya.');
            }
        });
    })->create();
