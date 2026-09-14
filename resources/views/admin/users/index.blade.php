@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-slate-50 dark:bg-slate-950 transition-colors duration-300">

    {{-- Header --}}
    <header class="border-b border-slate-200 dark:border-slate-800 bg-white/90 dark:bg-slate-900/90 backdrop-blur">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-5">

            <div class="flex items-center justify-between gap-4">

                <div>
                    <div class="flex items-center gap-3 mb-2">

                        <a href="{{ route('admin.dashboard') }}"
                           class="text-slate-500 hover:text-green-600 dark:text-slate-400 dark:hover:text-green-400 transition">

                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M15 19l-7-7 7-7"/>
                            </svg>

                        </a>

                        <span class="text-sm font-semibold text-green-600 dark:text-green-400">
                            ADMINISTRATION
                        </span>

                    </div>

                    <h1 class="text-2xl sm:text-3xl font-bold text-slate-900 dark:text-white">
                        Gestion des utilisateurs
                    </h1>

                    <p class="mt-1 text-sm text-slate-500 dark:text-slate-400">
                        Gérez les comptes du personnel de la plateforme CENADI.
                    </p>
                </div>

                {{-- Theme --}}
                <button
                    id="admin-theme-toggle"
                    type="button"
                    class="p-3 rounded-xl border border-slate-200 dark:border-slate-700
                           bg-white dark:bg-slate-800
                           text-slate-600 dark:text-slate-300
                           hover:border-green-500 hover:text-green-600
                           transition">

                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364-6.364l-.707.707M6.343 17.657l-.707.707m12.728 0l-.707-.707M6.343 6.343l-.707-.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/>
                    </svg>

                </button>

            </div>

        </div>
    </header>


    {{-- Contenu --}}
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">

        {{-- Introduction --}}
        <div class="mb-8">

            <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full
                        bg-green-100 dark:bg-green-900/30
                        text-green-700 dark:text-green-400
                        text-xs font-bold uppercase tracking-wider">

                <span class="w-2 h-2 rounded-full bg-green-500"></span>

                Administration CENADI

            </div>

            <h2 class="mt-4 text-xl font-semibold text-slate-900 dark:text-white">
                Que souhaitez-vous faire ?
            </h2>

            <p class="mt-1 text-slate-500 dark:text-slate-400">
                Sélectionnez une opération pour gérer les comptes utilisateurs.
            </p>

        </div>


        {{-- Cartes --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">


            {{-- Créer --}}
            <a href="{{ route('admin.users.create') }}"
               class="group p-6 rounded-2xl
                      bg-white dark:bg-slate-900
                      border border-slate-200 dark:border-slate-800
                      hover:border-green-500 dark:hover:border-green-500
                      hover:-translate-y-1
                      shadow-sm hover:shadow-xl
                      transition-all duration-300">

                <div class="flex items-start justify-between">

                    <div class="w-12 h-12 rounded-xl
                                bg-green-100 dark:bg-green-900/30
                                text-green-600 dark:text-green-400
                                flex items-center justify-center">

                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M12 4v16m8-8H4"/>
                        </svg>

                    </div>

                    <svg class="w-5 h-5 text-slate-300 group-hover:text-green-500
                                group-hover:translate-x-1 transition"
                         fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M9 5l7 7-7 7"/>
                    </svg>

                </div>

                <h3 class="mt-5 text-lg font-bold text-slate-900 dark:text-white">
                    Créer un utilisateur
                </h3>

                <p class="mt-2 text-sm text-slate-500 dark:text-slate-400">
                    Créer un compte pour un membre du personnel ou un administrateur.
                </p>

            </a>


            {{-- Consulter --}}
            <a href="{{ route('admin.users.list') }}"
               class="group p-6 rounded-2xl
                      bg-white dark:bg-slate-900
                      border border-slate-200 dark:border-slate-800
                      hover:border-blue-500
                      hover:-translate-y-1
                      shadow-sm hover:shadow-xl
                      transition-all duration-300">

                <div class="w-12 h-12 rounded-xl
                            bg-blue-100 dark:bg-blue-900/30
                            text-blue-600 dark:text-blue-400
                            flex items-center justify-center">

                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                    </svg>

                </div>

                <h3 class="mt-5 text-lg font-bold text-slate-900 dark:text-white">
                    Consulter les utilisateurs
                </h3>

                <p class="mt-2 text-sm text-slate-500 dark:text-slate-400">
                    Consulter les comptes, leurs rôles, leurs services et leurs statuts.
                </p>

            </a>


            {{-- Modifier --}}
            <a href="{{ route('admin.users.list') }}"
               class="group p-6 rounded-2xl
                      bg-white dark:bg-slate-900
                      border border-slate-200 dark:border-slate-800
                      hover:border-yellow-500
                      hover:-translate-y-1
                      shadow-sm hover:shadow-xl
                      transition-all duration-300">

                <div class="w-12 h-12 rounded-xl
                            bg-yellow-100 dark:bg-yellow-900/30
                            text-yellow-600 dark:text-yellow-400
                            flex items-center justify-center">

                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5"/>
                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z"/>
                    </svg>

                </div>

                <h3 class="mt-5 text-lg font-bold text-slate-900 dark:text-white">
                    Modifier un utilisateur
                </h3>

                <p class="mt-2 text-sm text-slate-500 dark:text-slate-400">
                    Modifier les informations, le rôle ou le service d'un compte.
                </p>

            </a>


            {{-- Bloquer --}}
            <a href="{{ route('admin.users.list') }}"
               class="group p-6 rounded-2xl
                      bg-white dark:bg-slate-900
                      border border-slate-200 dark:border-slate-800
                      hover:border-orange-500
                      hover:-translate-y-1
                      shadow-sm hover:shadow-xl
                      transition-all duration-300">

                <div class="w-12 h-12 rounded-xl
                            bg-orange-100 dark:bg-orange-900/30
                            text-orange-600 dark:text-orange-400
                            flex items-center justify-center">

                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M18 8A6 6 0 006 8c0 7-3 7-3 9h18c0-2-3-2-3-9z"/>
                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M13.73 21a2 2 0 01-3.46 0"/>
                    </svg>

                </div>

                <h3 class="mt-5 text-lg font-bold text-slate-900 dark:text-white">
                    Bloquer un utilisateur
                </h3>

                <p class="mt-2 text-sm text-slate-500 dark:text-slate-400">
                    Empêcher temporairement un compte d'accéder à la plateforme.
                </p>

            </a>


            {{-- Débloquer --}}
            <a href="{{ route('admin.users.list') }}"
               class="group p-6 rounded-2xl
                      bg-white dark:bg-slate-900
                      border border-slate-200 dark:border-slate-800
                      hover:border-green-500
                      hover:-translate-y-1
                      shadow-sm hover:shadow-xl
                      transition-all duration-300">

                <div class="w-12 h-12 rounded-xl
                            bg-green-100 dark:bg-green-900/30
                            text-green-600 dark:text-green-400
                            flex items-center justify-center">

                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 10-8 0v2h8z"/>
                    </svg>

                </div>

                <h3 class="mt-5 text-lg font-bold text-slate-900 dark:text-white">
                    Débloquer un utilisateur
                </h3>

                <p class="mt-2 text-sm text-slate-500 dark:text-slate-400">
                    Réactiver l'accès d'un compte précédemment bloqué.
                </p>

            </a>


            {{-- Supprimer --}}
            <a href="{{ route('admin.users.list') }}"
               class="group p-6 rounded-2xl
                      bg-white dark:bg-slate-900
                      border border-slate-200 dark:border-slate-800
                      hover:border-red-500
                      hover:-translate-y-1
                      shadow-sm hover:shadow-xl
                      transition-all duration-300">

                <div class="w-12 h-12 rounded-xl
                            bg-red-100 dark:bg-red-900/30
                            text-red-600 dark:text-red-400
                            flex items-center justify-center">

                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M9 7V4a1 1 0 011-1h4a1 1 0 011 1v3m-9 0h14"/>
                    </svg>

                </div>

                <h3 class="mt-5 text-lg font-bold text-slate-900 dark:text-white">
                    Supprimer un utilisateur
                </h3>

                <p class="mt-2 text-sm text-slate-500 dark:text-slate-400">
                    Supprimer définitivement un compte de la plateforme.
                </p>

            </a>

        </div>

    </main>

</div>

@endsection