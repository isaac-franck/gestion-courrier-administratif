<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DirecteurMiddleware
{
    public function handle(
        Request $request,
        Closure $next
    ): Response {

        if (
            !auth()->check() ||
            auth()->user()->role !== 'directeur' ||
            !auth()->user()->actif
        ) {
            abort(403);
        }

        return $next($request);
    }
}