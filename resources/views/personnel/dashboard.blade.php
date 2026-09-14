
@extends('layouts.app')

@section('content')

<div
    x-data="{ sidebarOpen: false }"
    class="min-h-screen bg-slate-50 text-slate-900 transition-colors duration-300 dark:bg-slate-950 dark:text-slate-100"
>

    {{-- =========================================================
        SIDEBAR MOBILE OVERLAY
    ========================================================== --}}

    <div
        x-show="sidebarOpen"
        x-transition.opacity
        class="fixed inset-0 z-40 bg-slate-950/50 backdrop-blur-sm lg:hidden"
        @click="sidebarOpen = false"
        style="display: none;"
    ></div>


    {{-- =========================================================
        SIDEBAR
    ========================================================== --}}

    <aside
        class="fixed inset-y-0 left-0 z-50 flex w-72 flex-col border-r border-slate-200 bg-white transition-transform duration-300 dark:border-slate-800 dark:bg-slate-900 lg:translate-x-0"
        :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
    >

        {{-- Logo --}}

        <div class="flex h-20 items-center gap-3 border-b border-slate-200 px-6 dark:border-slate-800">

            <div class="flex h-11 w-11 items-center justify-center overflow-hidden rounded-xl bg-green-50 dark:bg-green-950/40">

                <img
                    src="{{ asset('images/cenadi.png') }}"
                    alt="CENADI"
                    class="h-9 w-9 object-contain"
                >

            </div>

            <div>
                <p class="text-sm font-bold text-green-700 dark:text-green-400">
                    CENADI
                </p>

                <p class="text-xs text-slate-500 dark:text-slate-400">
                    Gestion du courrier
                </p>
            </div>

            {{-- Fermeture mobile --}}

            <button
                type="button"
                @click="sidebarOpen = false"
                class="ml-auto rounded-lg p-2 text-slate-500 hover:bg-slate-100 dark:hover:bg-slate-800 lg:hidden"
            >
                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M6 18L18 6M6 6l12 12"
                    />
                </svg>
            </button>

        </div>


        {{-- Navigation --}}

        <nav class="flex-1 overflow-y-auto px-4 py-6">

            <p class="px-3 text-xs font-semibold uppercase tracking-wider text-slate-400">
                Espace de travail
            </p>

            <div class="mt-3 space-y-1">

                {{-- Dashboard --}}

                <a
                    href="{{ route('personnel.dashboard') }}"
                    class="flex items-center gap-3 rounded-xl bg-green-50 px-4 py-3 text-sm font-semibold text-green-700 dark:bg-green-950/30 dark:text-green-400"
                >

                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M3 12l9-9 9 9M5 10v10h14V10M9 20v-6h6v6"
                        />
                    </svg>

                    Tableau de bord

                </a>


                {{-- Déposer --}}

                <a
                    href="#deposer"
                    class="flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-medium text-slate-600 transition hover:bg-slate-100 hover:text-green-600 dark:text-slate-300 dark:hover:bg-slate-800 dark:hover:text-green-400"
                >

                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M12 16V4m0 0L7 9m5-5l5 5M5 20h14"
                        />
                    </svg>

                    Déposer

                </a>


                {{-- Consulter --}}

                <a
                    href="#consulter"
                    class="flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-medium text-slate-600 transition hover:bg-slate-100 hover:text-green-600 dark:text-slate-300 dark:hover:bg-slate-800 dark:hover:text-green-400"
                >

                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"
                        />

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M2.5 12s3.5-6 9.5-6 9.5 6 9.5 6-3.5 6-9.5 6-9.5-6-9.5-6z"
                        />
                    </svg>

                    Consulter

                </a>


                {{-- Envoyer --}}

                <a
                    href="#envoyer"
                    class="flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-medium text-slate-600 transition hover:bg-slate-100 hover:text-green-600 dark:text-slate-300 dark:hover:bg-slate-800 dark:hover:text-green-400"
                >

                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M22 2L11 13"
                        />

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M22 2l-7 20-4-9-9-4 20-7z"
                        />
                    </svg>

                    Envoyer

                </a>


                {{-- Notifications --}}

                <a
                    href="#notifications"
                    class="flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-medium text-slate-600 transition hover:bg-slate-100 hover:text-green-600 dark:text-slate-300 dark:hover:bg-slate-800 dark:hover:text-green-400"
                >

                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M15 17h5l-1.5-2.5V11a6.5 6.5 0 00-13 0v3.5L4 17h5m6 0a3 3 0 01-6 0"
                        />
                    </svg>

                    Notifications

                </a>

            </div>


            {{-- Mon compte --}}

            <p class="mt-8 px-3 text-xs font-semibold uppercase tracking-wider text-slate-400">
                Mon compte
            </p>

            <div class="mt-3 space-y-1">

                <a
                    href="#profil"
                    class="flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-medium text-slate-600 transition hover:bg-slate-100 hover:text-green-600 dark:text-slate-300 dark:hover:bg-slate-800 dark:hover:text-green-400"
                >

                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M20 21a8 8 0 00-16 0M12 13a4 4 0 100-8 4 4 0 000 8z"
                        />
                    </svg>

                    Mon profil

                </a>

            </div>

        </nav>


        {{-- Utilisateur + déconnexion --}}

        <div class="border-t border-slate-200 p-4 dark:border-slate-800">

            <div class="flex items-center gap-3 rounded-xl bg-slate-50 p-3 dark:bg-slate-950">

                <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-green-100 font-bold text-green-700 dark:bg-green-950/50 dark:text-green-400">
                    {{ strtoupper(substr($user->prenom, 0, 1) . substr($user->nom, 0, 1)) }}
                </div>

                <div class="min-w-0 flex-1">

                    <p class="truncate text-sm font-semibold">
                        {{ $user->prenom }} {{ $user->nom }}
                    </p>

                    <p class="truncate text-xs text-slate-500 dark:text-slate-400">
                        Personnel
                    </p>

                </div>

            </div>


            <form
                action="{{ route('logout') }}"
                method="POST"
                class="mt-3"
            >
                @csrf

                <button
                    type="submit"
                    class="flex w-full items-center gap-3 rounded-xl px-4 py-3 text-sm font-medium text-red-600 transition hover:bg-red-50 dark:text-red-400 dark:hover:bg-red-950/30"
                >

                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M15 17l5-5-5-5M20 12H9"
                        />

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M13 5H6a2 2 0 00-2 2v10a2 2 0 002 2h7"
                        />
                    </svg>

                    Se déconnecter

                </button>

            </form>

        </div>

    </aside>


    {{-- =========================================================
        CONTENU PRINCIPAL
    ========================================================== --}}

    <div class="lg:pl-72">

        {{-- Header --}}

        <header
            class="sticky top-0 z-30 border-b border-slate-200 bg-white/90 backdrop-blur-xl dark:border-slate-800 dark:bg-slate-900/90"
        >

            <div class="flex h-20 items-center justify-between px-4 sm:px-6 lg:px-8">

                {{-- Menu mobile --}}

                <button
                    type="button"
                    @click="sidebarOpen = true"
                    class="rounded-xl border border-slate-200 p-2.5 text-slate-600 transition hover:border-green-300 hover:text-green-600 dark:border-slate-700 dark:text-slate-300 lg:hidden"
                >

                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"
                        />
                    </svg>

                </button>


                <div class="hidden lg:block">

                    <p class="text-sm font-semibold text-slate-800 dark:text-slate-100">
                        Espace de travail
                    </p>

                    <p class="text-xs text-slate-500 dark:text-slate-400">
                        Gestion du courrier administratif
                    </p>

                </div>


                <div class="ml-auto flex items-center gap-2 sm:gap-3">

                    {{-- Notifications --}}

                    <button
                        type="button"
                        class="relative rounded-xl border border-slate-200 p-2.5 text-slate-600 transition hover:border-green-300 hover:text-green-600 dark:border-slate-700 dark:text-slate-300 dark:hover:border-green-700 dark:hover:text-green-400"
                        title="Notifications"
                    >

                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M15 17h5l-1.5-2.5V11a6.5 6.5 0 00-13 0v3.5L4 17h5m6 0a3 3 0 01-6 0"
                            />
                        </svg>

                        @if($stats['notifications'] > 0)

                            <span class="absolute -right-1 -top-1 flex h-5 min-w-5 items-center justify-center rounded-full bg-yellow-500 px-1 text-[10px] font-bold text-white">
                                {{ $stats['notifications'] }}
                            </span>

                        @endif

                    </button>


                    {{-- Theme --}}

                    <button
                        type="button"
                        id="personnel-theme-toggle"
                        class="rounded-xl border border-slate-200 p-2.5 text-slate-600 transition hover:border-green-300 hover:text-green-600 dark:border-slate-700 dark:text-slate-300 dark:hover:border-green-700 dark:hover:text-green-400"
                        title="Changer de thème"
                    >

                        <svg
                            id="personnel-sun-icon"
                            class="hidden h-5 w-5"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <circle cx="12" cy="12" r="4" stroke-width="2"/>
                            <path
                                stroke-linecap="round"
                                stroke-width="2"
                                d="M12 2v2m0 16v2M4.93 4.93l1.41 1.41m11.32 11.32l1.41 1.41M2 12h2m16 0h2M4.93 19.07l1.41-1.41m11.32-11.32l1.41-1.41"
                            />
                        </svg>

                        <svg
                            id="personnel-moon-icon"
                            class="h-5 w-5"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"
                            />
                        </svg>

                    </button>


                    {{-- Profil --}}

                    <div class="hidden items-center gap-3 border-l border-slate-200 pl-3 sm:flex dark:border-slate-700">

                        <div class="text-right">

                            <p class="text-sm font-semibold">
                                {{ $user->prenom }} {{ $user->nom }}
                            </p>

                            <p class="text-xs text-slate-500 dark:text-slate-400">
                                {{ $user->service?->nom ?? 'Personnel' }}
                            </p>

                        </div>

                        <div class="flex h-10 w-10 items-center justify-center rounded-full bg-green-600 text-sm font-bold text-white">
                            {{ strtoupper(substr($user->prenom, 0, 1) . substr($user->nom, 0, 1)) }}
                        </div>

                    </div>

                </div>

            </div>

        </header>


        {{-- =====================================================
            MAIN
        ====================================================== --}}

        <main class="px-4 py-8 sm:px-6 lg:px-8">

            <div class="mx-auto max-w-7xl">


                {{-- =================================================
                    HERO
                ================================================== --}}

                <section
                    class="relative overflow-hidden rounded-3xl bg-gradient-to-br from-green-700 via-green-600 to-green-500 p-6 text-white shadow-xl sm:p-8 lg:p-10"
                >

                    {{-- Décor --}}

                    <div class="absolute -right-20 -top-20 h-64 w-64 rounded-full bg-white/10"></div>
                    <div class="absolute -bottom-32 right-20 h-72 w-72 rounded-full bg-yellow-400/10"></div>

                    <div class="relative max-w-3xl">

                        <div class="inline-flex items-center gap-2 rounded-full border border-white/20 bg-white/10 px-3 py-1.5 text-xs font-semibold uppercase tracking-wider backdrop-blur">
                            Espace personnel
                        </div>

                        <h1 class="mt-5 text-3xl font-bold tracking-tight sm:text-4xl lg:text-5xl">
                            Bonjour, {{ $user->prenom }} {{ $user->nom }}
                        </h1>

                        <p class="mt-4 max-w-2xl text-sm leading-7 text-green-50 sm:text-base">
                            Bienvenue dans votre espace de travail.
                            Gérez vos courriers administratifs, consultez leur évolution
                            et échangez avec votre chef de service depuis une plateforme
                            centralisée.
                        </p>


                        <div class="mt-7 flex flex-col gap-3 sm:flex-row">

                            <a
                                href="{{ route('courriers.create') }}"
                                class="inline-flex items-center justify-center gap-2 rounded-xl bg-white px-5 py-3 text-sm font-bold text-green-700 shadow-lg transition hover:bg-green-50"
                            >

                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M12 16V4m0 0L7 9m5-5l5 5M5 20h14"
                                    />
                                </svg>

                                Déposer un courrier

                            </a>


                            <a
                                href="#consulter"
                                class="inline-flex items-center justify-center gap-2 rounded-xl border border-white/30 bg-white/10 px-5 py-3 text-sm font-semibold text-white backdrop-blur transition hover:bg-white/20"
                            >

                                Consulter mes courriers

                            </a>

                        </div>

                    </div>

                </section>


                {{-- =================================================
                    STATISTIQUES
                ================================================== --}}

                <section class="mt-8">

                    <div class="grid gap-4 sm:grid-cols-2 xl:grid-cols-4">

                        {{-- Courriers envoyés --}}

                        <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm dark:border-slate-800 dark:bg-slate-900">

                            <div class="flex items-center justify-between">

                                <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-green-50 text-green-600 dark:bg-green-950/30 dark:text-green-400">

                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M22 2L11 13M22 2l-7 20-4-9-9-4 20-7z"
                                        />
                                    </svg>

                                </div>

                                <span class="text-xs font-semibold uppercase tracking-wide text-slate-400">
                                    Envoyés
                                </span>

                            </div>

                            <p class="mt-5 text-3xl font-bold">
                                {{ $stats['courriers_envoyes'] }}
                            </p>

                            <p class="mt-1 text-sm text-slate-500 dark:text-slate-400">
                                Courriers envoyés
                            </p>

                        </div>


                        {{-- Courriers reçus --}}

                        <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm dark:border-slate-800 dark:bg-slate-900">

                            <div class="flex items-center justify-between">

                                <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-yellow-50 text-yellow-600 dark:bg-yellow-950/30 dark:text-yellow-400">

                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M3 8l9 5 9-5M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"
                                        />
                                    </svg>

                                </div>

                                <span class="text-xs font-semibold uppercase tracking-wide text-slate-400">
                                    Reçus
                                </span>

                            </div>

                            <p class="mt-5 text-3xl font-bold">
                                {{ $stats['courriers_recus'] }}
                            </p>

                            <p class="mt-1 text-sm text-slate-500 dark:text-slate-400">
                                Courriers reçus
                            </p>

                        </div>


                        {{-- Réponses --}}

                        <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm dark:border-slate-800 dark:bg-slate-900">

                            <div class="flex items-center justify-between">

                                <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-blue-50 text-blue-600 dark:bg-blue-950/30 dark:text-blue-400">

                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M3 10h11M3 6h18M3 14h18M3 18h11"
                                        />
                                    </svg>

                                </div>

                                <span class="text-xs font-semibold uppercase tracking-wide text-slate-400">
                                    Réponses
                                </span>

                            </div>

                            <p class="mt-5 text-3xl font-bold">
                                {{ $stats['reponses'] }}
                            </p>

                            <p class="mt-1 text-sm text-slate-500 dark:text-slate-400">
                                Réponses reçues
                            </p>

                        </div>


                        {{-- Notifications --}}

                        <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm dark:border-slate-800 dark:bg-slate-900">

                            <div class="flex items-center justify-between">

                                <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-orange-50 text-orange-600 dark:bg-orange-950/30 dark:text-orange-400">

                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M15 17h5l-1.5-2.5V11a6.5 6.5 0 00-13 0v3.5L4 17h5m6 0a3 3 0 01-6 0"
                                        />
                                    </svg>

                                </div>

                                <span class="text-xs font-semibold uppercase tracking-wide text-slate-400">
                                    Notifications
                                </span>

                            </div>

                            <p class="mt-5 text-3xl font-bold">
                                {{ $stats['notifications'] }}
                            </p>

                            <p class="mt-1 text-sm text-slate-500 dark:text-slate-400">
                                Notifications reçues
                            </p>

                        </div>

                    </div>

                </section>


                {{-- =================================================
                    ACTIONS RAPIDES
                ================================================== --}}

                <section class="mt-10">

                    <div>

                        <span class="text-xs font-bold uppercase tracking-widest text-green-600 dark:text-green-400">
                            Actions rapides
                        </span>

                        <h2 class="mt-2 text-2xl font-bold tracking-tight">
                            Que souhaitez-vous faire ?
                        </h2>

                        <p class="mt-2 text-sm text-slate-500 dark:text-slate-400">
                            Accédez rapidement aux principales fonctionnalités
                            de votre espace de travail.
                        </p>

                    </div>


                    <div class="mt-6 grid gap-4 sm:grid-cols-2 xl:grid-cols-3">

                        {{-- Déposer un courrier --}}

                        <a
                            href="#deposer"
                            class="group rounded-2xl border border-slate-200 bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:border-green-300 hover:shadow-lg dark:border-slate-800 dark:bg-slate-900 dark:hover:border-green-700"
                        >

                            <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-green-50 text-green-600 transition group-hover:bg-green-600 group-hover:text-white dark:bg-green-950/30 dark:text-green-400 dark:group-hover:bg-green-600 dark:group-hover:text-white">

                                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M12 16V4m0 0L7 9m5-5l5 5M5 20h14"
                                    />
                                </svg>

                            </div>

                            <h3 class="mt-5 font-bold">
                                Déposer un courrier
                            </h3>

                            <p class="mt-2 text-sm leading-6 text-slate-500 dark:text-slate-400">
                                Créez et déposez un nouveau courrier administratif
                                destiné à votre chef de service.
                            </p>

                            <span class="mt-4 inline-flex items-center gap-2 text-sm font-semibold text-green-600 dark:text-green-400">
                                Commencer
                                <span class="transition group-hover:translate-x-1">→</span>
                            </span>

                        </a>


                        {{-- Répondre --}}

                        <a
                            href="#deposer"
                            class="group rounded-2xl border border-slate-200 bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:border-yellow-300 hover:shadow-lg dark:border-slate-800 dark:bg-slate-900 dark:hover:border-yellow-700"
                        >

                            <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-yellow-50 text-yellow-600 transition group-hover:bg-yellow-500 group-hover:text-white dark:bg-yellow-950/30 dark:text-yellow-400 dark:group-hover:bg-yellow-500 dark:group-hover:text-white">

                                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M3 10h11M3 6h18M3 14h18M3 18h11"
                                    />
                                </svg>

                            </div>

                            <h3 class="mt-5 font-bold">
                                Répondre à un courrier
                            </h3>

                            <p class="mt-2 text-sm leading-6 text-slate-500 dark:text-slate-400">
                                Répondez à un courrier qui vous a été adressé
                                par votre chef de service.
                            </p>

                            <span class="mt-4 inline-flex items-center gap-2 text-sm font-semibold text-green-600 dark:text-green-400">
                                Répondre
                                <span class="transition group-hover:translate-x-1">→</span>
                            </span>

                        </a>


                        {{-- Mes courriers --}}

                        <a
                            href="#consulter"
                            class="group rounded-2xl border border-slate-200 bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:border-green-300 hover:shadow-lg dark:border-slate-800 dark:bg-slate-900 dark:hover:border-green-700"
                        >

                            <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-green-50 text-green-600 transition group-hover:bg-green-600 group-hover:text-white dark:bg-green-950/30 dark:text-green-400 dark:group-hover:bg-green-600 dark:group-hover:text-white">

                                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M4 5a2 2 0 012-2h12a2 2 0 012 2v14a2 2 0 01-2 2H6a2 2 0 01-2-2V5zM8 7h8M8 11h8M8 15h5"
                                    />
                                </svg>

                            </div>

                            <h3 class="mt-5 font-bold">
                                Mes courriers
                            </h3>

                            <p class="mt-2 text-sm leading-6 text-slate-500 dark:text-slate-400">
                                Consultez vos courriers envoyés et suivez leur
                                évolution.
                            </p>

                            <span class="mt-4 inline-flex items-center gap-2 text-sm font-semibold text-green-600 dark:text-green-400">
                                Consulter
                                <span class="transition group-hover:translate-x-1">→</span>
                            </span>

                        </a>


                        {{-- Réponses --}}

                        <a
                            href="#consulter"
                            class="group rounded-2xl border border-slate-200 bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:border-blue-300 hover:shadow-lg dark:border-slate-800 dark:bg-slate-900 dark:hover:border-blue-700"
                        >

                            <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-blue-50 text-blue-600 transition group-hover:bg-blue-600 group-hover:text-white dark:bg-blue-950/30 dark:text-blue-400 dark:group-hover:bg-blue-600 dark:group-hover:text-white">

                                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M4 5a2 2 0 012-2h12a2 2 0 012 2v14a2 2 0 01-2 2H6a2 2 0 01-2-2V5zM8 8h8M8 12h5"
                                    />
                                </svg>

                            </div>

                            <h3 class="mt-5 font-bold">
                                Mes réponses
                            </h3>

                            <p class="mt-2 text-sm leading-6 text-slate-500 dark:text-slate-400">
                                Consultez les réponses reçues concernant vos
                                courriers.
                            </p>

                            <span class="mt-4 inline-flex items-center gap-2 text-sm font-semibold text-green-600 dark:text-green-400">
                                Consulter
                                <span class="transition group-hover:translate-x-1">→</span>
                            </span>

                        </a>


                        {{-- Notifications --}}

                        <a
                            href="#notifications"
                            class="group rounded-2xl border border-slate-200 bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:border-orange-300 hover:shadow-lg dark:border-slate-800 dark:bg-slate-900 dark:hover:border-orange-700"
                        >

                            <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-orange-50 text-orange-600 transition group-hover:bg-orange-500 group-hover:text-white dark:bg-orange-950/30 dark:text-orange-400 dark:group-hover:bg-orange-500 dark:group-hover:text-white">

                                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M15 17h5l-1.5-2.5V11a6.5 6.5 0 00-13 0v3.5L4 17h5m6 0a3 3 0 01-6 0"
                                    />
                                </svg>

                            </div>

                            <h3 class="mt-5 font-bold">
                                Notifications
                            </h3>

                            <p class="mt-2 text-sm leading-6 text-slate-500 dark:text-slate-400">
                                Consultez les notifications liées à vos
                                courriers et à leur traitement.
                            </p>

                            <span class="mt-4 inline-flex items-center gap-2 text-sm font-semibold text-green-600 dark:text-green-400">
                                Voir les notifications
                                <span class="transition group-hover:translate-x-1">→</span>
                            </span>

                        </a>


                        {{-- Commentaires --}}

                        <a
                            href="#commentaires"
                            class="group rounded-2xl border border-slate-200 bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:border-purple-300 hover:shadow-lg dark:border-slate-800 dark:bg-slate-900 dark:hover:border-purple-700"
                        >

                            <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-purple-50 text-purple-600 transition group-hover:bg-purple-600 group-hover:text-white dark:bg-purple-950/30 dark:text-purple-400 dark:group-hover:bg-purple-600 dark:group-hover:text-white">

                                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M21 11.5a8.38 8.38 0 01-9 8.5 8.9 8.9 0 01-4-.9L3 21l1.9-4.4A8.5 8.5 0 1121 11.5z"
                                    />
                                </svg>

                            </div>

                            <h3 class="mt-5 font-bold">
                                Commentaires reçus
                            </h3>

                            <p class="mt-2 text-sm leading-6 text-slate-500 dark:text-slate-400">
                                Consultez les commentaires transmis par votre
                                chef de service.
                            </p>

                            <span class="mt-4 inline-flex items-center gap-2 text-sm font-semibold text-green-600 dark:text-green-400">
                                Consulter
                                <span class="transition group-hover:translate-x-1">→</span>
                            </span>

                        </a>

                    </div>

                </section>


                {{-- =================================================
                    ACTIVITÉ RÉCENTE
                ================================================== --}}

                <section class="mt-10">

                    <div class="rounded-2xl border border-slate-200 bg-white shadow-sm dark:border-slate-800 dark:bg-slate-900">

                        <div class="border-b border-slate-200 px-6 py-5 dark:border-slate-800">

                            <div class="flex flex-col justify-between gap-3 sm:flex-row sm:items-center">

                                <div>

                                    <span class="text-xs font-bold uppercase tracking-widest text-green-600 dark:text-green-400">
                                        Suivi
                                    </span>

                                    <h2 class="mt-1 text-xl font-bold">
                                        Activité récente
                                    </h2>

                                </div>

                                <a
                                    href="#consulter"
                                    class="text-sm font-semibold text-green-600 hover:text-green-700 dark:text-green-400"
                                >
                                    Voir tout
                                </a>

                            </div>

                        </div>


                        @if($courriersRecents->isEmpty())

                            <div class="px-6 py-14 text-center">

                                <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-2xl bg-slate-100 text-slate-400 dark:bg-slate-800">

                                    <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="1.8"
                                            d="M4 6a2 2 0 012-2h12a2 2 0 012 2v12a2 2 0 01-2 2H6a2 2 0 01-2-2V6z"
                                        />

                                        <path
                                            stroke-linecap="round"
                                            stroke-width="1.8"
                                            d="M8 9h8M8 13h5"
                                        />
                                    </svg>

                                </div>

                                <h3 class="mt-5 font-semibold">
                                    Aucune activité récente
                                </h3>

                                <p class="mx-auto mt-2 max-w-md text-sm leading-6 text-slate-500 dark:text-slate-400">
                                    Vos courriers, réponses et autres activités
                                    apparaîtront ici dès que vous commencerez
                                    à utiliser la plateforme.
                                </p>

                                <a
                                    href="#deposer"
                                    class="mt-6 inline-flex items-center justify-center rounded-xl bg-green-600 px-5 py-3 text-sm font-semibold text-white transition hover:bg-green-700"
                                >
                                    Déposer votre premier courrier
                                </a>

                            </div>

                        @else

                            <div class="divide-y divide-slate-100 dark:divide-slate-800">

                                @foreach($courriersRecents as $courrier)

                                    {{-- Futur affichage des courriers --}}

                                @endforeach

                            </div>

                        @endif

                    </div>

                </section>


                {{-- =================================================
                    INFORMATIONS / SÉCURITÉ
                ================================================== --}}

                <section class="mt-10 grid gap-6 lg:grid-cols-2">

                    {{-- Profil --}}

                    <div
                        id="profil"
                        class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm dark:border-slate-800 dark:bg-slate-900"
                    >

                        <div class="flex items-start gap-4">

                            <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-green-50 text-green-600 dark:bg-green-950/30 dark:text-green-400">

                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M20 21a8 8 0 00-16 0M12 13a4 4 0 100-8 4 4 0 000 8z"
                                    />
                                </svg>

                            </div>

                            <div class="min-w-0">

                                <h2 class="font-bold">
                                    Mes informations
                                </h2>

                                <p class="mt-1 text-sm text-slate-500 dark:text-slate-400">
                                    Informations utilisées pour votre espace de travail.
                                </p>

                            </div>

                        </div>


                        <div class="mt-6 grid gap-4 sm:grid-cols-2">

                            <div>
                                <p class="text-xs font-semibold uppercase tracking-wide text-slate-400">
                                    Nom complet
                                </p>

                                <p class="mt-1 text-sm font-semibold">
                                    {{ $user->prenom }} {{ $user->nom }}
                                </p>
                            </div>


                            <div>
                                <p class="text-xs font-semibold uppercase tracking-wide text-slate-400">
                                    Rôle
                                </p>

                                <p class="mt-1 text-sm font-semibold">
                                    Personnel
                                </p>
                            </div>


                            <div>
                                <p class="text-xs font-semibold uppercase tracking-wide text-slate-400">
                                    Service
                                </p>

                                <p class="mt-1 text-sm font-semibold">
                                    {{ $user->service?->nom ?? 'Non affecté' }}
                                </p>
                            </div>


                            <div>
                                <p class="text-xs font-semibold uppercase tracking-wide text-slate-400">
                                    Adresse e-mail
                                </p>

                                <p class="mt-1 truncate text-sm font-semibold">
                                    {{ $user->email }}
                                </p>
                            </div>

                        </div>

                    </div>


                    {{-- Sécurité --}}

                    <div
                        class="rounded-2xl border border-green-200 bg-green-50 p-6 dark:border-green-900/50 dark:bg-green-950/20"
                    >

                        <div class="flex items-start gap-4">

                            <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-green-100 text-green-700 dark:bg-green-900/40 dark:text-green-400">

                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v2h8z"
                                    />
                                </svg>

                            </div>

                            <div>

                                <h2 class="font-bold text-green-900 dark:text-green-300">
                                    Confidentialité et sécurité
                                </h2>

                                <p class="mt-2 text-sm leading-6 text-green-800 dark:text-green-400">
                                    Votre espace de travail vous donne uniquement
                                    accès aux informations qui vous concernent.
                                    Les courriers, réponses, commentaires et
                                    notifications d'autres utilisateurs ne sont
                                    pas accessibles depuis cet espace.
                                </p>

                            </div>

                        </div>

                    </div>

                </section>


                {{-- =================================================
                    FOOTER
                ================================================== --}}

                <footer class="mt-12 border-t border-slate-200 py-8 dark:border-slate-800">

                    <div class="flex flex-col justify-between gap-4 text-sm text-slate-500 dark:text-slate-400 sm:flex-row">

                        <p>
                            © {{ date('Y') }} CENADI — Gestion du courrier administratif.
                        </p>

                        <p>
                            Espace de travail du personnel
                        </p>

                    </div>

                </footer>

            </div>

        </main>

    </div>

</div>


{{-- =============================================================
    ALPINE.JS
============================================================== --}}

<script
    defer
    src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"
></script>


{{-- =============================================================
    THEME SWITCH
============================================================== --}}

<script>

document.addEventListener('DOMContentLoaded', () => {

    const toggle = document.getElementById('personnel-theme-toggle');

    const sunIcon = document.getElementById('personnel-sun-icon');

    const moonIcon = document.getElementById('personnel-moon-icon');

    if (!toggle) {
        return;
    }


    function updateThemeIcons() {

        const isDark = document.documentElement.classList.contains('dark');

        if (isDark) {

            sunIcon?.classList.remove('hidden');
            moonIcon?.classList.add('hidden');

        } else {

            sunIcon?.classList.add('hidden');
            moonIcon?.classList.remove('hidden');

        }

    }


    toggle.addEventListener('click', () => {

        const isDark =
            document.documentElement.classList.contains('dark');

        if (isDark) {

            document.documentElement.classList.remove('dark');

            localStorage.setItem(
                'theme',
                'light'
            );

        } else {

            document.documentElement.classList.add('dark');

            localStorage.setItem(
                'theme',
                'dark'
            );

        }

        updateThemeIcons();

    });


    updateThemeIcons();

});

</script>

@endsection
