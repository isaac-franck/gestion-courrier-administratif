<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Afficher la liste des utilisateurs.
     */
    public function index()
{
    return view('admin.users.index');
}

public function list(Request $request)
{
    $query = User::with('service');

    // Recherche générale
    if ($request->filled('search')) {
        $search = $request->search;

        $query->where(function ($q) use ($search) {
            $q->where('nom', 'like', "%{$search}%")
              ->orWhere('prenom', 'like', "%{$search}%")
              ->orWhere('email', 'like', "%{$search}%")
              ->orWhere('telephone', 'like', "%{$search}%");
        });
    }

    // Filtre par rôle
    if ($request->filled('role')) {
        $query->where('role', $request->role);
    }

    // Filtre par service
    if ($request->filled('service_id')) {
        $query->where('service_id', $request->service_id);
    }

    // Filtre par statut
    if ($request->filled('statut')) {
        if ($request->statut === 'actif') {
            $query->where('actif', true);
        }

        if ($request->statut === 'bloque') {
            $query->where('actif', false);
        }
    }

    $users = $query
        ->latest()
        ->paginate(15)
        ->withQueryString();

    $services = Service::orderBy('nom')->get();

    return view('admin.users.list', compact(
        'users',
        'services'
    ));
}


    /**
     * Afficher le formulaire de création.
     */
    public function create()
    {
        $services = Service::where('actif', true)
            ->orderBy('nom')
            ->get();

        return view('admin.users.create', compact('services'));
    }


    /**
     * Créer un nouvel utilisateur.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => ['required', 'string', 'max:255'],

            'prenom' => ['required', 'string', 'max:255'],

            'email' => [
                'required',
                'email',
                'max:255',
                'unique:users,email',
            ],

            'telephone' => [
                'nullable',
                'string',
                'max:30',
            ],

            'sexe' => [
                'required',
                'in:homme,femme',
            ],

            'date_naissance' => [
                'required',
                'date',
            ],

            'role' => [
                'required',
                'in:personnel,chef_service,secretaire,directeur,administrateur',
            ],

            'service_id' => [
                'nullable',
                'exists:services,id',
            ],

            'password' => [
                'required',
                'string',
                'min:8',
                'confirmed',
            ],
        ]);


        /*
         * Le personnel et le chef de service
         * doivent obligatoirement appartenir
         * à un service.
         */
        if (
            in_array($validated['role'], ['personnel', 'chef_service'])
            && empty($validated['service_id'])
        ) {
            return back()
                ->withErrors([
                    'service_id' => 'Ce rôle doit obligatoirement être rattaché à un service.',
                ])
                ->withInput();
        }


        /*
         * Les autres rôles ne sont pas rattachés
         * à un service.
         */
        if (
            in_array(
                $validated['role'],
                ['secretaire', 'directeur', 'administrateur']
            )
        ) {
            $validated['service_id'] = null;
        }


        /*
         * Création du compte.
         *
         * Un compte créé par l'administrateur
         * est toujours actif.
         */
        $user = User::create([
            'nom' => $validated['nom'],
            'prenom' => $validated['prenom'],
            'email' => $validated['email'],
            'telephone' => $validated['telephone'] ?? null,
            'sexe' => $validated['sexe'],
            'date_naissance' => $validated['date_naissance'],
            'role' => $validated['role'],
            'service_id' => $validated['service_id'] ?? null,
            'password' => $validated['password'],
            'actif' => true,
        ]);


        return redirect()
            ->route('admin.users.list')
            ->with('success', 'Utilisateur créé avec succès.');
    }


    /**
     * Afficher le formulaire de modification.
     */
    public function edit(User $user)
    {
        $services = Service::where('actif', true)
            ->orderBy('nom')
            ->get();

        return view(
            'admin.users.edit',
            compact('user', 'services')
        );
    }


    /**
     * Modifier un utilisateur.
     */
    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'nom' => ['required', 'string', 'max:255'],

            'prenom' => ['required', 'string', 'max:255'],

            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users', 'email')
                    ->ignore($user->id),
            ],

            'telephone' => [
                'nullable',
                'string',
                'max:30',
            ],

            'sexe' => [
                'required',
                'in:homme,femme',
            ],

            'date_naissance' => [
                'required',
                'date',
            ],

            'role' => [
                'required',
                'in:externe,personnel,chef_service,secretaire,directeur,administrateur',
            ],

            'service_id' => [
                'nullable',
                'exists:services,id',
            ],

            'password' => [
                'nullable',
                'string',
                'min:8',
                'confirmed',
            ],
        ]);


        /*
         * Personnel et chef de service :
         * service obligatoire.
         */
        if (
            in_array($validated['role'], ['personnel', 'chef_service'])
            && empty($validated['service_id'])
        ) {
            return back()
                ->withErrors([
                    'service_id' => 'Ce rôle doit obligatoirement être rattaché à un service.',
                ])
                ->withInput();
        }


        /*
         * Les rôles suivants n'ont pas de service.
         */
        if (
            in_array(
                $validated['role'],
                ['externe', 'secretaire', 'directeur', 'administrateur']
            )
        ) {
            $validated['service_id'] = null;
        }


        /*
         * On ne modifie pas le mot de passe
         * si l'administrateur laisse le champ vide.
         */
        if (empty($validated['password'])) {
            unset($validated['password']);
        }


        $user->update($validated);


        return redirect()
            ->route('admin.users.list')
            ->with('success', 'Utilisateur modifié avec succès.');
    }


    /**
     * Supprimer un utilisateur.
     */
    public function destroy(User $user)
{
    if ($user->id === Auth::id()) {
    return back()->withErrors([
        'user' => 'Vous ne pouvez pas supprimer votre propre compte administrateur.',
    ]);
}
    try {

        $user->delete();

        return redirect()
            ->route('admin.users.list')
            ->with('success', 'Utilisateur supprimé avec succès.');

    } catch (\Throwable $e) {

        return back()
            ->withErrors([
                'user' => 'Impossible de supprimer cet utilisateur. Veuillez réessayer.'
            ]);
    }
}


    /**
     * Bloquer un utilisateur.
     */
public function block(User $user)
{
    // Empêcher un administrateur de se bloquer lui-même
    if ($user->id === Auth::id()) {
        return back()->withErrors([
            'user' => 'Vous ne pouvez pas bloquer votre propre compte administrateur.',
        ]);
    }

    // Vérifier si le compte est déjà bloqué
    if (!$user->actif) {
        return back()->withErrors([
            'user' => 'Cet utilisateur est déjà bloqué.',
        ]);
    }

    try {
        $user->update([
            'actif' => false,
        ]);

        return back()->with(
            'success',
            'Utilisateur bloqué avec succès.'
        );

    } catch (\Throwable $e) {
        return back()->withErrors([
            'user' => 'Impossible de bloquer cet utilisateur. Veuillez réessayer.',
        ]);
    }
}




    /**
     * Débloquer un utilisateur.
     */
    public function unblock(User $user)
{
    if ($user->actif) {
        return back()->withErrors([
            'user' => 'Cet utilisateur est déjà actif. Il doit être bloqué avant de pouvoir être débloqué.',
        ]);
    }

    try {

        $user->update([
            'actif' => true,
        ]);

        return back()->with(
            'success',
            'Utilisateur débloqué avec succès.'
        );

    } catch (\Throwable $e) {

        return back()->withErrors([
            'user' => 'Impossible de débloquer cet utilisateur. Veuillez réessayer.',
        ]);
    }
}
}