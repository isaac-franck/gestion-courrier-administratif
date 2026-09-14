<?php
 
 namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ServiceController extends Controller
{
    /**
     * Afficher la liste des services.
     */
    public function index()
    {
        $services = Service::withCount('users')
            ->latest()
            ->paginate(10);

        return view('admin.services.index', compact('services'));
    }

    /**
     * Afficher le formulaire de création.
     */
    public function create()
    {
        return view('admin.services.create');
    }

    /**
     * Enregistrer un nouveau service.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => [
                'required',
                'string',
                'max:255',
                'unique:services,nom',
            ],

            'description' => [
                'nullable',
                'string',
                'max:1000',
            ],
        ]);

        Service::create([
            'nom' => $validated['nom'],
            'description' => $validated['description'] ?? null,
            'actif' => true,
        ]);

        return redirect()
            ->route('admin.services.index')
            ->with(
                'success',
                'Service créé avec succès.'
            );
    }

    /**
     * Afficher le formulaire de modification.
     */
    public function edit(Service $service)
    {
        return view('admin.services.edit', compact('service'));
    }

    /**
     * Modifier un service.
     */
    public function update(Request $request, Service $service)
    {
        $validated = $request->validate([
            'nom' => [
                'required',
                'string',
                'max:255',
                Rule::unique('services', 'nom')
                    ->ignore($service->id),
            ],

            'description' => [
                'nullable',
                'string',
                'max:1000',
            ],
        ]);

        $service->update([
            'nom' => $validated['nom'],
            'description' => $validated['description'] ?? null,
        ]);

        return redirect()
            ->route('admin.services.index')
            ->with(
                'success',
                'Service modifié avec succès.'
            );
    }

    /**
     * Supprimer un service.
     */
    public function destroy(Service $service)
    {
        /*
         * Vérifier si des utilisateurs sont encore
         * affectés à ce service.
         */
        if ($service->users()->exists()) {
            return back()->withErrors([
                'service' =>
                    'Impossible de supprimer ce service car des utilisateurs y sont encore affectés. '
                    . 'Veuillez d’abord réaffecter ces utilisateurs à un autre service.',
            ]);
        }

        try {
            $service->delete();

            return redirect()
                ->route('admin.services.index')
                ->with(
                    'success',
                    'Service supprimé avec succès.'
                );

        } catch (\Throwable $e) {
            return back()->withErrors([
                'service' =>
                    'Impossible de supprimer ce service. Veuillez réessayer.',
            ]);
        }
    }
}