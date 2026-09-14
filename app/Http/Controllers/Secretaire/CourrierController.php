<?php

namespace App\Http\Controllers\Secretaire;

use App\Http\Controllers\Controller;
use App\Models\Commentaire;
use App\Models\Courrier;
use App\Models\Transmission;
use App\Models\User;
use App\Notifications\CourrierAModifierNotification;
use App\Notifications\CourrierEnregistreNotification;
use App\Notifications\CourrierTransmisDirecteurNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class CourrierController extends Controller
{
    /**
     * Afficher les courriers qui attendent leur enregistrement.
     */
    public function aEnregistrer(Request $request)
    {
        $date = $request->input('date');

        $query = Courrier::with('expediteur')
            ->where('statut', 'depose');

        // Filtrage par date
        if ($date) {
            $query->whereDate('date_depot', $date);
        }

        // Tri par date
        $ordre = $request->input('ordre', 'desc');

        if (!in_array($ordre, ['asc', 'desc'])) {
            $ordre = 'desc';
        }

        $courriers = $query
            ->orderBy('date_depot', $ordre)
            ->paginate(10)
            ->withQueryString();

        return view('secretaire.courriers.a-enregistrer', [
            'courriers' => $courriers,
            'date' => $date,
            'ordre' => $ordre,
        ]);
    }

    /**
     * Afficher le formulaire permettant au secrétaire
     * d'attribuer un numéro au courrier.
     */
    public function editEnregistrement(Courrier $courrier)
    {
        // Le secrétaire ne peut enregistrer qu'un courrier déposé.
        abort_unless($courrier->statut === 'depose', 404);

        $courrier->load('expediteur', 'piecesJointes');

        return view('secretaire.courriers.enregistrer', [
            'courrier' => $courrier,
        ]);
    }

    /**
     * Enregistrer définitivement le courrier.
     */
    
    public function enregistrer(Request $request, Courrier $courrier)
{
    $validated = $request->validate([
        'numero' => [
            'required',
            'string',
            'max:100',
            'unique:courriers,numero,' . $courrier->id,
        ],
    ], [
        'numero.required' => 'Veuillez saisir un numéro de courrier.',
        'numero.unique' => 'Ce numéro est déjà attribué à un autre courrier.',
    ]);

    DB::transaction(function () use ($courrier, $validated) {

        $courrier = Courrier::whereKey($courrier->id)
            ->lockForUpdate()
            ->firstOrFail();

        abort_unless(
            $courrier->statut === 'depose',
            409,
            'Ce courrier a déjà été enregistré.'
        );

        $courrier->update([
            'numero' => $validated['numero'],
            'statut' => 'enregistre',
        ]);
    });

    // Recharger les relations et les données
    $courrier->refresh();
    $courrier->load('expediteur');

    // Notification à l'émetteur
    $courrier->expediteur->notify(
        new CourrierEnregistreNotification($courrier)
    );

    return redirect()
        ->route('secretaire.courriers.a-enregistrer')
        ->with(
            'success',
            'Le courrier a été enregistré avec succès sous le numéro « '
            . $courrier->numero
            . ' ».'
        );
}

public function formDemandeModification(Courrier $courrier)
{
    $user = Auth::user();

    abort_unless(
        $user &&
        $user->actif &&
        $user->role === 'secretaire',
        403
    );

    abort_unless(
        in_array($courrier->statut, [
            'depose',
            'enregistre',
        ]),
        409
    );

    $courrier->load([
        'expediteur',
        'piecesJointes',
    ]);

    return view(
        'secretaire.courriers.demande-modification',
        compact('courrier')
    );
}

public function demanderModification(
    Request $request,
    Courrier $courrier
) {
    $user = Auth::user();

    abort_unless(
        $user &&
        $user->actif &&
        $user->role === 'secretaire',
        403
    );

    $validated = $request->validate([
        'commentaire' => [
            'required',
            'string',
            'min:5',
            'max:5000',
        ],
    ], [
        'commentaire.required' =>
            'Veuillez indiquer les modifications demandées.',

        'commentaire.min' =>
            'Votre commentaire doit contenir au moins 5 caractères.',

        'commentaire.max' =>
            'Votre commentaire ne peut pas dépasser 5000 caractères.',
    ]);

    DB::transaction(function () use (
        $courrier,
        $user,
        $validated
    ) {

        $courrier = Courrier::whereKey($courrier->id)
            ->lockForUpdate()
            ->firstOrFail();

        /*
        |--------------------------------------------------------------------------
        | Vérification du statut
        |--------------------------------------------------------------------------
        */

        if (!in_array($courrier->statut, [
            'depose',
            'enregistre',
        ])) {
            abort(
                409,
                'Ce courrier ne peut plus faire l’objet d’une demande de modification.'
            );
        }

        /*
        |--------------------------------------------------------------------------
        | Vérification de l'émetteur
        |--------------------------------------------------------------------------
        */

        $expediteur = $courrier->expediteur;

        abort_unless(
            $expediteur && $expediteur->actif,
            409,
            'L’émetteur de ce courrier n’est plus disponible.'
        );

        /*
        |--------------------------------------------------------------------------
        | Création du commentaire
        |--------------------------------------------------------------------------
        */

        $commentaire = Commentaire::create([
            'auteur_id' => $user->id,
            'destinataire_id' => $expediteur->id,
            'courrier_id' => $courrier->id,
            'contenu' => trim($validated['commentaire']),
            'lu' => false,
        ]);

        /*
        |--------------------------------------------------------------------------
        | Changement de statut
        |--------------------------------------------------------------------------
        */

        $courrier->update([
            'statut' => 'a_modifier',
        ]);

        /*
        |--------------------------------------------------------------------------
        | Notification
        |--------------------------------------------------------------------------
        */

        $expediteur->notify(
            new CourrierAModifierNotification($courrier)
        );
    });

    return redirect()
        ->route('secretaire.courriers.index')
        ->with(
            'success',
            'La demande de modification a été envoyée à l’émetteur du courrier.'
        );
}

public function formTransmission(Courrier $courrier)
{
    $user = Auth::user();

    abort_unless(
        $user &&
        $user->actif &&
        $user->role === 'secretaire',
        403
    );

    abort_unless(
        $courrier->statut === 'enregistre',
        409,
        'Ce courrier ne peut pas encore être transmis au directeur.'
    );

    $directeur = User::where('role', 'directeur')
        ->where('actif', true)
        ->firstOrFail();

    $courrier->load([
        'expediteur',
        'piecesJointes',
    ]);

    return view(
        'secretaire.courriers.transmettre-directeur',
        compact(
            'courrier',
            'directeur'
        )
    );
}

public function transmettreAuDirecteur(
    Request $request,
    Courrier $courrier
) {
    $user = Auth::user();

    abort_unless(
        $user &&
        $user->actif &&
        $user->role === 'secretaire',
        403
    );

    $validated = $request->validate([
        'commentaire' => [
            'nullable',
            'string',
            'min:5',
            'max:5000',
        ],
    ], [
        'commentaire.min' =>
            'Le commentaire doit contenir au moins 5 caractères.',

        'commentaire.max' =>
            'Le commentaire ne peut pas dépasser 5000 caractères.',
    ]);

    DB::transaction(function () use (
        $courrier,
        $user,
        $validated
    ) {

        $courrier = Courrier::whereKey($courrier->id)
            ->lockForUpdate()
            ->firstOrFail();

        if ($courrier->statut !== 'enregistre') {
            abort(
                409,
                'Ce courrier ne peut plus être transmis au directeur.'
            );
        }

        $directeur = User::where('role', 'directeur')
            ->where('actif', true)
            ->firstOrFail();

        Transmission::create([
            'courrier_id' => $courrier->id,
            'expediteur_id' => $user->id,
            'destinataire_id' => $directeur->id,
            'commentaire' => isset($validated['commentaire'])
                ? trim($validated['commentaire'])
                : null,
            'statut' => 'en_attente',
        ]);

        $courrier->update([
            'directeur_id' => $directeur->id,
            'statut' => 'transmis_directeur',
            'date_transmission_directeur' => now(),
        ]);
    });

    DB::transaction(...);

$courrier->refresh();
$courrier->load('directeur');

$courrier->directeur->notify(
    new CourrierTransmisDirecteurNotification($courrier)
);

    return redirect()
        ->route('secretaire.courriers.index')
        ->with(
            'success',
            'Le courrier a été transmis au directeur avec succès.'
        );
}

}