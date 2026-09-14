<?php

namespace App\Http\Controllers\Courrier;

use App\Http\Controllers\Controller;
use App\Models\Courrier;
use App\Models\CourrierPieceJointe;
use App\Models\User;
use App\Notifications\NouveauCourrierDepose;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class CourrierController extends Controller
{

public function index(Request $request)
    {
        $query = Courrier::with([
            'expediteur',
            'destinataire',
        ]);

        /*
        |--------------------------------------------------------------------------
        | Recherche
        |--------------------------------------------------------------------------
        */

        if ($request->filled('recherche')) {

            $recherche = trim($request->input('recherche'));

            $query->where(function ($q) use ($recherche) {

                $q->where('nom', 'like', "%{$recherche}%")
                    ->orWhere('numero', 'like', "%{$recherche}%")

                    ->orWhereHas('expediteur', function ($q) use ($recherche) {
                        $q->where('nom', 'like', "%{$recherche}%")
                            ->orWhere('prenom', 'like', "%{$recherche}%");
                    })

                    ->orWhereHas('destinataire', function ($q) use ($recherche) {
                        $q->where('nom', 'like', "%{$recherche}%")
                            ->orWhere('prenom', 'like', "%{$recherche}%");
                    });
            });
        }

        /*
        |--------------------------------------------------------------------------
        | Filtre par état
        |--------------------------------------------------------------------------
        */

        $statutsAutorises = [
            'depose',
            'a_modifier',
            'enregistre',
            'transmis_directeur',
            'valide',
            'transmis_destinataire',
            'rejete',
        ];

        if (
            $request->filled('statut') &&
            in_array($request->statut, $statutsAutorises)
        ) {
            $query->where('statut', $request->statut);
        }

        /*
        |--------------------------------------------------------------------------
        | Tri
        |--------------------------------------------------------------------------
        */

        $trisAutorises = [
            'date_depot',
            'date_courrier',
        ];

        $tri = $request->input('tri', 'date_depot');
        $ordre = $request->input('ordre', 'desc');

        if (!in_array($tri, $trisAutorises)) {
            $tri = 'date_depot';
        }

        if (!in_array($ordre, ['asc', 'desc'])) {
            $ordre = 'desc';
        }

        $query->orderBy($tri, $ordre);

        /*
        |--------------------------------------------------------------------------
        | Pagination
        |--------------------------------------------------------------------------
        */

        $courriers = $query
            ->paginate(15)
            ->withQueryString();

        return view('courriers.index', [
            'courriers' => $courriers,
            'tri' => $tri,
            'ordre' => $ordre,
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | Afficher le formulaire
    |--------------------------------------------------------------------------
    */

    public function create()
    {
        return view('courriers.create');
    }


    public function show(Courrier $courrier)
{
    $courrier->load([
        'expediteur',
        'destinataire',
        'piecesJointes',
    ]);

    return view('courriers.show', [
        'courrier' => $courrier,
    ]);
}


public function showPiece(
    Courrier $courrier,
    CourrierPieceJointe $piece
) {
    // vérifier que la pièce appartient bien au courrier
    abort_unless(
        $piece->courrier_id === $courrier->id,
        404
    );

    // vérifier que le fichier existe réellement
    abort_unless(
        Storage::disk('local')->exists($piece->chemin),
        404
    );

    // ouvrir le fichier dans le navigateur
    return response()->file(
        Storage::disk('local')->path($piece->chemin)
    );
}



public function downloadPiece(
    Courrier $courrier,
    CourrierPieceJointe $piece
) {

// vérifier que la pièce appartient bien au courrier
    abort_unless(
        $piece->courrier_id === $courrier->id,
        404
    );

    // vérifier que le fichier existe
    abort_unless(
        Storage::disk('local')->exists($piece->chemin),
        404
    );

    // télécharger le fichier avec son nom original
    return Storage::disk('local')->download(
        $piece->chemin,
        $piece->nom_original
    );
}


    /*
    |--------------------------------------------------------------------------
    | Enregistrer un courrier
    |--------------------------------------------------------------------------
    */

    public function store(Request $request)
    {
        /*
        |--------------------------------------------------------------------------
        | Utilisateur connecté
        |--------------------------------------------------------------------------
        */

        $user = Auth::user();


        /*
        |--------------------------------------------------------------------------
        | Vérification supplémentaire
        |--------------------------------------------------------------------------
        |
        | Le middleware protège déjà la route.
        | Cette vérification ajoute une seconde barrière.
        |
        */

        if (
            !$user ||
            !$user->actif
        ) {
            abort(403);
        }


        


        


        /*
        |--------------------------------------------------------------------------
        | Validation
        |--------------------------------------------------------------------------
        */

        $validated = $request->validate([

            'nom' => [
                'required',
                'string',
                'max:255',
            ],


            'description' => [
                'required',
                'string',
                'max:10000',
            ],

            'fichiers' => [
                'nullable',
                'array',
                'max:10',
            ],

            'fichiers.*' => [
                'file',
                'max:10240',
                'mimes:pdf,doc,docx,xls,xlsx,png,jpg,jpeg',
            ],

            [ 
                'nom.required' => 'Le nom du courrier est obligatoire.', 
                'nom.max' => 'Le nom du courrier ne doit pas dépasser 255 caractères.', 
                'description.required' => 'La description du courrier est obligatoire.', 
                'description.max' => 'La description ne doit pas dépasser 10 000 caractères.', 
                'fichiers.max' => 'Vous ne pouvez joindre que 10 fichiers maximum.', 
                'fichiers.*.file' => 'Un des fichiers envoyés est invalide.', 
                'fichiers.*.max' => 'Chaque fichier ne doit pas dépasser 10 Mo.', 
            'fichiers.*.mimes' => 'Format de fichier non autorisé.', 
            ]

        ]);


        /*
        |--------------------------------------------------------------------------
        | Transaction
        |--------------------------------------------------------------------------
        */

        $storedFiles = [];

        try {

        $secretaire = User::query() ->where('role', 'secretaire') ->where('actif', true) ->first(); 
        if (!$secretaire) 
            { 
                return back() ->withErrors([ 'courrier' => 'Impossible de déposer le courrier actuellement : aucun secrétaire actif n\'est disponible.', ]) ->withInput(); 
            }

            DB::beginTransaction();


            


            /*
            |--------------------------------------------------------------------------
            | Création du courrier
            |--------------------------------------------------------------------------
            */

            $courrier = Courrier::create([ 
                'numero' => null,
                'nom' => $validated['nom'], 
            'description' => $validated['description'], 
            'expediteur_id' => $user->id, 
            'statut' => 'depose', 
            'date_depot' => now(), ]);

            /*
            |--------------------------------------------------------------------------
            | Enregistrement des fichiers
            |--------------------------------------------------------------------------
            */

            foreach (
                $request->file('fichiers', [])
                as $fichier
            ) {

                /*
                | Génération d'un nom aléatoire.
                | On ne conserve jamais le nom fourni
                | par l'utilisateur comme nom physique du fichier.
                */

                $nomStockage =
                    Str::uuid() .
                    '.' .
                    $fichier->extension();


                $chemin = $fichier->storeAs(
                    'courriers/' . $courrier->id,
                    $nomStockage,
                    'local'
                );


                $storedFiles[] = $chemin;


                CourrierPieceJointe::create([

                    'courrier_id' =>
                        $courrier->id,

                    'nom_original' =>
                        $fichier->getClientOriginalName(),

                    'chemin' =>
                        $chemin,

                    'mime_type' =>
                        $fichier->getMimeType(),

                    'taille' =>
                        $fichier->getSize(),

                ]);
            }

            /* 
            * 7. Notification UNIQUEMENT du secrétariat. 
            */ 
            $secretaire->notify( new NouveauCourrierDepose($courrier) );


            /*
            |--------------------------------------------------------------------------
            | Validation de la transaction
            |--------------------------------------------------------------------------
            */

            DB::commit();


            return redirect()
                ->route('courriers.create')
                ->with(
                    'success',
                    'Votre courrier a été déposé avec succès. Référence : '
                    . $courrier->numero
                );


        } catch (\Throwable $e) {

            /*
            |--------------------------------------------------------------------------
            | Annulation de la transaction
            |--------------------------------------------------------------------------
            */

            DB::rollBack();


            /*
            |--------------------------------------------------------------------------
            | Suppression des fichiers déjà enregistrés
            |--------------------------------------------------------------------------
            |
            | Si un fichier a été stocké avant l'erreur,
            | on le supprime pour éviter les fichiers orphelins.
            |
            */

            foreach ($storedFiles as $path) {

                Storage::disk('local')
                    ->delete($path);

            }


            return back()
                ->withErrors([
                    'courrier' =>
                        'Une erreur est survenue lors du dépôt du courrier. '
                        . 'Aucune donnée n’a été enregistrée.'
                ])
                ->withInput();
        }
    }
}
