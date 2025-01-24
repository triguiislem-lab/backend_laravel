<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Illuminate\Auth\AuthenticationException;

class Handler extends ExceptionHandler
{
    protected $dontReport = [];

    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    public function register()
    {
        $this->reportable(function (Throwable $e) {
            // Configure error reporting (e.g., Sentry, Logging)
        });
    }

    // Add this method to handle unauthenticated users for APIs
    protected function unauthenticated($request, AuthenticationException $exception)
    {
        if ($request->expectsJson()) {
            return response()->json([
                'message' => 'Unauthenticated. Token is missing or invalid.',
            ], 401);
        }

        // Only include this if you have a web login route
        return redirect()->guest(route('login'));
    }
}
