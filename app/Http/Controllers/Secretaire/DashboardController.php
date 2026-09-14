<?php

namespace App\Http\Controllers\Secretaire;

use App\Http\Controllers\Controller;
use App\Models\Courrier;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        /*
         * Nombre de courriers qui attendent
         * l'enregistrement par le secrétariat.
         */
        $courriersDeposes = Courrier::where(
            'statut',
            'depose'
        )->count();

        /*
         * Courriers déjà enregistrés.
         */
        $courriersEnregistres = Courrier::where(
            'statut',
            'enregistre'
        )->count();

        /*
         * Courriers demandant une modification.
         */
        $courriersAModifier = Courrier::where(
            'statut',
            'a_modifier'
        )->count();

        /*
         * Courriers transmis au directeur.
         */
        $courriersDirecteur = Courrier::where(
            'statut',
            'transmis_directeur'
        )->count();

        /*
         * Les derniers courriers déposés.
         */
        $courriersRecents = Courrier::with('expediteur')
            ->latest('date_depot')
            ->take(8)
            ->get();

            $nombreNotificationsNonLues =
        $user->unreadNotifications()->count();

        return view('secretaire.dashboard', [
            'user' => $user,
            'courriersDeposes' => $courriersDeposes,
            'courriersEnregistres' => $courriersEnregistres,
            'courriersAModifier' => $courriersAModifier,
            'courriersDirecteur' => $courriersDirecteur,
            'courriersRecents' => $courriersRecents,
            'nombreNotificationsNonLues' => $nombreNotificationsNonLues,
        ]);
    }
}
