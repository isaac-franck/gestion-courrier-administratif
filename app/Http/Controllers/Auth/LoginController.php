<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Afficher le formulaire de connexion.
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Authentifier l'utilisateur.
     */
    public function login(Request $request)
{
    $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);

    $credentials['actif'] = true;

    $remember = $request->boolean('remember');

    
     if (Auth::attempt($credentials, $remember)) {

         $request->session()->regenerate();

         $user = Auth::user();

         return match ($user->role) {

        'administrateur' => redirect()->route('admin.dashboard'),

        'externe' => redirect()->route('external.dashboard'),

        'personnel' => redirect()->route('personnel.dashboard'),

        'chef_service' => redirect()->route('chef.dashboard'),

        'secretaire' => redirect()->route('secretaire.dashboard'),

        'directeur' => redirect()->route('directeur.dashboard'),

        default => abort(403),
        };
      }

    

    return back()->withErrors([
        'email' => 'Les identifiants fournis sont incorrects.',
    ])->onlyInput('email');
}

    /**
     * Déconnecter l'utilisateur.
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('home');
    }
}