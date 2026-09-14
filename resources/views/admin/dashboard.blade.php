@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-slate-50 text-slate-900 transition-colors duration-300 dark:bg-slate-950 dark:text-slate-100">

    {{-- SIDEBAR --}}
    <aside id="admin-sidebar"
        class="fixed inset-y-0 left-0 z-50 flex w-72 -translate-x-full flex-col border-r border-slate-200 bg-white transition-transform duration-300 dark:border-slate-800 dark:bg-slate-900 lg:translate-x-0">

        {{-- Logo --}}
        <div class="flex h-20 items-center gap-3 border-b border-slate-200 px-6 dark:border-slate-800">

            <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-green-600 shadow-lg shadow-green-600/20">
                <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 8l9 5 9-5M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                </svg>
            </div>

            <div>
                <h1 class="font-bold tracking-tight">CENADI</h1>
                <p class="text-xs text-slate-500 dark:text-slate-400">
                    Gestion du courrier
                </p>
            </div>

        </div>

        {{-- Navigation --}}
        <nav class="flex-1 overflow-y-auto px-4 py-6">

            <p class="mb-3 px-3 text-xs font-semibold uppercase tracking-wider text-slate-400">
                Principal
            </p>

            <a href="#"
               class="mb-1 flex items-center gap-3 rounded-xl bg-green-50 px-3 py-3 text-sm font-semibold text-green-700 dark:bg-green-500/10 dark:text-green-400">

                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-width="2"
                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0h6"/>
                </svg>

                Tableau de bord
            </a>

            <p class="mb-3 mt-7 px-3 text-xs font-semibold uppercase tracking-wider text-slate-400">
                Courriers
            </p>

            <a href="#"
               class="mb-1 flex items-center gap-3 rounded-xl px-3 py-3 text-sm text-slate-600 transition hover:bg-slate-100 dark:text-slate-300 dark:hover:bg-slate-800">

                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 4v16m8-8H4"/>
                </svg>

                Déposer un courrier
            </a>

            <a href="#"
               class="mb-1 flex items-center gap-3 rounded-xl px-3 py-3 text-sm text-slate-600 transition hover:bg-slate-100 dark:text-slate-300 dark:hover:bg-slate-800">

                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h6l5 5v11a2 2 0 01-2 2z"/>
                </svg>

                Déposer une réponse
            </a>

            <a href="#"
               class="mb-1 flex items-center gap-3 rounded-xl px-3 py-3 text-sm text-slate-600 transition hover:bg-slate-100 dark:text-slate-300 dark:hover:bg-slate-800">

                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>

                Consulter les courriers
            </a>

            <a href="#"
               class="mb-1 flex items-center gap-3 rounded-xl px-3 py-3 text-sm text-slate-600 transition hover:bg-slate-100 dark:text-slate-300 dark:hover:bg-slate-800">

                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 7V3m8 4V3M5 11h14M5 19h14M5 7h14a2 2 0 012 2v10a2 2 0 01-2 2H5a2 2 0 01-2-2V9a2 2 0 012-2z"/>
                </svg>

                Réponses
            </a>

            <p class="mb-3 mt-7 px-3 text-xs font-semibold uppercase tracking-wider text-slate-400">
                Administration
            </p>

            <a href="{{ route('admin.users.index') }}"
               class="mb-1 flex items-center gap-3 rounded-xl px-3 py-3 text-sm text-slate-600 transition hover:bg-slate-100 dark:text-slate-300 dark:hover:bg-slate-800">

                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 20h5V4H2v16h5m10 0v-5H7v5m10 0H7"/>
                </svg>

                Gérer les utilisateurs
            </a>

            <a href="#"
               class="mb-1 flex items-center gap-3 rounded-xl px-3 py-3 text-sm text-slate-600 transition hover:bg-slate-100 dark:text-slate-300 dark:hover:bg-slate-800">

                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 15a3 3 0 100-6 3 3 0 000 6z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19.4 15a1.7 1.7 0 00.34 1.88l.06.06-1.5 1.5-.06-.06a1.7 1.7 0 00-1.88-.34 1.7 1.7 0 00-1.04 1.56V20h-2.12v-.4a1.7 1.7 0 00-1.04-1.56 1.7 1.7 0 00-1.88.34l-.06.06-1.5-1.5.06-.06A1.7 1.7 0 009.1 15a1.7 1.7 0 00-1.56-1.04H7.1v-2.12h.44A1.7 1.7 0 009.1 10.8a1.7 1.7 0 00-.34-1.88L8.7 8.86l1.5-1.5.06.06a1.7 1.7 0 001.88.34A1.7 1.7 0 0013.18 6.2V6h2.12v.2a1.7 1.7 0 001.04 1.56 1.7 1.7 0 001.88-.34l.06-.06 1.5 1.5-.06.06a1.7 1.7 0 00-.34 1.88 1.7 1.7 0 001.56 1.04h.4v2.12h-.4A1.7 1.7 0 0019.4 15z"/>
                </svg>

                Gérer les rôles
            </a>

            <a href="{{ route('admin.services.index') }}"
               class="mb-1 flex items-center gap-3 rounded-xl px-3 py-3 text-sm text-slate-600 transition hover:bg-slate-100 dark:text-slate-300 dark:hover:bg-slate-800">

                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 21h18M5 21V9l7-5 7 5v12M9 21v-6h6v6"/>
                </svg>

                Gérer les services
            </a>

            <a href="#"
               class="mb-1 flex items-center gap-3 rounded-xl px-3 py-3 text-sm text-slate-600 transition hover:bg-slate-100 dark:text-slate-300 dark:hover:bg-slate-800">

                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10.5 6h3M6 10.5h12M7 18h10M5 3h14a2 2 0 012 2v14a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2z"/>
                </svg>

                Paramètres
            </a>

        </nav>

        {{-- Logout --}}
        <div class="border-t border-slate-200 p-4 dark:border-slate-800">

            <form action="{{ route('logout') }}" method="POST">
                @csrf

                <button type="submit"
                    class="flex w-full items-center gap-3 rounded-xl px-3 py-3 text-sm font-medium text-red-600 transition hover:bg-red-50 dark:text-red-400 dark:hover:bg-red-500/10">

                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 3h4a2 2 0 012 2v14a2 2 0 01-2 2h-4M10 17l5-5m0 0l-5-5m5 5H3"/>
                    </svg>

                    Se déconnecter
                </button>
            </form>

        </div>

    </aside>


    {{-- CONTENU PRINCIPAL --}}
    <div class="lg:pl-72">

        {{-- HEADER --}}
        <header class="sticky top-0 z-40 border-b border-slate-200 bg-white/90 backdrop-blur-xl dark:border-slate-800 dark:bg-slate-900/90">

            <div class="flex h-20 items-center justify-between px-4 sm:px-6 lg:px-8">

                <div class="flex items-center gap-4">

                    {{-- Mobile menu --}}
                    <button id="admin-menu-button"
                        class="rounded-xl p-2 text-slate-600 hover:bg-slate-100 dark:text-slate-300 dark:hover:bg-slate-800 lg:hidden">

                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                    </button>

                    <div>
                        <p class="text-sm text-slate-500 dark:text-slate-400">
                            Administration
                        </p>

                        <h2 class="text-xl font-bold tracking-tight">
                            Tableau de bord
                        </h2>
                    </div>

                </div>

                <div class="flex items-center gap-3">

                    {{-- Recherche --}}
                    <div class="hidden md:block">
                        <div class="relative">

                            <svg class="absolute left-3 top-1/2 h-4 w-4 -translate-y-1/2 text-slate-400"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-4.35-4.35m2.35-5.65a8 8 0 11-16 0 8 8 0 0116 0z"/>
                            </svg>

                            <input type="search"
                                placeholder="Rechercher..."
                                class="w-56 rounded-xl border border-slate-200 bg-slate-50 py-2.5 pl-10 pr-4 text-sm outline-none transition focus:border-green-500 focus:ring-4 focus:ring-green-500/10 dark:border-slate-700 dark:bg-slate-800">
                        </div>
                    </div>

                    {{-- Theme --}}
                    <button id="admin-theme-toggle"
                        class="rounded-xl border border-slate-200 p-2.5 text-slate-600 transition hover:bg-slate-100 dark:border-slate-700 dark:text-slate-300 dark:hover:bg-slate-800">

                        <svg class="hidden h-5 w-5 dark:block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 12.8A8.5 8.5 0 1111.2 3 6.7 6.7 0 0021 12.8z"/>
                        </svg>

                        <svg class="h-5 w-5 dark:hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <circle cx="12" cy="12" r="4" stroke-width="2"/>
                            <path stroke-linecap="round" stroke-width="2"
                                d="M12 2v2m0 16v2M4.93 4.93l1.41 1.41m11.32 11.32l1.41 1.41M2 12h2m16 0h2M4.93 19.07l1.41-1.41m11.32-11.32l1.41-1.41"/>
                        </svg>
                    </button>

                    {{-- Notification --}}
                    <button
                        class="relative rounded-xl border border-slate-200 p-2.5 text-slate-600 transition hover:bg-slate-100 dark:border-slate-700 dark:text-slate-300 dark:hover:bg-slate-800">

                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 17h5l-1.4-1.4A2 2 0 0118 14.2V11a6 6 0 00-12 0v3.2a2 2 0 01-.6 1.4L4 17h5m6 0a3 3 0 01-6 0"/>
                        </svg>

                        <span class="absolute right-2 top-2 h-2 w-2 rounded-full bg-yellow-500"></span>
                    </button>

                    {{-- Profile --}}
                    <div class="hidden items-center gap-3 border-l border-slate-200 pl-4 sm:flex dark:border-slate-700">

                        <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-green-100 font-bold text-green-700 dark:bg-green-500/10 dark:text-green-400">
                            A
                        </div>

                        <div class="hidden xl:block">
                            <p class="text-sm font-semibold">
                                Administrateur
                            </p>

                            <p class="text-xs text-slate-500 dark:text-slate-400">
                                CENADI
                            </p>
                        </div>

                    </div>

                </div>

            </div>

        </header>


        {{-- MAIN --}}
        <main class="p-4 sm:p-6 lg:p-8">

            {{-- Welcome --}}
            <section class="mb-8">

                <div class="relative overflow-hidden rounded-3xl bg-gradient-to-br from-green-700 via-green-600 to-green-500 p-6 text-white shadow-xl shadow-green-900/10 sm:p-8">

                    <div class="relative z-10 max-w-2xl">

                        <div class="mb-3 inline-flex items-center rounded-full bg-white/15 px-3 py-1 text-xs font-semibold backdrop-blur">
                            ADMINISTRATION CENADI
                        </div>

                        <h1 class="text-2xl font-bold sm:text-3xl">
                            Bonjour, Administrateur.
                        </h1>

                        <p class="mt-2 max-w-xl text-sm leading-6 text-green-50 sm:text-base">
                            Gérez efficacement les courriers, les utilisateurs,
                            les rôles et les services du CENADI depuis votre espace
                            d'administration.
                        </p>

                    </div>

                    <div class="absolute -right-10 -top-10 h-48 w-48 rounded-full bg-yellow-400/20 blur-2xl"></div>
                    <div class="absolute -bottom-20 right-20 h-48 w-48 rounded-full bg-white/10 blur-3xl"></div>

                </div>

            </section>


            {{-- STATISTIQUES --}}
            <section class="mb-8">

                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 xl:grid-cols-4">

                    {{-- Courriers --}}
                    <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm dark:border-slate-800 dark:bg-slate-900">

                        <div class="flex items-start justify-between">

                            <div>
                                <p class="text-sm text-slate-500 dark:text-slate-400">
                                    Total courriers
                                </p>

                                <p class="mt-2 text-3xl font-bold">
                                    1 284
                                </p>

                                <p class="mt-2 text-xs font-medium text-green-600 dark:text-green-400">
                                    +12,5% ce mois
                                </p>
                            </div>

                            <div class="rounded-xl bg-green-100 p-3 text-green-600 dark:bg-green-500/10 dark:text-green-400">
                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 8l9 5 9-5M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                            </div>

                        </div>

                    </div>


                    {{-- Attente --}}
                    <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm dark:border-slate-800 dark:bg-slate-900">

                        <div class="flex items-start justify-between">

                            <div>
                                <p class="text-sm text-slate-500 dark:text-slate-400">
                                    En attente
                                </p>

                                <p class="mt-2 text-3xl font-bold">
                                    38
                                </p>

                                <p class="mt-2 text-xs font-medium text-yellow-600 dark:text-yellow-400">
                                    À surveiller
                                </p>
                            </div>

                            <div class="rounded-xl bg-yellow-100 p-3 text-yellow-600 dark:bg-yellow-500/10 dark:text-yellow-400">
                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4l3 2m6-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>

                        </div>

                    </div>


                    {{-- Traités --}}
                    <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm dark:border-slate-800 dark:bg-slate-900">

                        <div class="flex items-start justify-between">

                            <div>
                                <p class="text-sm text-slate-500 dark:text-slate-400">
                                    Courriers traités
                                </p>

                                <p class="mt-2 text-3xl font-bold">
                                    964
                                </p>

                                <p class="mt-2 text-xs font-medium text-green-600 dark:text-green-400">
                                    75% du total
                                </p>
                            </div>

                            <div class="rounded-xl bg-green-100 p-3 text-green-600 dark:bg-green-500/10 dark:text-green-400">
                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"/>
                                </svg>
                            </div>

                        </div>

                    </div>


                    {{-- Utilisateurs --}}
                    <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm dark:border-slate-800 dark:bg-slate-900">

                        <div class="flex items-start justify-between">

                            <div>
                                <p class="text-sm text-slate-500 dark:text-slate-400">
                                    Utilisateurs
                                </p>

                                <p class="mt-2 text-3xl font-bold">
                                    146
                                </p>

                                <p class="mt-2 text-xs font-medium text-green-600 dark:text-green-400">
                                    139 actifs
                                </p>
                            </div>

                            <div class="rounded-xl bg-green-100 p-3 text-green-600 dark:bg-green-500/10 dark:text-green-400">
                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 20h5V4H2v16h5m10 0v-5H7v5m10 0H7"/>
                                </svg>
                            </div>

                        </div>

                    </div>

                </div>

            </section>


            {{-- ACTIONS RAPIDES --}}
            <section class="mb-8">

                <div class="mb-4">
                    <h2 class="text-lg font-bold">
                        Actions rapides
                    </h2>

                    <p class="text-sm text-slate-500 dark:text-slate-400">
                        Accédez rapidement aux principales fonctionnalités.
                    </p>
                </div>

                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 xl:grid-cols-4">

                    <a href="#"
                       class="group rounded-2xl border border-slate-200 bg-white p-5 transition duration-300 hover:-translate-y-1 hover:border-green-300 hover:shadow-lg dark:border-slate-800 dark:bg-slate-900 dark:hover:border-green-700">

                        <div class="mb-4 flex h-12 w-12 items-center justify-center rounded-xl bg-green-100 text-green-600 transition group-hover:bg-green-600 group-hover:text-white dark:bg-green-500/10 dark:text-green-400">

                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4v16m8-8H4"/>
                            </svg>

                        </div>

                        <h3 class="font-semibold">
                            Déposer un courrier
                        </h3>

                        <p class="mt-1 text-sm text-slate-500 dark:text-slate-400">
                            Enregistrer un nouveau courrier.
                        </p>

                    </a>


                    <a href="#"
                       class="group rounded-2xl border border-slate-200 bg-white p-5 transition duration-300 hover:-translate-y-1 hover:border-yellow-300 hover:shadow-lg dark:border-slate-800 dark:bg-slate-900 dark:hover:border-yellow-700">

                        <div class="mb-4 flex h-12 w-12 items-center justify-center rounded-xl bg-yellow-100 text-yellow-600 transition group-hover:bg-yellow-500 group-hover:text-white dark:bg-yellow-500/10 dark:text-yellow-400">

                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h6l5 5v11a2 2 0 01-2 2z"/>
                            </svg>

                        </div>

                        <h3 class="font-semibold">
                            Déposer une réponse
                        </h3>

                        <p class="mt-1 text-sm text-slate-500 dark:text-slate-400">
                            Répondre à un courrier reçu.
                        </p>

                    </a>


                    <a href="#"
                       class="group rounded-2xl border border-slate-200 bg-white p-5 transition duration-300 hover:-translate-y-1 hover:border-green-300 hover:shadow-lg dark:border-slate-800 dark:bg-slate-900 dark:hover:border-green-700">

                        <div class="mb-4 flex h-12 w-12 items-center justify-center rounded-xl bg-green-100 text-green-600 transition group-hover:bg-green-600 group-hover:text-white dark:bg-green-500/10 dark:text-green-400">

                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>

                        </div>

                        <h3 class="font-semibold">
                            Consulter les courriers
                        </h3>

                        <p class="mt-1 text-sm text-slate-500 dark:text-slate-400">
                            Rechercher et consulter les dossiers.
                        </p>

                    </a>


                    <a href="{{ route('admin.users.index') }}"
                       class="group rounded-2xl border border-slate-200 bg-white p-5 transition duration-300 hover:-translate-y-1 hover:border-green-300 hover:shadow-lg dark:border-slate-800 dark:bg-slate-900 dark:hover:border-green-700">

                        <div class="mb-4 flex h-12 w-12 items-center justify-center rounded-xl bg-green-100 text-green-600 transition group-hover:bg-green-600 group-hover:text-white dark:bg-green-500/10 dark:text-green-400">

                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 20h5V4H2v16h5m10 0v-5H7v5m10 0H7"/>
                            </svg>

                        </div>

                        <h3 class="font-semibold">
                            Gérer les utilisateurs
                        </h3>

                        <p class="mt-1 text-sm text-slate-500 dark:text-slate-400">
                            Administrer les comptes et accès.
                        </p>

                    </a>

                </div>

            </section>


            {{-- COURRIERS + ACTIVITÉ --}}
            <section class="grid grid-cols-1 gap-6 xl:grid-cols-3">

                {{-- Courriers récents --}}
                <div class="rounded-2xl border border-slate-200 bg-white shadow-sm xl:col-span-2 dark:border-slate-800 dark:bg-slate-900">

                    <div class="flex items-center justify-between border-b border-slate-200 p-5 dark:border-slate-800">

                        <div>
                            <h2 class="font-bold">
                                Courriers récents
                            </h2>

                            <p class="text-sm text-slate-500 dark:text-slate-400">
                                Derniers courriers enregistrés
                            </p>
                        </div>

                        <a href="#" class="text-sm font-semibold text-green-600 hover:text-green-700 dark:text-green-400">
                            Voir tout
                        </a>

                    </div>

                    <div class="overflow-x-auto">

                        <table class="w-full text-left text-sm">

                            <thead class="bg-slate-50 text-xs uppercase text-slate-500 dark:bg-slate-800/50 dark:text-slate-400">

                                <tr>
                                    <th class="px-5 py-4">Référence</th>
                                    <th class="px-5 py-4">Objet</th>
                                    <th class="px-5 py-4">Service</th>
                                    <th class="px-5 py-4">Statut</th>
                                </tr>

                            </thead>

                            <tbody class="divide-y divide-slate-200 dark:divide-slate-800">

                                <tr class="transition hover:bg-slate-50 dark:hover:bg-slate-800/50">
                                    <td class="whitespace-nowrap px-5 py-4 font-semibold">
                                        CEN-2026-00124
                                    </td>

                                    <td class="px-5 py-4">
                                        Demande de traitement
                                    </td>

                                    <td class="px-5 py-4 text-slate-500 dark:text-slate-400">
                                        Service informatique
                                    </td>

                                    <td class="px-5 py-4">
                                        <span class="rounded-full bg-yellow-100 px-3 py-1 text-xs font-semibold text-yellow-700 dark:bg-yellow-500/10 dark:text-yellow-400">
                                            En attente
                                        </span>
                                    </td>
                                </tr>

                                <tr class="transition hover:bg-slate-50 dark:hover:bg-slate-800/50">

                                    <td class="whitespace-nowrap px-5 py-4 font-semibold">
                                        CEN-2026-00123
                                    </td>

                                    <td class="px-5 py-4">
                                        Demande administrative
                                    </td>

                                    <td class="px-5 py-4 text-slate-500 dark:text-slate-400">
                                        Secrétariat
                                    </td>

                                    <td class="px-5 py-4">
                                        <span class="rounded-full bg-green-100 px-3 py-1 text-xs font-semibold text-green-700 dark:bg-green-500/10 dark:text-green-400">
                                            Traité
                                        </span>
                                    </td>

                                </tr>

                            </tbody>

                        </table>

                    </div>

                </div>


                {{-- Activité --}}
                <div class="rounded-2xl border border-slate-200 bg-white shadow-sm dark:border-slate-800 dark:bg-slate-900">

                    <div class="border-b border-slate-200 p-5 dark:border-slate-800">

                        <h2 class="font-bold">
                            Activité récente
                        </h2>

                        <p class="text-sm text-slate-500 dark:text-slate-400">
                            Dernières opérations
                        </p>

                    </div>

                    <div class="space-y-5 p-5">

                        <div class="flex gap-3">

                            <div class="mt-1 h-2.5 w-2.5 shrink-0 rounded-full bg-green-500"></div>

                            <div>
                                <p class="text-sm">
                                    Un courrier a été enregistré.
                                </p>

                                <p class="mt-1 text-xs text-slate-400">
                                    Il y a 5 minutes
                                </p>
                            </div>

                        </div>

                        <div class="flex gap-3">

                            <div class="mt-1 h-2.5 w-2.5 shrink-0 rounded-full bg-yellow-500"></div>

                            <div>
                                <p class="text-sm">
                                    Un utilisateur a été créé.
                                </p>

                                <p class="mt-1 text-xs text-slate-400">
                                    Il y a 18 minutes
                                </p>
                            </div>

                        </div>

                        <div class="flex gap-3">

                            <div class="mt-1 h-2.5 w-2.5 shrink-0 rounded-full bg-green-500"></div>

                            <div>
                                <p class="text-sm">
                                    Une réponse a été déposée.
                                </p>

                                <p class="mt-1 text-xs text-slate-400">
                                    Il y a 32 minutes
                                </p>
                            </div>

                        </div>

                    </div>

                </div>

            </section>

        </main>

    </div>

</div>


{{-- JAVASCRIPT --}}
<script>

document.addEventListener('DOMContentLoaded', () => {

    const themeButton = document.getElementById('admin-theme-toggle');
    const menuButton = document.getElementById('admin-menu-button');
    const sidebar = document.getElementById('admin-sidebar');

    // Mode sombre / clair
    if (themeButton) {
        themeButton.addEventListener('click', () => {

            document.documentElement.classList.toggle('dark');

            localStorage.setItem(
                'theme',
                document.documentElement.classList.contains('dark')
                    ? 'dark'
                    : 'light'
            );

        });
    }

    // Menu mobile
    if (menuButton && sidebar) {

        menuButton.addEventListener('click', () => {
            sidebar.classList.toggle('-translate-x-full');
        });

    }

});

</script>

@endsection