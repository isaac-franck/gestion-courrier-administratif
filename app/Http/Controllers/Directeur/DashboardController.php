<?php

namespace App\Http\Controllers\Directeur;

use App\Http\Controllers\Controller;
use App\Models\Courrier;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $courriersAExaminer = Courrier::where(
            'statut',
            'transmis_directeur'
        )->count();

        $courriersValides = Courrier::where(
            'statut',
            'valide'
        )->count();

        $courriersRejetes = Courrier::where(
            'statut',
            'rejete'
        )->count();

        $courriersAModifier = Courrier::where(
            'statut',
            'a_modifier'
        )->count();

        $courriersRecents = Courrier::with([
            'expediteur',
        ])
            ->where('statut', 'transmis_directeur')
            ->latest('date_transmission_directeur')
            ->take(8)
            ->get();

        return view('directeur.dashboard', [
            'user' => $user,
            'courriersAExaminer' => $courriersAExaminer,
            'courriersValides' => $courriersValides,
            'courriersRejetes' => $courriersRejetes,
            'courriersAModifier' => $courriersAModifier,
            'courriersRecents' => $courriersRecents,
        ]);
    }
}