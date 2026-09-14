
@extends('layouts.app')

@section('content')

<div
    class="min-h-screen bg-slate-50 text-slate-900 transition-colors
           dark:bg-slate-950 dark:text-slate-100"
>

    <div class="flex min-h-screen">


        {{-- =====================================================
             SIDEBAR
        ====================================================== --}}

        <div
    id="sidebarOverlay"
    class="fixed inset-0 z-40
           bg-slate-950/50
           hidden
           lg:hidden"
></div>

        <aside
            id="sidebar"
            class="fixed inset-y-0 left-0 z-50
           w-72
           bg-white dark:bg-slate-900
           border-r border-slate-200 dark:border-slate-800
           transform -translate-x-full
           lg:translate-x-0
           transition-transform duration-300"
        >

            <div class="flex h-full flex-col">


                {{-- Logo / identité --}}
                <div
                    class="flex h-20 items-center gap-3 border-b
                           border-slate-200 px-6
                           dark:border-slate-800"
                >

                    <div
                        class="flex h-11 w-11 items-center justify-center
                               rounded-xl bg-green-600 font-bold text-white
                               shadow-sm"
                    >
                        C
                    </div>

                    <div>
                        <p class="font-bold text-slate-900 dark:text-white">
                            CENADI
                        </p>

                        <p class="text-xs text-slate-500 dark:text-slate-400">
                            Gestion du courrier
                        </p>
                    </div>

                    {{-- Bouton fermer : visible uniquement sur mobile --}}
        <button
            id="closeSidebarButton"
            type="button"
            class="lg:hidden inline-flex items-center justify-center
                   w-10 h-10 rounded-lg
                   text-slate-600 dark:text-slate-300
                   hover:bg-slate-100 dark:hover:bg-slate-800
                   transition"
            aria-label="Fermer le menu"
        >
            <svg
                class="w-6 h-6"
                fill="none"
                stroke="currentColor"
                viewBox="0 0 24 24"
            >
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
                <nav class="flex-1 space-y-1 overflow-y-auto p-4">

                    <a
                        href="{{ route('secretaire.dashboard') }}"
                        class="flex items-center gap-3 rounded-xl
                               bg-green-50 px-4 py-3 text-sm font-semibold
                               text-green-700
                               dark:bg-green-950/40 dark:text-green-400"
                    >
                        <svg class="h-5 w-5" fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24">
                            <path stroke-width="2"
                                  d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11v10a1 1 0 01-1 1h-3m-4 0h4"/>
                        </svg>

                        Tableau de bord
                    </a>


                    <a
                        href="{{ route('courriers.create') }}"
                        class="flex items-center gap-3 rounded-xl
                               px-4 py-3 text-sm font-medium
                               text-slate-600 transition
                               hover:bg-slate-100 hover:text-green-700
                               dark:text-slate-300 dark:hover:bg-slate-800"
                    >
                        <svg class="h-5 w-5" fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24">
                            <path stroke-width="2"
                                  d="M12 4v16m8-8H4"/>
                        </svg>

                        Déposer un courrier
                    </a>


                    <a
                        href="{{ route('secretaire.courriers.index') }}"
                        class="flex items-center gap-3 rounded-xl
                               px-4 py-3 text-sm font-medium
                               text-slate-600 transition
                               hover:bg-slate-100 hover:text-green-700
                               dark:text-slate-300 dark:hover:bg-slate-800"
                    >
                        <svg class="h-5 w-5" fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24">
                            <path stroke-width="2"
                                  d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>

                        Tous les courriers
                    </a>


                    <a
                        href="{{ route('secretaire.courriers.a-enregistrer') }}"
                        class="flex items-center gap-3 rounded-xl
                               px-4 py-3 text-sm font-medium
                               text-slate-600 transition
                               hover:bg-slate-100 hover:text-green-700
                               dark:text-slate-300 dark:hover:bg-slate-800"
                    >
                        <svg class="h-5 w-5" fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24">
                            <path stroke-width="2"
                                  d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v11a2 2 0 002 2h8m4-3l3 3m0 0l-3 3m3-3h-7"/>
                        </svg>

                        À enregistrer

                        @if($courriersDeposes > 0)
                            <span
                                class="ml-auto rounded-full bg-green-600
                                       px-2 py-0.5 text-xs font-bold text-white"
                            >
                                {{ $courriersDeposes }}
                            </span>
                        @endif

                    </a>


                    <x-commentaires-menu />


                    <a href="{{ route('notifications.index') }}"
   class="relative flex items-center gap-3
          rounded-xl px-4 py-3
          transition
          hover:bg-green-50
          dark:hover:bg-green-950/30">

    <div class="relative">

        <svg class="h-6 w-6
                    text-gray-600
                    dark:text-gray-300"
             fill="none"
             stroke="currentColor"
             viewBox="0 0 24 24">

            <path stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M15 17h5l-1.405-1.405
                     A2.032 2.032 0 0118 14.158V11
                     a6.002 6.002 0 00-4-5.659V5
                     a2 2 0 10-4 0v.341
                     C7.67 6.165 6 8.388
                     6 11v3.159
                     c0 .538-.214 1.055-.595 1.436
                     L4 17h5m6 0v1
                     a3 3 0 11-6 0v-1m6 0H9"/>

        </svg>

        @if ($nombreNotificationsNonLues > 0)

            <span class="absolute -right-2 -top-2
                         flex h-5 min-w-5
                         items-center justify-center
                         rounded-full
                         bg-red-500
                         px-1
                         text-[10px]
                         font-bold
                         text-white">

                {{ $nombreNotificationsNonLues }}

            </span>

        @endif

    </div>

    <span>
        Notifications
    </span>

