<?php

namespace App\Http\Controllers\Personnel;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardPersonnelController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        /*
        |--------------------------------------------------------------------------
        | Statistiques
        |--------------------------------------------------------------------------
        |
        | Pour le moment, les tables Courrier, Réponse, Notification
        | et Commentaire ne sont pas encore créées.
        |
        | Nous les remplacerons par de vraies requêtes lorsque
        | le module courrier sera développé.
        |
        */

        $stats = [
            'courriers_envoyes' => 0,
            'courriers_recus' => 0,
            'reponses' => 0,
            'notifications' => 0,
        ];

        $courriersRecents = collect();

        return view(
            'personnel.dashboard',
            compact(
                'user',
                'stats',
                'courriersRecents'
            )
        );
    }
}
