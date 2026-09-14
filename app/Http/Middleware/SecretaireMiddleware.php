<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class SecretaireMiddleware
{
    public function handle(
        Request $request,
        Closure $next
    ): Response {

        if (
            !Auth::check() ||
            Auth::user()->role !== 'secretaire' ||
            !Auth::user()->actif
        ) {
            abort(403);
        }

        return $next($request);
    }
}