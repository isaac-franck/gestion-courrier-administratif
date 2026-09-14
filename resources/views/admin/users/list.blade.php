@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-slate-50 dark:bg-slate-950 transition-colors duration-300">

    <!-- HEADER -->
    <header class="sticky top-0 z-40 border-b border-slate-200/80 dark:border-slate-800 bg-white/90 dark:bg-slate-900/90 backdrop-blur-xl">

        <div class="px-4 sm:px-6 lg:px-8 py-4">

            <div class="flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">

                <!-- Left -->
                <div class="flex items-center gap-3">

                    <a
                        href="{{ route('admin.users.index') }}"
                        class="flex h-10 w-10 items-center justify-center rounded-xl
                               border border-slate-200 dark:border-slate-700
                               bg-white dark:bg-slate-800
                               text-slate-600 dark:text-slate-300
                               hover:bg-slate-50 dark:hover:bg-slate-700
                               transition"
                    >
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M15 19l-7-7 7-7"/>
                        </svg>
                    </a>

                    <div>
                        <p class="text-sm text-slate-500 dark:text-slate-400">
                            Administration
                        </p>

                        <h1 class="text-xl font-bold text-slate-900 dark:text-white">
                            Gestion des utilisateurs
                        </h1>
                    </div>

                </div>

                <!-- Right -->
                <div class="flex items-center gap-3">

                    <!-- Theme -->
                    <button
                        id="admin-theme-toggle"
                        type="button"
                        class="h-10 w-10 rounded-xl border
                               border-slate-200 dark:border-slate-700
                               bg-white dark:bg-slate-800
                               text-slate-600 dark:text-slate-300
                               hover:bg-slate-50 dark:hover:bg-slate-700
                               transition"
                    >
                        <svg class="h-5 w-5 mx-auto dark:hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364-6.364l-.707.707M6.343 17.657l-.707.707m12.728 0l-.707-.707M6.343 6.343l-.707-.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/>
                        </svg>

                        <svg class="hidden h-5 w-5 mx-auto dark:block" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"/>
                        </svg>
                    </button>

                    <!-- Create -->
                    <a
                        href="{{ route('admin.users.create') }}"
                        class="inline-flex items-center gap-2 rounded-xl
                               bg-green-600 px-4 py-2.5
                               text-sm font-semibold text-white
                               hover:bg-green-700
                               shadow-sm hover:shadow-md
                               transition"
                    >
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M12 4v16m8-8H4"/>
                        </svg>

                        Créer un utilisateur
                    </a>

                </div>

            </div>

        </div>
    </header>


    <!-- MAIN -->
    <main class="px-4 sm:px-6 lg:px-8 py-8 max-w-7xl mx-auto">

        <!-- MESSAGES -->
        @if(session('success'))

            <div class="mb-6 flex items-start gap-3 rounded-2xl
                        border border-green-200 dark:border-green-900
                        bg-green-50 dark:bg-green-950/30
                        p-4 text-green-800 dark:text-green-300">

                <svg class="h-5 w-5 mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M5 13l4 4L19 7"/>
                </svg>

                <div>
                    <p class="font-semibold">
                        Opération réussie
                    </p>

                    <p class="text-sm mt-1">
                        {{ session('success') }}
                    </p>
                </div>

            </div>

        @endif


        @if($errors->any())

            <div class="mb-6 rounded-2xl
                        border border-red-200 dark:border-red-900
                        bg-red-50 dark:bg-red-950/30
                        p-4 text-red-800 dark:text-red-300">

                <div class="flex items-start gap-3">

                    <svg class="h-5 w-5 mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M12 8v4m0 4h.01M10.29 3.86L1.82 18a2 2 0 001.71 2.57h16.94A2 2 0 0022.18 18L13.71 3.86a2 2 0 00-3.42 0z"/>
                    </svg>

                    <div>

                        <p class="font-semibold">
                            L'opération n'a pas pu être effectuée
                        </p>

                        <ul class="mt-2 space-y-1 text-sm list-disc list-inside">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>

                    </div>

                </div>

            </div>

        @endif


        <!-- TITLE -->
        <div class="mb-8">

            <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-4">

                <div>

                    <span class="inline-flex items-center gap-2 rounded-full
                                 bg-green-100 dark:bg-green-950/40
                                 px-3 py-1
                                 text-xs font-semibold uppercase tracking-wider
                                 text-green-700 dark:text-green-400">

                        <span class="h-2 w-2 rounded-full bg-green-500"></span>

                        Utilisateurs
                    </span>

                    <h2 class="mt-3 text-2xl sm:text-3xl font-bold
                               text-slate-900 dark:text-white">

                        Comptes utilisateurs

                    </h2>

                    <p class="mt-2 text-slate-500 dark:text-slate-400">
                        Consultez, recherchez et gérez les comptes de la plateforme.
                    </p>

                </div>

                <div class="rounded-2xl border
                            border-slate-200 dark:border-slate-800
                            bg-white dark:bg-slate-900
                            px-5 py-3">

                    <p class="text-xs uppercase tracking-wide text-slate-500">
                        Total affiché
                    </p>

                    <p class="mt-1 text-2xl font-bold text-slate-900 dark:text-white">
                        {{ $users->total() }}
                    </p>

                </div>

            </div>

        </div>


        <!-- FILTERS -->
        <div class="rounded-3xl border
                    border-slate-200 dark:border-slate-800
                    bg-white dark:bg-slate-900
                    shadow-sm overflow-hidden mb-8">

            <div class="p-5 border-b border-slate-200 dark:border-slate-800">

                <div class="flex items-center gap-3">

                    <div class="flex h-10 w-10 items-center justify-center rounded-xl
                                bg-yellow-100 dark:bg-yellow-950/40
                                text-yellow-700 dark:text-yellow-400">

                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M3 4h18M6 8h12M10 12h4M11 16h2M12 20v-4"/>
                        </svg>

                    </div>

                    <div>
                        <h3 class="font-semibold text-slate-900 dark:text-white">
                            Recherche et filtrage
                        </h3>

                        <p class="text-sm text-slate-500 dark:text-slate-400">
                            Affinez la liste des utilisateurs.
                        </p>
                    </div>

                </div>

            </div>


            <form method="GET" action="{{ route('admin.users.list') }}" class="p-5">

                <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-4">

                    <!-- Search -->
                    <div class="xl:col-span-2">

                        <label class="block text-sm font-medium
                                      text-slate-700 dark:text-slate-300 mb-2">

                            Rechercher

                        </label>

                        <div class="relative">

                            <svg class="absolute left-3 top-1/2 -translate-y-1/2
                                        h-5 w-5 text-slate-400"
                                 fill="none"
                                 stroke="currentColor"
                                 viewBox="0 0 24 24">

                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M21 21l-4.35-4.35m2.35-5.65a7 7 0 11-14 0 7 7 0 0114 0z"/>

                            </svg>

                            <input
                                type="text"
                                name="search"
                                value="{{ request('search') }}"
                                placeholder="Nom, prénom, email, téléphone..."
                                class="w-full rounded-xl border
                                       border-slate-200 dark:border-slate-700
                                       bg-slate-50 dark:bg-slate-800
                                       pl-10 pr-4 py-3
                                       text-slate-900 dark:text-white
                                       placeholder-slate-400
                                       focus:border-green-500 focus:ring-2 focus:ring-green-500/20
                                       outline-none transition"
                            >

                        </div>

                    </div>


                    <!-- Role -->
                    <div>

                        <label class="block text-sm font-medium
                                      text-slate-700 dark:text-slate-300 mb-2">

                            Rôle

                        </label>

                        <select
                            name="role"
                            class="w-full rounded-xl border
                                   border-slate-200 dark:border-slate-700
                                   bg-slate-50 dark:bg-slate-800
                                   px-4 py-3
                                   text-slate-900 dark:text-white
                                   focus:border-green-500 focus:ring-2 focus:ring-green-500/20
                                   outline-none transition"
                        >

                            <option value="">Tous les rôles</option>

                            <option value="externe" @selected(request('role') === 'externe')}>
                                Externe
                            </option>

                            <option value="personnel" @selected(request('role') === 'personnel')}>
                                Personnel
                            </option>

                            <option value="chef_service" @selected(request('role') === 'chef_service')}>
                                Chef de service
                            </option>

                            <option value="secretaire" @selected(request('role') === 'secretaire')}>
                                Secrétaire
                            </option>

                            <option value="directeur" @selected(request('role') === 'directeur')}>
                                Directeur
                            </option>

                            <option value="administrateur" @selected(request('role') === 'administrateur')}>
                                Administrateur
                            </option>

                        </select>

                    </div>


                    <!-- Status -->
                    <div>

                        <label class="block text-sm font-medium
                                      text-slate-700 dark:text-slate-300 mb-2">

                            Statut

                        </label>

                        <select
                            name="statut"
                            class="w-full rounded-xl border
                                   border-slate-200 dark:border-slate-700
                                   bg-slate-50 dark:bg-slate-800
                                   px-4 py-3
                                   text-slate-900 dark:text-white
                                   focus:border-green-500 focus:ring-2 focus:ring-green-500/20
                                   outline-none transition"
                        >

                            <option value="">Tous les statuts</option>

                            <option value="actif" @selected(request('statut') === 'actif')}>
                                Actifs
                            </option>

                            <option value="bloque" @selected(request('statut') === 'bloque')}>
                                Bloqués
                            </option>

                        </select>

                    </div>


                    <!-- Service -->
                    <div>

                        <label class="block text-sm font-medium
                                      text-slate-700 dark:text-slate-300 mb-2">

                            Service

                        </label>

                        <select
                            name="service_id"
                            class="w-full rounded-xl border
                                   border-slate-200 dark:border-slate-700
                                   bg-slate-50 dark:bg-slate-800
                                   px-4 py-3
                                   text-slate-900 dark:text-white
                                   focus:border-green-500 focus:ring-2 focus:ring-green-500/20
                                   outline-none transition"
                        >

                            <option value="">Tous les services</option>

                            @foreach($services as $service)

                                <option
                                    value="{{ $service->id }}"
                                    @selected((string) request('service_id') === (string) $service->id)
                                >
                                    {{ $service->nom }}
                                </option>

                            @endforeach

                        </select>

                    </div>

                </div>


                <!-- Buttons -->
                <div class="mt-5 flex flex-wrap gap-3">

                    <button
                        type="submit"
                        class="inline-flex items-center gap-2 rounded-xl
                               bg-green-600 px-5 py-2.5
                               text-sm font-semibold text-white
                               hover:bg-green-700 transition"
                    >

                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M21 21l-4.35-4.35m2.35-5.65a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>

                        Appliquer les filtres

                    </button>


                    <a
                        href="{{ route('admin.users.list') }}"
                        class="inline-flex items-center gap-2 rounded-xl
                               border border-slate-200 dark:border-slate-700
                               bg-white dark:bg-slate-800
                               px-5 py-2.5
                               text-sm font-semibold
                               text-slate-700 dark:text-slate-300
                               hover:bg-slate-50 dark:hover:bg-slate-700
                               transition"
                    >

                        Réinitialiser

                    </a>

                </div>

            </form>

        </div>


        <!-- USERS TABLE -->
        <div class="rounded-3xl border
                    border-slate-200 dark:border-slate-800
                    bg-white dark:bg-slate-900
                    shadow-sm overflow-hidden">

            <div class="px-5 py-5 border-b
                        border-slate-200 dark:border-slate-800">

                <div class="flex items-center justify-between">

                    <div>

                        <h3 class="font-semibold text-slate-900 dark:text-white">
                            Liste des utilisateurs
                        </h3>

                        <p class="text-sm text-slate-500 dark:text-slate-400 mt-1">
                            {{ $users->count() }} utilisateur(s) affiché(s)
                        </p>

                    </div>

                </div>

            </div>


            <!-- Desktop table -->
            <div class="hidden lg:block overflow-x-auto">

                <table class="w-full">

                    <thead class="bg-slate-50 dark:bg-slate-800/50">

                        <tr>

                            <th class="px-6 py-4 text-left text-xs font-semibold
                                       uppercase tracking-wider text-slate-500">
                                Utilisateur
                            </th>

                            <th class="px-6 py-4 text-left text-xs font-semibold
                                       uppercase tracking-wider text-slate-500">
                                Rôle
                            </th>

                            <th class="px-6 py-4 text-left text-xs font-semibold
                                       uppercase tracking-wider text-slate-500">
                                Service
                            </th>

                            <th class="px-6 py-4 text-left text-xs font-semibold
                                       uppercase tracking-wider text-slate-500">
                                Statut
                            </th>

                            <th class="px-6 py-4 text-right text-xs font-semibold
                                       uppercase tracking-wider text-slate-500">
                                Actions
                            </th>

                        </tr>

                    </thead>


                    <tbody class="divide-y divide-slate-200 dark:divide-slate-800">

                        @forelse($users as $user)

                            <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/40 transition">

                                <!-- User -->
                                <td class="px-6 py-5">

                                    <div class="flex items-center gap-3">

                                        <div class="h-11 w-11 rounded-full
                                                    bg-green-100 dark:bg-green-950/40
                                                    flex items-center justify-center
                                                    text-green-700 dark:text-green-400
                                                    font-bold">

                                            {{ strtoupper(substr($user->prenom, 0, 1)) }}{{ strtoupper(substr($user->nom, 0, 1)) }}

                                        </div>

                                        <div>

                                            <p class="font-semibold text-slate-900 dark:text-white">

                                                {{ $user->prenom }} {{ $user->nom }}

                                            </p>

                                            <p class="text-sm text-slate-500 dark:text-slate-400">

                                                {{ $user->email }}

                                            </p>

                                        </div>

                                    </div>

                                </td>


                                <!-- Role -->
                                <td class="px-6 py-5">

                                    @php
                                        $roleLabels = [
                                            'externe' => 'Externe',
                                            'personnel' => 'Personnel',
                                            'chef_service' => 'Chef de service',
                                            'secretaire' => 'Secrétaire',
                                            'directeur' => 'Directeur',
                                            'administrateur' => 'Administrateur',
                                        ];
                                    @endphp

                                    <span class="inline-flex rounded-full
                                                 bg-slate-100 dark:bg-slate-800
                                                 px-3 py-1
                                                 text-xs font-semibold
                                                 text-slate-700 dark:text-slate-300">

                                        {{ $roleLabels[$user->role] ?? $user->role }}

                                    </span>

                                </td>


                                <!-- Service -->
                                <td class="px-6 py-5 text-sm">

                                    @if($user->service)

                                        <span class="text-slate-700 dark:text-slate-300">
                                            {{ $user->service->nom }}
                                        </span>

                                    @else

                                        <span class="text-slate-400">
                                            —
                                        </span>

                                    @endif

                                </td>


                                <!-- Status -->
                                <td class="px-6 py-5">

                                    @if($user->actif)

                                        <span class="inline-flex items-center gap-2 rounded-full
                                                     bg-green-100 dark:bg-green-950/40
                                                     px-3 py-1
                                                     text-xs font-semibold
                                                     text-green-700 dark:text-green-400">

                                            <span class="h-2 w-2 rounded-full bg-green-500"></span>

                                            Actif

                                        </span>

                                    @else

                                        <span class="inline-flex items-center gap-2 rounded-full
                                                     bg-red-100 dark:bg-red-950/40
                                                     px-3 py-1
                                                     text-xs font-semibold
                                                     text-red-700 dark:text-red-400">

                                            <span class="h-2 w-2 rounded-full bg-red-500"></span>

                                            Bloqué

                                        </span>

                                    @endif

                                </td>


                                <!-- Actions -->
                                <td class="px-6 py-5">

                                    <div class="flex justify-end items-center gap-2">

                                        <!-- Edit -->
                                        <a
                                            href="{{ route('admin.users.edit', $user) }}"
                                            title="Modifier"
                                            class="h-9 w-9 rounded-lg
                                                   flex items-center justify-center
                                                   text-blue-600 dark:text-blue-400
                                                   hover:bg-blue-50 dark:hover:bg-blue-950/30
                                                   transition"
                                        >

                                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                      d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z"/>
                                            </svg>

                                        </a>


                                        @if($user->actif)

                                            <!-- Block -->
                                            <form
                                                action="{{ route('admin.users.block', $user) }}"
                                                method="POST"
                                            >
                                                @csrf
                                                @method('PATCH')

                                                <button
                                                    type="submit"
                                                    title="Bloquer"
                                                    onclick="return confirm('Voulez-vous vraiment bloquer cet utilisateur ?')"
                                                    class="h-9 w-9 rounded-lg
                                                           flex items-center justify-center
                                                           text-yellow-600 dark:text-yellow-400
                                                           hover:bg-yellow-50 dark:hover:bg-yellow-950/30
                                                           transition"
                                                >

                                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                              d="M18.364 18.364A9 9 0 105.636 5.636a9 9 0 0012.728 12.728zM8 8l8 8"/>
                                                    </svg>

                                                </button>

                                            </form>

                                        @else

                                            <!-- Unblock -->
                                            <form
                                                action="{{ route('admin.users.unblock', $user) }}"
                                                method="POST"
                                            >
                                                @csrf
                                                @method('PATCH')

                                                <button
                                                    type="submit"
                                                    title="Débloquer"
                                                    class="h-9 w-9 rounded-lg
                                                           flex items-center justify-center
                                                           text-green-600 dark:text-green-400
                                                           hover:bg-green-50 dark:hover:bg-green-950/30
                                                           transition"
                                                >

                                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                              d="M8 11V7a4 4 0 118 0v4m-9 0h10a2 2 0 012 2v7a2 2 0 01-2 2H7a2 2 0 01-2-2v-7a2 2 0 012-2z"/>
                                                    </svg>

                                                </button>

                                            </form>

                                        @endif


                                        <!-- Delete -->
                                        <form
                                            action="{{ route('admin.users.destroy', $user) }}"
                                            method="POST"
                                        >
                                            @csrf
                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                title="Supprimer"
                                                onclick="return confirm('Cette action est irréversible. Voulez-vous vraiment supprimer cet utilisateur ?')"
                                                class="h-9 w-9 rounded-lg
                                                       flex items-center justify-center
                                                       text-red-600 dark:text-red-400
                                                       hover:bg-red-50 dark:hover:bg-red-950/30
                                                       transition"
                                            >

                                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                          d="M6 7h12M9 7V4h6v3m-7 0l1 13h6l1-13M10 11v5m4-5v5"/>
                                                </svg>

                                            </button>

                                        </form>

                                    </div>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="5" class="px-6 py-16 text-center">

                                    <div class="mx-auto h-16 w-16 rounded-2xl
                                                bg-slate-100 dark:bg-slate-800
                                                flex items-center justify-center">

                                        <svg class="h-8 w-8 text-slate-400"
                                             fill="none"
                                             stroke="currentColor"
                                             viewBox="0 0 24 24">

                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>

                                        </svg>

                                    </div>

                                    <h3 class="mt-4 font-semibold text-slate-900 dark:text-white">
                                        Aucun utilisateur trouvé
                                    </h3>

                                    <p class="mt-1 text-sm text-slate-500 dark:text-slate-400">
                                        Essayez de modifier vos critères de recherche.
                                    </p>

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>


            <!-- Mobile cards -->
            <div class="lg:hidden divide-y divide-slate-200 dark:divide-slate-800">

                @forelse($users as $user)

                    <div class="p-5">

                        <div class="flex items-start justify-between gap-4">

                            <div class="flex items-center gap-3 min-w-0">

                                <div class="h-11 w-11 shrink-0 rounded-full
                                            bg-green-100 dark:bg-green-950/40
                                            flex items-center justify-center
                                            text-green-700 dark:text-green-400
                                            font-bold">

                                    {{ strtoupper(substr($user->prenom, 0, 1)) }}{{ strtoupper(substr($user->nom, 0, 1)) }}

                                </div>

                                <div class="min-w-0">

                                    <p class="font-semibold truncate text-slate-900 dark:text-white">
                                        {{ $user->prenom }} {{ $user->nom }}
                                    </p>

                                    <p class="text-sm truncate text-slate-500 dark:text-slate-400">
                                        {{ $user->email }}
                                    </p>

                                </div>

                            </div>


                            @if($user->actif)

                                <span class="shrink-0 inline-flex items-center gap-1.5 rounded-full
                                             bg-green-100 dark:bg-green-950/40
                                             px-2.5 py-1
                                             text-xs font-semibold text-green-700 dark:text-green-400">

                                    <span class="h-1.5 w-1.5 rounded-full bg-green-500"></span>
                                    Actif

                                </span>

                            @else

                                <span class="shrink-0 inline-flex items-center gap-1.5 rounded-full
                                             bg-red-100 dark:bg-red-950/40
                                             px-2.5 py-1
                                             text-xs font-semibold text-red-700 dark:text-red-400">

                                    <span class="h-1.5 w-1.5 rounded-full bg-red-500"></span>
                                    Bloqué

                                </span>

                            @endif

                        </div>


                        <div class="mt-4 grid grid-cols-2 gap-3 text-sm">

                            <div>
                                <p class="text-xs text-slate-400">
                                    Rôle
                                </p>

                                <p class="mt-1 font-medium text-slate-700 dark:text-slate-300">
                                    {{ $roleLabels[$user->role] ?? $user->role }}
                                </p>
                            </div>

                            <div>
                                <p class="text-xs text-slate-400">
                                    Service
                                </p>

                                <p class="mt-1 font-medium text-slate-700 dark:text-slate-300">
                                    {{ $user->service?->nom ?? '—' }}
                                </p>
                            </div>

                        </div>


                        <div class="mt-5 flex flex-wrap gap-2">

                            <a
                                href="{{ route('admin.users.edit', $user) }}"
                                class="flex-1 min-w-[100px] text-center rounded-xl
                                       border border-slate-200 dark:border-slate-700
                                       px-3 py-2
                                       text-sm font-medium
                                       text-slate-700 dark:text-slate-300
                                       hover:bg-slate-50 dark:hover:bg-slate-800"
                            >
                                Modifier
                            </a>


                            @if($user->actif)

                                <form
                                    action="{{ route('admin.users.block', $user) }}"
                                    method="POST"
                                    class="flex-1 min-w-[100px]"
                                >
                                    @csrf
                                    @method('PATCH')

                                    <button
                                        type="submit"
                                        onclick="return confirm('Voulez-vous vraiment bloquer cet utilisateur ?')"
                                        class="w-full rounded-xl
                                               bg-yellow-50 dark:bg-yellow-950/30
                                               px-3 py-2
                                               text-sm font-medium
                                               text-yellow-700 dark:text-yellow-400"
                                    >
                                        Bloquer
                                    </button>

                                </form>

                            @else

                                <form
                                    action="{{ route('admin.users.unblock', $user) }}"
                                    method="POST"
                                    class="flex-1 min-w-[100px]"
                                >
                                    @csrf
                                    @method('PATCH')

                                    <button
                                        type="submit"
                                        class="w-full rounded-xl
                                               bg-green-50 dark:bg-green-950/30
                                               px-3 py-2
                                               text-sm font-medium
                                               text-green-700 dark:text-green-400"
                                    >
                                        Débloquer
                                    </button>

                                </form>

                            @endif


                            <form
                                action="{{ route('admin.users.destroy', $user) }}"
                                method="POST"
                                class="w-full"
                            >
                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    onclick="return confirm('Cette action est irréversible. Voulez-vous vraiment supprimer cet utilisateur ?')"
                                    class="w-full rounded-xl
                                           bg-red-50 dark:bg-red-950/30
                                           px-3 py-2
                                           text-sm font-medium
                                           text-red-700 dark:text-red-400"
                                >
                                    Supprimer
                                </button>

                            </form>

                        </div>

                    </div>

                @empty

                    <div class="p-12 text-center text-slate-500">
                        Aucun utilisateur trouvé.
                    </div>

                @endforelse

            </div>


            <!-- Pagination -->
            @if($users->hasPages())

                <div class="border-t border-slate-200 dark:border-slate-800 px-5 py-5">

                    {{ $users->links() }}

                </div>

            @endif

        </div>

    </main>

</div>


<!-- THEME -->
<script>
document.addEventListener('DOMContentLoaded', function () {

    const themeToggle = document.getElementById('admin-theme-toggle');

    if (!themeToggle) {
        return;
    }

    themeToggle.addEventListener('click', function () {

        document.documentElement.classList.toggle('dark');

        localStorage.setItem(
            'theme',
            document.documentElement.classList.contains('dark')
                ? 'dark'
                : 'light'
        );

    });

});
</script>

@endsection