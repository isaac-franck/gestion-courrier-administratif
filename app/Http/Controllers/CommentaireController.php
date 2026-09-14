<?php

namespace App\Http\Controllers;

use App\Models\Commentaire;
use App\Models\Courrier;
use App\Models\User;
use App\Notifications\NouveauCommentaireNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CommentaireController extends Controller
{
    public function create()
    {
        $user = Auth::user();

        $destinataires = $this->destinatairesAutorises($user);


        return view('commentaires.create', [
            'destinataires' => $destinataires,
        ]);
    }

    public function store(Request $request)
{
    $user = Auth::user();

    abort_unless(
        $user && $user->actif,
        403
    );

    $validated = $request->validate([
        'destinataire_id' => [
            'required',
            'integer',
            'exists:users,id',
        ],

        'courrier_id' => [
            'nullable',
            'integer',
            'exists:courriers,id',
        ],

        'contenu' => [
            'required',
            'string',
            'min:2',
            'max:5000',
        ],
    ]);

    /*
    |--------------------------------------------------------------------------
    | 1. Vérifier le destinataire
    |--------------------------------------------------------------------------
    */

    $destinatairesAutorises = $this
        ->destinatairesAutorises($user)
        ->pluck('id');

    if (!$destinatairesAutorises->contains(
        (int) $validated['destinataire_id']
    )) {
        abort(
            403,
            'Vous n’êtes pas autorisé à commenter cet utilisateur.'
        );
    }

    /*
    |--------------------------------------------------------------------------
    | 2. Empêcher l'auto-commentaire
    |--------------------------------------------------------------------------
    */

    if (
        (int) $validated['destinataire_id']
        === $user->id
    ) {
        return back()
            ->withErrors([
                'destinataire_id' =>
                    'Vous ne pouvez pas vous envoyer un commentaire à vous-même.',
            ])
            ->withInput();
    }

    /*
    |--------------------------------------------------------------------------
    | 3. Vérifier le destinataire
    |--------------------------------------------------------------------------
    */

    $destinataire = User::whereKey(
        $validated['destinataire_id']
    )
        ->where('actif', true)
        ->firstOrFail();

    /*
    |--------------------------------------------------------------------------
    | 4. Vérifier le courrier s'il existe
    |--------------------------------------------------------------------------
    */

    $courrier = null;

    if (!empty($validated['courrier_id'])) {

        $courrier = Courrier::findOrFail(
            $validated['courrier_id']
        );

        /*
         * L'auteur doit pouvoir consulter le courrier.
         */
        abort_unless(
            $this->utilisateurPeutConsulterCourrier(
                $user,
                $courrier
            ),
            403
        );

        /*
         * Le destinataire doit également pouvoir consulter
         * le courrier.
         */
        abort_unless(
            $this->utilisateurPeutConsulterCourrier(
                $destinataire,
                $courrier
            ),
            403
        );
    }

    /*
    |--------------------------------------------------------------------------
    | 5. Créer le commentaire
    |--------------------------------------------------------------------------
    */

    $commentaire = Commentaire::create([
        'auteur_id' => $user->id,
        'destinataire_id' => $destinataire->id,
        'courrier_id' => $courrier?->id,
        'contenu' => trim($validated['contenu']),
        'lu' => false,
    ]);

    /*
    |--------------------------------------------------------------------------
    | 6. Notification
    |--------------------------------------------------------------------------
    */

    $commentaire->load('auteur');

    $destinataire->notify(
        new NouveauCommentaireNotification($commentaire)
    );

    return redirect()
        ->route('commentaires.index')
        ->with(
            'success',
            'Votre commentaire a été envoyé avec succès.'
        );
}

    private function destinatairesAutorises(User $user)
    {
        return match ($user->role) {

            'secretaire',
            'directeur',
            'administrateur'
                => User::where('id', '!=', $user->id)
                    ->where('actif', true)
                    ->orderBy('nom')
                    ->orderBy('prenom')
                    ->get(),

            'personnel'
                => User::where('role', 'chef_service')
                    ->where('service_id', $user->service_id)
                    ->where('actif', true)
                    ->get(),

            'chef_service'
                => User::where('actif', true)
                    ->where(function ($query) use ($user) {
                        $query
                            ->where(function ($q) use ($user) {
                                $q->where('role', 'personnel')
                                    ->where(
                                        'service_id',
                                        $user->service_id
                                    );
                            })
                            ->orWhereIn('role', [
                                'secretaire',
                                'directeur',
                            ]);
                    })
                    ->orderBy('nom')
                    ->orderBy('prenom')
                    ->get(),

            default => collect(),
        };
    }

    public function index()
{
    $user = Auth::user();

    abort_unless(
        $user && $user->actif,
        403
    );

    $commentaires = $user->commentairesRecus()
        ->with([
            'auteur',
            'courrier',
        ])
        ->latest()
        ->paginate(10);

    return view('commentaires.mes-commentaires', [
        'commentaires' => $commentaires,
    ]);
}

public function show(Commentaire $commentaire)
{
    $user = Auth::user();

    abort_unless(
        $commentaire->destinataire_id === $user->id,
        404
    );

    $commentaire->load([
        'auteur',
        'courrier',
    ]);

    if (!$commentaire->lu) {
        $commentaire->update([
            'lu' => true,
        ]);
    }

    return view('commentaires.show', [
        'commentaire' => $commentaire,
    ]);
}

private function utilisateurPeutConsulterCourrier(
    User $user,
    Courrier $courrier
): bool {
    // Expéditeur
    if ($courrier->expediteur_id === $user->id) {
        return true;
    }

    // Destinataire
    if ($courrier->destinataire_id === $user->id) {
        return true;
    }

    // Secrétaire
    if ($user->role === 'secretaire') {
        return true;
    }

    // Directeur
    if ($user->role === 'directeur') {
        return true;
    }

    // Administrateur
    if ($user->role === 'administrateur') {
        return true;
    }

    return false;
}
}