</a>

                </nav>


                {{-- Profil / déconnexion --}}
                <div
                    class="border-t border-slate-200 p-4
                           dark:border-slate-800"
                >

                    <div class="mb-3 flex items-center gap-3">

                        <div
                            class="flex h-10 w-10 items-center justify-center
                                   rounded-full bg-green-100 font-bold
                                   text-green-700
                                   dark:bg-green-950 dark:text-green-400"
                        >
                            {{ strtoupper(substr($user->prenom, 0, 1)) }}
                        </div>

                        <div class="min-w-0">
                            <p class="truncate text-sm font-semibold">
                                {{ $user->prenom }} {{ $user->nom }}
                            </p>

                            <p class="text-xs text-slate-500 dark:text-slate-400">
                                Secrétaire
                            </p>
                        </div>

                    </div>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <button
                            type="submit"
                            class="flex w-full items-center gap-3
                                   rounded-xl px-4 py-3 text-sm
                                   font-medium text-red-600
                                   hover:bg-red-50
                                   dark:hover:bg-red-950/30"
                        >
                            <svg class="h-5 w-5" fill="none"
                                 stroke="currentColor"
                                 viewBox="0 0 24 24">
                                <path stroke-width="2"
                                      d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a2 2 0 01-2 2H6a2 2 0 01-2-2V7a2 2 0 012-2h5a2 2 0 012 2v1"/>
                            </svg>

                            Déconnexion
                        </button>

                    </form>

                </div>

            </div>

        </aside>


        {{-- =====================================================
             CONTENU PRINCIPAL
        ====================================================== --}}

        <main class="w-full lg:ml-72">


            {{-- Header --}}
            <header
                class="sticky top-0 z-30 border-b border-slate-200
                       bg-white/90 backdrop-blur
                       dark:border-slate-800 dark:bg-slate-900/90"
            >

                <div
                    class="flex h-20 items-center justify-between
                           px-4 sm:px-6 lg:px-8"
                >

                    <div class="flex items-center gap-3">

                        {{-- Bouton mobile --}}
                        <button
                            id="mobileMenuButton"
                            type="button"
                            class="rounded-lg p-2 text-slate-600
                                   hover:bg-slate-100
                                   dark:text-slate-300 dark:hover:bg-slate-800
                                   lg:hidden"
                        >
                            <svg class="h-6 w-6" fill="none"
                                 stroke="currentColor"
                                 viewBox="0 0 24 24">
                                <path stroke-width="2"
                                      d="M4 6h16M4 12h16M4 18h16"/>
                            </svg>
                        </button>

                        <div>
                            <h1 class="text-lg font-bold sm:text-xl">
                                Espace secrétariat
                            </h1>

                            <p class="hidden text-sm text-slate-500 sm:block
                                      dark:text-slate-400">
                                Gestion et suivi des courriers administratifs
                            </p>
                        </div>

                    </div>


                    <div class="flex items-center gap-2">

                        {{-- Thème --}}
                        <button
                            id="themeToggle"
                            type="button"
                            class="rounded-xl border border-slate-200
                                   p-2.5 text-slate-600 transition
                                   hover:bg-slate-100
                                   dark:border-slate-700
                                   dark:text-slate-300
                                   dark:hover:bg-slate-800"
                            aria-label="Changer de thème"
                        >

                            <svg
                                id="themeIcon"
                                class="h-5 w-5"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-width="2"
                                    d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.4-6.4l-.7.7M6.3 17.7l-.7.7m12.1 0l-.7-.7M6.3 6.3l-.7-.7M16 12a4 4 0 11-8 0 4 4 0 018 0z"
                                />
                            </svg>

                        </button>


                        {{-- Notifications --}}
                        <button
                            type="button"
                            class="relative rounded-xl border
                                   border-slate-200 p-2.5
                                   text-slate-600 transition
                                   hover:bg-slate-100
                                   dark:border-slate-700
                                   dark:text-slate-300
                                   dark:hover:bg-slate-800"
                        >

                            <svg class="h-5 w-5" fill="none"
                                 stroke="currentColor"
                                 viewBox="0 0 24 24">
                                <path stroke-width="2"
                                      d="M15 17h5l-1.4-1.4A2 2 0 0118 14.2V11a6 6 0 00-12 0v3.2a2 2 0 01-.6 1.4L4 17h5m6 0a3 3 0 11-6 0"/>
                            </svg>

                            <span
                                class="absolute right-1 top-1 h-2 w-2
                                       rounded-full bg-yellow-500"
                            ></span>

                        </button>

                    </div>

                </div>

            </header>


            {{-- Contenu --}}
            <div class="p-4 sm:p-6 lg:p-8">


                {{-- Bienvenue --}}
                <div class="mb-8">

                    <p class="text-sm font-medium text-green-600
                              dark:text-green-400">
                        Gestion du courrier
                    </p>

                    <h2 class="mt-1 text-2xl font-bold sm:text-3xl">
                        Bonjour, {{ $user->prenom }} 👋
                    </h2>

                    <p class="mt-2 text-slate-500 dark:text-slate-400">
                        Voici un aperçu de l'activité récente du courrier.
                    </p>

                </div>


                {{-- Statistiques --}}
                <div
                    class="mb-8 grid gap-4 sm:grid-cols-2
                           xl:grid-cols-4"
                >

                    {{-- Déposés --}}
                    <div
                        class="rounded-2xl border border-slate-200
                               bg-white p-5 shadow-sm
                               dark:border-slate-800 dark:bg-slate-900"
                    >

                        <div class="flex items-start justify-between">

                            <div>
                                <p class="text-sm text-slate-500
                                          dark:text-slate-400">
                                    À enregistrer
                                </p>

                                <p class="mt-2 text-3xl font-bold">
                                    {{ $courriersDeposes }}
                                </p>
                            </div>

                            <div
                                class="rounded-xl bg-yellow-100 p-3
                                       text-yellow-700
                                       dark:bg-yellow-950/40
                                       dark:text-yellow-400"
                            >
                                <svg class="h-6 w-6" fill="none"
                                     stroke="currentColor"
                                     viewBox="0 0 24 24">
                                    <path stroke-width="2"
                                          d="M12 8v4l3 2m6-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>

                        </div>

                    </div>


                    {{-- Enregistrés --}}
                    <div
                        class="rounded-2xl border border-slate-200
                               bg-white p-5 shadow-sm
                               dark:border-slate-800 dark:bg-slate-900"
                    >

                        <p class="text-sm text-slate-500 dark:text-slate-400">
                            Courriers enregistrés
                        </p>

                        <div class="mt-2 flex items-center justify-between">

                            <p class="text-3xl font-bold">
                                {{ $courriersEnregistres }}
                            </p>

                            <div
                                class="rounded-xl bg-green-100 p-3
                                       text-green-700
                                       dark:bg-green-950/40
                                       dark:text-green-400"
                            >
                                <svg class="h-6 w-6" fill="none"
                                     stroke="currentColor"
                                     viewBox="0 0 24 24">
                                    <path stroke-width="2"
                                          d="M5 13l4 4L19 7"/>
                                </svg>
                            </div>

                        </div>

                    </div>


                    {{-- Modification --}}
                    <div
                        class="rounded-2xl border border-slate-200
                               bg-white p-5 shadow-sm
                               dark:border-slate-800 dark:bg-slate-900"
                    >

                        <p class="text-sm text-slate-500 dark:text-slate-400">
                            À modifier
                        </p>

                        <div class="mt-2 flex items-center justify-between">

                            <p class="text-3xl font-bold">
                                {{ $courriersAModifier }}
                            </p>

                            <div
                                class="rounded-xl bg-red-100 p-3
                                       text-red-700
                                       dark:bg-red-950/40
                                       dark:text-red-400"
                            >
                                <svg class="h-6 w-6" fill="none"
                                     stroke="currentColor"
                                     viewBox="0 0 24 24">
                                    <path stroke-width="2"
                                          d="M12 9v2m0 4h.01M4.93 19h14.14c1.54 0 2.5-1.67 1.73-3L13.73 4a2 2 0 00-3.46 0L3.2 16c-.77 1.33.19 3 1.73 3z"/>
                                </svg>
                            </div>

                        </div>

                    </div>


                    {{-- Directeur --}}
                    <div
                        class="rounded-2xl border border-slate-200
                               bg-white p-5 shadow-sm
                               dark:border-slate-800 dark:bg-slate-900"
                    >

                        <p class="text-sm text-slate-500 dark:text-slate-400">
                            Transmis au directeur
                        </p>

                        <div class="mt-2 flex items-center justify-between">

                            <p class="text-3xl font-bold">
                                {{ $courriersDirecteur }}
                            </p>

                            <div
                                class="rounded-xl bg-blue-100 p-3
                                       text-blue-700
                                       dark:bg-blue-950/40
                                       dark:text-blue-400"
                            >
                                <svg class="h-6 w-6" fill="none"
                                     stroke="currentColor"
                                     viewBox="0 0 24 24">
                                    <path stroke-width="2"
                                          d="M12 19l9-7-9-7-9 7 9 7z"/>
                                </svg>
                            </div>

                        </div>

                    </div>

                </div>


                {{-- Actions rapides --}}
                <div class="mb-8">

                    <h3 class="mb-4 text-lg font-bold">
                        Actions rapides
                    </h3>

                    <div class="grid gap-4 sm:grid-cols-2 xl:grid-cols-4">

                        <a
                            href="#"
                            class="group rounded-2xl border
                                   border-slate-200 bg-white p-5
                                   shadow-sm transition hover:-translate-y-0.5
                                   hover:border-green-300 hover:shadow-md
                                   dark:border-slate-800
                                   dark:bg-slate-900
                                   dark:hover:border-green-800"
                        >

                            <div
                                class="mb-4 flex h-11 w-11 items-center
                                       justify-center rounded-xl
                                       bg-green-100 text-green-700
                                       dark:bg-green-950/40
                                       dark:text-green-400"
                            >
                                <svg class="h-5 w-5" fill="none"
                                     stroke="currentColor"
                                     viewBox="0 0 24 24">
                                    <path stroke-width="2"
                                          d="M12 4v16m8-8H4"/>
                                </svg>
                            </div>

                            <p class="font-semibold">
                                Enregistrer un courrier
                            </p>

                            <p class="mt-1 text-sm text-slate-500
                                      dark:text-slate-400">
                                Attribuer une référence officielle.
                            </p>

                        </a>


                        <a
                            href="#"
                            class="group rounded-2xl border
                                   border-slate-200 bg-white p-5
                                   shadow-sm transition hover:-translate-y-0.5
                                   hover:border-green-300 hover:shadow-md
                                   dark:border-slate-800
                                   dark:bg-slate-900
                                   dark:hover:border-green-800"
                        >

                            <div
                                class="mb-4 flex h-11 w-11 items-center
                                       justify-center rounded-xl
                                       bg-blue-100 text-blue-700
                                       dark:bg-blue-950/40
                                       dark:text-blue-400"
                            >
                                <svg class="h-5 w-5" fill="none"
                                     stroke="currentColor"
                                     viewBox="0 0 24 24">
                                    <path stroke-width="2"
                                          d="M4 6h16M4 12h16M4 18h16"/>
                                </svg>
                            </div>

                            <p class="font-semibold">
                                Tous les courriers
                            </p>

                            <p class="mt-1 text-sm text-slate-500
                                      dark:text-slate-400">
                                Consulter le registre des courriers.
                            </p>

                        </a>


                        <a
                            href="{{ route('courriers.create') }}"
                            class="group rounded-2xl border
                                   border-slate-200 bg-white p-5
                                   shadow-sm transition hover:-translate-y-0.5
                                   hover:border-green-300 hover:shadow-md
                                   dark:border-slate-800
                                   dark:bg-slate-900
                                   dark:hover:border-green-800"
                        >

                            <div
                                class="mb-4 flex h-11 w-11 items-center
                                       justify-center rounded-xl
                                       bg-yellow-100 text-yellow-700
                                       dark:bg-yellow-950/40
                                       dark:text-yellow-400"
                            >
                                <svg class="h-5 w-5" fill="none"
                                     stroke="currentColor"
                                     viewBox="0 0 24 24">
                                    <path stroke-width="2"
                                          d="M12 4v16m8-8H4"/>
                                </svg>
                            </div>

                            <p class="font-semibold">
                                Déposer un courrier
                            </p>

                            <p class="mt-1 text-sm text-slate-500
                                      dark:text-slate-400">
                                Déposer votre propre courrier.
                            </p>

                        </a>


                        <a
                            href="#"
                            class="group rounded-2xl border
                                   border-slate-200 bg-white p-5
                                   shadow-sm transition hover:-translate-y-0.5
                                   hover:border-green-300 hover:shadow-md
                                   dark:border-slate-800
                                   dark:bg-slate-900
                                   dark:hover:border-green-800"
                        >

                            <div
                                class="mb-4 flex h-11 w-11 items-center
                                       justify-center rounded-xl
                                       bg-purple-100 text-purple-700
                                       dark:bg-purple-950/40
                                       dark:text-purple-400"
                            >
                                <svg class="h-5 w-5" fill="none"
                                     stroke="currentColor"
                                     viewBox="0 0 24 24">
                                    <path stroke-width="2"
                                          d="M8 10h8m-8 4h5m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>

                            <p class="font-semibold">
                                Commentaires
                            </p>

                            <p class="mt-1 text-sm text-slate-500
                                      dark:text-slate-400">
                                Envoyer et consulter les commentaires.
                            </p>

                        </a>

                    </div>

                </div>


                {{-- Courriers récents --}}
                <div
                    class="overflow-hidden rounded-2xl border
                           border-slate-200 bg-white shadow-sm
                           dark:border-slate-800 dark:bg-slate-900"
                >

                    <div
                        class="flex flex-col gap-3 border-b
                               border-slate-200 p-5 sm:flex-row
                               sm:items-center sm:justify-between
                               dark:border-slate-800"
                    >

                        <div>
                            <h3 class="font-bold">
                                Courriers récents
                            </h3>

                            <p class="text-sm text-slate-500
                                      dark:text-slate-400">
                                Derniers courriers déposés sur la plateforme.
                            </p>
                        </div>

                        <a
                            href="#"
                            class="text-sm font-semibold text-green-600
                                   hover:text-green-700
                                   dark:text-green-400"
                        >
                            Voir tous →
                        </a>

                    </div>


                    {{-- Version desktop --}}
                    <div class="hidden overflow-x-auto md:block">

                        <table class="w-full text-left text-sm">

                            <thead
                                class="bg-slate-50 text-xs uppercase
                                       text-slate-500
                                       dark:bg-slate-950
                                       dark:text-slate-400"
                            >

                                <tr>
                                    <th class="px-5 py-4">Courrier</th>
                                    <th class="px-5 py-4">Expéditeur</th>
                                    <th class="px-5 py-4">Date</th>
                                    <th class="px-5 py-4">État</th>
                                    <th class="px-5 py-4 text-right">
                                        Action
                                    </th>
                                </tr>

                            </thead>

                            <tbody
                                class="divide-y divide-slate-100
                                       dark:divide-slate-800"
                            >

                                @forelse($courriersRecents as $courrier)

                                    <tr
                                        class="transition hover:bg-slate-50
                                               dark:hover:bg-slate-800/50"
                                    >

                                        <td class="px-5 py-4">

                                            <p class="font-semibold">
                                                {{ $courrier->nom }}
                                            </p>

                                            <p class="text-xs text-slate-500
                                                      dark:text-slate-400">
                                                {{ $courrier->numero ?? 'Non enregistré' }}
                                            </p>

                                        </td>

                                        <td class="px-5 py-4">
                                            {{ $courrier->expediteur->prenom }}
                                            {{ $courrier->expediteur->nom }}
                                        </td>

                                        <td class="px-5 py-4 text-slate-500
                                                   dark:text-slate-400">
                                            {{ $courrier->date_depot->format('d/m/Y H:i') }}
                                        </td>

                                        <td class="px-5 py-4">

                                            @if($courrier->statut === 'depose')

                                                <span
                                                    class="inline-flex rounded-full
                                                           bg-yellow-100 px-3 py-1
                                                           text-xs font-semibold
                                                           text-yellow-700
                                                           dark:bg-yellow-950/40
                                                           dark:text-yellow-400"
                                                >
                                                    Déposé
                                                </span>

                                            @elseif($courrier->statut === 'enregistre')

                                                <span
                                                    class="inline-flex rounded-full
                                                           bg-green-100 px-3 py-1
                                                           text-xs font-semibold
                                                           text-green-700
                                                           dark:bg-green-950/40
                                                           dark:text-green-400"
                                                >
                                                    Enregistré
                                                </span>

                                            @elseif($courrier->statut === 'a_modifier')

                                                <span
                                                    class="inline-flex rounded-full
                                                           bg-red-100 px-3 py-1
                                                           text-xs font-semibold
                                                           text-red-700
                                                           dark:bg-red-950/40
                                                           dark:text-red-400"
                                                >
                                                    À modifier
                                                </span>

                                            @else

                                                <span
                                                    class="inline-flex rounded-full
                                                           bg-blue-100 px-3 py-1
                                                           text-xs font-semibold
                                                           text-blue-700
                                                           dark:bg-blue-950/40
                                                           dark:text-blue-400"
                                                >
                                                    {{ ucfirst(str_replace('_', ' ', $courrier->statut)) }}
                                                </span>

                                            @endif

                                        </td>

                                        <td class="px-5 py-4 text-right">

                                            <a
                                                href="#"
                                                class="font-semibold text-green-600
                                                       hover:text-green-700
                                                       dark:text-green-400"
                                            >
                                                Consulter
                                            </a>

                                        </td>

                                    </tr>

                                @empty

                                    <tr>
                                        <td
                                            colspan="5"
                                            class="px-5 py-10 text-center
                                                   text-slate-500
                                                   dark:text-slate-400"
                                        >
                                            Aucun courrier pour le moment.
                                        </td>
                                    </tr>

                                @endforelse

                            </tbody>

                        </table>

                    </div>


                    {{-- Version mobile --}}
                    <div class="divide-y divide-slate-100 md:hidden
                                dark:divide-slate-800">

                        @forelse($courriersRecents as $courrier)

                            <div class="p-5">

                                <div class="flex items-start
                                            justify-between gap-4">

                                    <div class="min-w-0">

                                        <p class="truncate font-semibold">
                                            {{ $courrier->nom }}
                                        </p>

                                        <p class="mt-1 text-xs text-slate-500
                                                  dark:text-slate-400">
                                            {{ $courrier->expediteur->prenom }}
                                            {{ $courrier->expediteur->nom }}
                                        </p>

                                    </div>

                                    <span
                                        class="shrink-0 rounded-full
                                               bg-yellow-100 px-2.5 py-1
                                               text-xs font-semibold
                                               text-yellow-700
                                               dark:bg-yellow-950/40
                                               dark:text-yellow-400"
                                    >
                                        {{ ucfirst(str_replace('_', ' ', $courrier->statut)) }}
                                    </span>

                                </div>

                                <div
                                    class="mt-3 flex items-center
                                           justify-between text-xs
                                           text-slate-500
                                           dark:text-slate-400"
                                >

                                    <span>
                                        {{ $courrier->date_depot->format('d/m/Y H:i') }}
                                    </span>

                                    <a
                                        href="#"
                                        class="font-semibold text-green-600
                                               dark:text-green-400"
                                    >
                                        Consulter
                                    </a>

                                </div>

                            </div>

                        @empty

                            <div class="p-8 text-center text-sm
                                        text-slate-500 dark:text-slate-400">
                                Aucun courrier pour le moment.
                            </div>

                        @endforelse

                    </div>

                </div>

            </div>

        </main>

    </div>

</div>

@endsection
