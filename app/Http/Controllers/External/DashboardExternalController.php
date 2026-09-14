<?php

namespace App\Http\Controllers\External;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardExternalController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        /*
        |--------------------------------------------------------------------------
        | Pour l'instant, nous préparons les statistiques.
        | Les modèles Courrier et Reponse seront ajoutés ensuite.
        |--------------------------------------------------------------------------
        */

        $stats = [
            'total' => 0,
            'en_cours' => 0,
            'reponses' => 0,
            'traites' => 0,
        ];

        $courriers = collect();

        return view('external.dashboard', compact(
            'user',
            'stats',
            'courriers'
        ));
    }

    public function profile()
    {
        return view('external.profile', [
            'user' => Auth::user(),
        ]);
    }
}
