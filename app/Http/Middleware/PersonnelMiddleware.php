<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class PersonnelMiddleware
{
    public function handle(
        Request $request,
        Closure $next
    ): Response {

        if (!Auth::check()) {
            return redirect()->route('login');
        }

        if (Auth::user()->role !== 'personnel') {
            abort(403, 'Accès interdit.');
        }

        if (!Auth::user()->actif) {
            Auth::logout();

            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect()
                ->route('login')
                ->withErrors([
                    'email' => 'Votre compte est actuellement bloqué.',
                ]);
        }

        return $next($request);
    }
}
