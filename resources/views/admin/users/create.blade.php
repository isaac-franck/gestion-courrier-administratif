@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-slate-50 dark:bg-slate-950 transition-colors duration-300">

    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-10">

        {{-- Retour --}}
        <a href="{{ route('admin.users.index') }}"
           class="inline-flex items-center gap-2 text-sm font-medium
                  text-slate-500 hover:text-green-600
                  dark:text-slate-400 dark:hover:text-green-400 transition">

            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M15 19l-7-7 7-7"/>
            </svg>

            Retour à la gestion des utilisateurs

        </a>


        {{-- Titre --}}
        <div class="mt-6 mb-8">

            <span class="inline-flex px-3 py-1 rounded-full
                         bg-green-100 dark:bg-green-900/30
                         text-green-700 dark:text-green-400
                         text-xs font-bold uppercase tracking-wider">

                Nouveau compte

            </span>

            <h1 class="mt-3 text-3xl font-bold text-slate-900 dark:text-white">
                Créer un utilisateur
            </h1>

            <p class="mt-2 text-slate-500 dark:text-slate-400">
                Créez un compte pour un membre de l'organisation CENADI.
            </p>

        </div>


        {{-- Erreurs --}}
        @if ($errors->any())

            <div class="mb-6 rounded-xl border border-red-200
                        bg-red-50 dark:bg-red-900/20
                        dark:border-red-800 p-4">

                <ul class="space-y-1 text-sm text-red-600 dark:text-red-400">

                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach

                </ul>

            </div>

        @endif


        <form action="{{ route('admin.users.store') }}"
              method="POST"
              class="space-y-8">

            @csrf


            {{-- Informations personnelles --}}
            <section class="bg-white dark:bg-slate-900
                            rounded-2xl border border-slate-200 dark:border-slate-800
                            shadow-sm overflow-hidden">

                <div class="px-6 py-5 border-b border-slate-200 dark:border-slate-800">

                    <h2 class="text-lg font-bold text-slate-900 dark:text-white">
                        Informations personnelles
                    </h2>

                    <p class="text-sm text-slate-500 dark:text-slate-400 mt-1">
                        Informations générales concernant l'utilisateur.
                    </p>

                </div>


                <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-6">

                    {{-- Nom --}}
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2">
                            Nom
                        </label>

                        <input
                            type="text"
                            name="nom"
                            value="{{ old('nom') }}"
                            required
                            class="w-full rounded-xl border border-slate-300 dark:border-slate-700
                                   bg-white dark:bg-slate-800
                                   text-slate-900 dark:text-white
                                   px-4 py-3 outline-none
                                   focus:ring-2 focus:ring-green-500 focus:border-green-500"
                            placeholder="Ex. Mbarga">
                    </div>


                    {{-- Prénom --}}
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2">
                            Prénom
                        </label>

                        <input
                            type="text"
                            name="prenom"
                            value="{{ old('prenom') }}"
                            required
                            class="w-full rounded-xl border border-slate-300 dark:border-slate-700
                                   bg-white dark:bg-slate-800
                                   text-slate-900 dark:text-white
                                   px-4 py-3 outline-none
                                   focus:ring-2 focus:ring-green-500 focus:border-green-500"
                            placeholder="Ex. Paul">
                    </div>


                    {{-- Email --}}
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2">
                            Adresse e-mail
                        </label>

                        <input
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            required
                            class="w-full rounded-xl border border-slate-300 dark:border-slate-700
                                   bg-white dark:bg-slate-800
                                   text-slate-900 dark:text-white
                                   px-4 py-3 outline-none
                                   focus:ring-2 focus:ring-green-500 focus:border-green-500"
                            placeholder="utilisateur@cenadi.cm">
                    </div>


                    {{-- Téléphone --}}
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2">
                            Téléphone
                        </label>

                        <input
                            type="tel"
                            name="telephone"
                            value="{{ old('telephone') }}"
                            class="w-full rounded-xl border border-slate-300 dark:border-slate-700
                                   bg-white dark:bg-slate-800
                                   text-slate-900 dark:text-white
                                   px-4 py-3 outline-none
                                   focus:ring-2 focus:ring-green-500 focus:border-green-500"
                            placeholder="6XXXXXXXX">
                    </div>


                    {{-- Sexe --}}
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2">
                            Sexe
                        </label>

                        <select
                            name="sexe"
                            required
                            class="w-full rounded-xl border border-slate-300 dark:border-slate-700
                                   bg-white dark:bg-slate-800
                                   text-slate-900 dark:text-white
                                   px-4 py-3 outline-none
                                   focus:ring-2 focus:ring-green-500">

                            <option value="">Sélectionner</option>
                            <option value="homme" @selected(old('sexe') === 'homme')>
                                Homme
                            </option>
                            <option value="femme" @selected(old('sexe') === 'femme')>
                                Femme
                            </option>

                        </select>
                    </div>


                    {{-- Date de naissance --}}
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2">
                            Date de naissance
                        </label>

                        <input
                            type="date"
                            name="date_naissance"
                            value="{{ old('date_naissance') }}"
                            required
                            class="w-full rounded-xl border border-slate-300 dark:border-slate-700
                                   bg-white dark:bg-slate-800
                                   text-slate-900 dark:text-white
                                   px-4 py-3 outline-none
                                   focus:ring-2 focus:ring-green-500">
                    </div>

                </div>

            </section>


            {{-- Organisation --}}
            <section class="bg-white dark:bg-slate-900
                            rounded-2xl border border-slate-200 dark:border-slate-800
                            shadow-sm overflow-hidden">

                <div class="px-6 py-5 border-b border-slate-200 dark:border-slate-800">

                    <h2 class="text-lg font-bold text-slate-900 dark:text-white">
                        Affectation et rôle
                    </h2>

                    <p class="text-sm text-slate-500 dark:text-slate-400 mt-1">
                        Définissez les responsabilités et l'affectation de l'utilisateur.
                    </p>

                </div>


                <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-6">

                    {{-- Rôle --}}
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2">
                            Rôle
                        </label>

                        <select
                            id="role"
                            name="role"
                            required
                            class="w-full rounded-xl border border-slate-300 dark:border-slate-700
                                   bg-white dark:bg-slate-800
                                   text-slate-900 dark:text-white
                                   px-4 py-3 outline-none
                                   focus:ring-2 focus:ring-green-500">

                            <option value="">Sélectionner un rôle</option>

                            <option value="personnel" @selected(old('role') === 'personnel')}>
                                Personnel
                            </option>

                            <option value="chef_service" @selected(old('role') === 'chef_service')}>
                                Chef de service
                            </option>

                            <option value="secretaire" @selected(old('role') === 'secretaire')}>
                                Secrétaire
                            </option>

                            <option value="directeur" @selected(old('role') === 'directeur')}>
                                Directeur
                            </option>

                            <option value="administrateur" @selected(old('role') === 'administrateur')}>
                                Administrateur
                            </option>

                        </select>
                    </div>


                    {{-- Service --}}
                    <div id="service-container" class="hidden">

                        <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2">
                            Service
                        </label>

                        <select
                            id="service_id"
                            name="service_id"
                            class="w-full rounded-xl border border-slate-300 dark:border-slate-700
                                   bg-white dark:bg-slate-800
                                   text-slate-900 dark:text-white
                                   px-4 py-3 outline-none
                                   focus:ring-2 focus:ring-green-500">

                            <option value="">
                                Sélectionner un service
                            </option>

                            @foreach ($services as $service)

                                <option
                                    value="{{ $service->id }}"
                                    @selected(old('service_id') == $service->id)
                                >
                                    {{ $service->nom }}
                                </option>

                            @endforeach

                        </select>

                        <p class="mt-2 text-xs text-slate-500 dark:text-slate-400">
                            Le service est obligatoire pour un personnel ou un chef de service.
                        </p>

                    </div>

                </div>

            </section>


            {{-- Sécurité --}}
            <section class="bg-white dark:bg-slate-900
                            rounded-2xl border border-slate-200 dark:border-slate-800
                            shadow-sm overflow-hidden">

                <div class="px-6 py-5 border-b border-slate-200 dark:border-slate-800">

                    <h2 class="text-lg font-bold text-slate-900 dark:text-white">
                        Sécurité du compte
                    </h2>

                </div>


                <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-6">

                    <div>
                        <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2">
                            Mot de passe
                        </label>

                        <input
                            type="password"
                            name="password"
                            required
                            class="w-full rounded-xl border border-slate-300 dark:border-slate-700
                                   bg-white dark:bg-slate-800
                                   text-slate-900 dark:text-white
                                   px-4 py-3 outline-none
                                   focus:ring-2 focus:ring-green-500"
                            placeholder="Minimum 8 caractères">
                    </div>


                    <div>
                        <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2">
                            Confirmer le mot de passe
                        </label>

                        <input
                            type="password"
                            name="password_confirmation"
                            required
                            class="w-full rounded-xl border border-slate-300 dark:border-slate-700
                                   bg-white dark:bg-slate-800
                                   text-slate-900 dark:text-white
                                   px-4 py-3 outline-none
                                   focus:ring-2 focus:ring-green-500"
                            placeholder="Répéter le mot de passe">
                    </div>

                </div>

            </section>


            {{-- Boutons --}}
            <div class="flex flex-col sm:flex-row justify-end gap-3">

                <a href="{{ route('admin.users.index') }}"
                   class="px-6 py-3 rounded-xl
                          border border-slate-300 dark:border-slate-700
                          text-slate-700 dark:text-slate-300
                          font-semibold text-center
                          hover:bg-slate-100 dark:hover:bg-slate-800 transition">

                    Annuler

                </a>

                <button
                    type="submit"
                    class="px-6 py-3 rounded-xl
                           bg-green-600 hover:bg-green-700
                           text-white font-semibold
                           shadow-lg shadow-green-600/20
                           transition">

                    Créer le compte

                </button>

            </div>

        </form>

    </div>

</div>


{{-- Gestion dynamique du service --}}
<script>

document.addEventListener('DOMContentLoaded', function () {

    const role = document.getElementById('role');
    const serviceContainer = document.getElementById('service-container');
    const service = document.getElementById('service_id');

    function updateServiceField() {

        const rolesWithService = [
            'personnel',
            'chef_service'
        ];

        if (rolesWithService.includes(role.value)) {

            serviceContainer.classList.remove('hidden');
            service.required = true;

        } else {

            serviceContainer.classList.add('hidden');
            service.required = false;
            service.value = '';

        }
    }

    role.addEventListener('change', updateServiceField);

    updateServiceField();

});

</script>

@endsection