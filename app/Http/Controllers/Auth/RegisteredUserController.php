<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisteredUserController extends Controller
{
    /**
     * Affiche le formulaire d'inscription.
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Enregistre un nouvel usager.
     */
    public function store(Request $request)
{
    $validated = $request->validate([
        'nom' => ['required', 'string', 'max:255'],

        'prenom' => ['required', 'string', 'max:255'],

        'sexe' => ['required', 'in:homme,femme'],

        'date_naissance' => [
            'required',
            'date',
            'before_or_equal:' . now()->subYears(15)->format('Y-m-d'),
        ],

        'email' => [
            'required',
            'email',
            'max:255',
            'unique:users,email',
        ],

        'telephone' => [
            'required',
            'string',
            'max:30',
        ],

        'password' => [
            'required',
            'confirmed',
            'min:8',
        ],
    ]);

    $user = User::create([
        'nom' => $validated['nom'],
        'prenom' => $validated['prenom'],
        'sexe' => $validated['sexe'],
        'date_naissance' => $validated['date_naissance'],
        'email' => $validated['email'],
        'telephone' => $validated['telephone'],
        'password' => $validated['password'],
        'role' => 'externe',
    ]);


Auth::login($user);

$request->session()->regenerate();

return redirect()->route('external.dashboard');
}
}
