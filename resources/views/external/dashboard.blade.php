
@extends('external.layouts.dashboard')

@section('title', 'Tableau de bord')

@section('page-title', 'Tableau de bord')

@section('content')

    <!-- ============================== -->
    <!-- BIENVENUE -->
    <!-- ============================== -->

    <div class="relative overflow-hidden
                rounded-3xl
                bg-gradient-to-br
                from-green-700 via-green-600 to-green-800
                p-6 sm:p-8
                text-white
                shadow-xl shadow-green-900/10
                mb-8">

        <!-- Décor -->

        <div class="absolute -right-10 -top-10
                    w-48 h-48
                    rounded-full
                    bg-yellow-400/20">
        </div>

        <div class="absolute right-20 bottom-[-60px]
                    w-40 h-40
                    rounded-full
                    bg-white/10">
        </div>


        <div class="relative z-10
                    flex flex-col lg:flex-row
                    lg:items-center
                    lg:justify-between
                    gap-6">

            <div>

                <div class="flex items-center gap-2 mb-3">

                    <span class="w-2 h-2
                                 rounded-full
                                 bg-yellow-400">
                    </span>

                    <span class="text-green-100 text-sm">
                        Espace utilisateur externe
                    </span>

                </div>


                <h1 class="text-2xl sm:text-3xl
                           font-bold mb-2">

                    Bonjour, {{ auth()->user()->nom ?? 'Utilisateur' }} 👋

                </h1>

                <p class="text-green-100 max-w-xl">

                    Gérez facilement vos courriers administratifs,
                    consultez vos réponses et restez informé
                    de l'évolution de vos demandes.

                </p>

            </div>


            <div class="hidden md:flex
                        w-20 h-20
                        rounded-2xl
                        bg-white/10
                        border border-white/20
                        items-center justify-center">

                <svg class="w-10 h-10 text-yellow-300"
                     fill="none"
                     stroke="currentColor"
                     viewBox="0 0 24 24">

                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="1.5"
                          d="M3 8l9 6 9-6M5 19h14a2
                             2 0 002-2V7a2 2 0
                             00-2-2H5a2 2 0
                             00-2 2v10a2 2 0
                             002 2z"/>

                </svg>

            </div>

        </div>

    </div>


    <!-- ============================== -->
    <!-- STATISTIQUES -->
    <!-- ============================== -->

    <div class="grid grid-cols-1
                sm:grid-cols-2
                xl:grid-cols-4
                gap-5 mb-8">


        <!-- Courriers -->

        <div class="bg-white dark:bg-gray-900
                    border border-gray-200
                    dark:border-gray-800
                    rounded-2xl p-5
                    hover:-translate-y-1
                    transition duration-300">

            <div class="flex items-start justify-between">

                <div>

                    <p class="text-sm
                              text-gray-500
                              dark:text-gray-400">

                        Courriers envoyés
                    </p>

                    <h3 class="text-3xl font-bold mt-2">
                        24
                    </h3>

                </div>

                <div class="w-11 h-11
                            rounded-xl
                            bg-green-100
                            dark:bg-green-900/30
                            text-green-600
                            dark:text-green-400
                            flex items-center justify-center">

                    <svg class="w-6 h-6"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M3 8l9 6 9-6M5 19h14a2
                                 2 0 002-2V7a2 2 0
                                 00-2-2H5a2 2 0
                                 00-2 2v10a2 2 0
                                 002 2z"/>

                    </svg>

                </div>

            </div>

            <div class="mt-4 flex items-center gap-2
                        text-xs text-green-600">

                <span>+12%</span>

                <span class="text-gray-400">
                    ce mois-ci
                </span>

            </div>

        </div>


        <!-- Réponses -->

        <div class="bg-white dark:bg-gray-900
                    border border-gray-200
                    dark:border-gray-800
                    rounded-2xl p-5
                    hover:-translate-y-1
                    transition duration-300">

            <div class="flex items-start justify-between">

                <div>

                    <p class="text-sm
                              text-gray-500
                              dark:text-gray-400">

                        Réponses reçues
                    </p>

                    <h3 class="text-3xl font-bold mt-2">
                        16
                    </h3>

                </div>

                <div class="w-11 h-11
                            rounded-xl
                            bg-yellow-100
                            dark:bg-yellow-900/30
                            text-yellow-600
                            dark:text-yellow-400
                            flex items-center justify-center">

                    <svg class="w-6 h-6"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M7 8h10M7 12h6m8-5a9
                                 9 0 11-18 0 9 9 0
                                 0118 0z"/>

                    </svg>

                </div>

            </div>

            <div class="mt-4 text-xs text-gray-400">

                Dernière réponse : aujourd'hui

            </div>

        </div>


        <!-- En attente -->

        <div class="bg-white dark:bg-gray-900
                    border border-gray-200
                    dark:border-gray-800
                    rounded-2xl p-5
                    hover:-translate-y-1
                    transition duration-300">

            <div class="flex items-start justify-between">

                <div>

                    <p class="text-sm
                              text-gray-500
                              dark:text-gray-400">

                        En attente
                    </p>

                    <h3 class="text-3xl font-bold mt-2">
                        5
                    </h3>

                </div>

                <div class="w-11 h-11
                            rounded-xl
                            bg-orange-100
                            dark:bg-orange-900/30
                            text-orange-600
                            dark:text-orange-400
                            flex items-center justify-center">

                    <svg class="w-6 h-6"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M12 8v4l3 2m6-2
                                 a9 9 0 11-18 0
                                 9 9 0 0118 0z"/>

                    </svg>

                </div>

            </div>

            <div class="mt-4 text-xs text-orange-500">

                Courriers en cours de traitement

            </div>

        </div>


        <!-- Notifications -->

        <div class="bg-white dark:bg-gray-900
                    border border-gray-200
                    dark:border-gray-800
                    rounded-2xl p-5
                    hover:-translate-y-1
                    transition duration-300">

            <div class="flex items-start justify-between">

                <div>

                    <p class="text-sm
                              text-gray-500
                              dark:text-gray-400">

                        Notifications
                    </p>

                    <h3 class="text-3xl font-bold mt-2">
                        3
                    </h3>

                </div>

                <div class="w-11 h-11
                            rounded-xl
                            bg-green-100
                            dark:bg-green-900/30
                            text-green-600
                            dark:text-green-400
                            flex items-center justify-center">

                    <svg class="w-6 h-6"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M15 17h5l-1.5-1.5A2
                                 2 0 0118 14v-3a6 6
                                 0 00-12 0v3a2 2
                                 0 01-.5 1.5L4
                                 17h5m6 0a3 3 0
                                 01-6 0"/>

                    </svg>

                </div>

            </div>

            <div class="mt-4 text-xs text-green-600">

                3 nouvelles notifications

            </div>

        </div>

    </div>


    <!-- ============================== -->
    <!-- ACTIONS RAPIDES -->
    <!-- ============================== -->

    <div class="mb-8">

        <div class="flex items-center justify-between mb-4">

            <div>

                <h2 class="text-lg font-bold">
                    Actions rapides
                </h2>

                <p class="text-sm text-gray-500
                          dark:text-gray-400">

                    Effectuez rapidement une opération

                </p>

            </div>

        </div>


        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">


            <!-- Déposer -->

            <a href="#"
               class="group relative overflow-hidden
                      bg-white dark:bg-gray-900
                      border border-gray-200
                      dark:border-gray-800
                      rounded-2xl p-6
                      hover:border-green-500
                      transition">

                <div class="flex items-center gap-5">

                    <div class="w-14 h-14
                                rounded-2xl
                                bg-green-100
                                dark:bg-green-900/30
                                text-green-600
                                dark:text-green-400
                                flex items-center justify-center
                                group-hover:scale-110
                                transition">

                        <svg class="w-7 h-7"
                             fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24">

                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M12 4v16m8-8H4"/>

                        </svg>

                    </div>


                    <div class="flex-1">

                        <h3 class="font-bold text-lg">
                            Déposer un courrier
                        </h3>

                        <p class="text-sm text-gray-500
                                  dark:text-gray-400 mt-1">

                            Envoyer un nouveau courrier
                            à l'administration.

                        </p>

                    </div>


                    <svg class="w-5 h-5
                                text-gray-400
                                group-hover:text-green-600
                                transition"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M9 5l7 7-7 7"/>

                    </svg>

                </div>

            </a>


            <!-- Répondre -->

            <a href="#"
               class="group relative overflow-hidden
                      bg-white dark:bg-gray-900
                      border border-gray-200
                      dark:border-gray-800
                      rounded-2xl p-6
                      hover:border-yellow-400
                      transition">

                <div class="flex items-center gap-5">

                    <div class="w-14 h-14
                                rounded-2xl
                                bg-yellow-100
                                dark:bg-yellow-900/30
                                text-yellow-600
                                dark:text-yellow-400
                                flex items-center justify-center
                                group-hover:scale-110
                                transition">

                        <svg class="w-7 h-7"
                             fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24">

                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M20 12H4m0 0l6-6m-6
                                     6l6 6"/>

                        </svg>

                    </div>


                    <div class="flex-1">

                        <h3 class="font-bold text-lg">
                            Répondre à un courrier
                        </h3>

                        <p class="text-sm text-gray-500
                                  dark:text-gray-400 mt-1">

                            Envoyer une réponse à un
                            courrier reçu.

                        </p>

                    </div>


                    <svg class="w-5 h-5
                                text-gray-400
                                group-hover:text-yellow-500
                                transition"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M9 5l7 7-7 7"/>

                    </svg>

                </div>

            </a>

        </div>

    </div>


    <!-- ============================== -->
    <!-- COURRIERS RECENTS -->
    <!-- ============================== -->

    <div class="bg-white dark:bg-gray-900
                border border-gray-200
                dark:border-gray-800
                rounded-2xl overflow-hidden">

        <div class="p-5 sm:p-6
                    flex flex-col sm:flex-row
                    sm:items-center
                    sm:justify-between
                    gap-3
                    border-b border-gray-200
                    dark:border-gray-800">

            <div>

                <h2 class="font-bold text-lg">
                    Mes courriers récents
                </h2>

                <p class="text-sm text-gray-500
                          dark:text-gray-400">

                    Suivi des derniers courriers envoyés

                </p>

            </div>


            <a href="#"
               class="text-sm font-semibold
                      text-green-600
                      hover:text-green-700">

                Voir tous les courriers →

            </a>

        </div>


        <!-- TABLE DESKTOP -->

        <div class="hidden md:block overflow-x-auto">

            <table class="w-full">

                <thead>

                    <tr class="text-left
                               text-xs uppercase
                               tracking-wider
                               text-gray-500
                               dark:text-gray-400
                               bg-gray-50
                               dark:bg-gray-800/50">

                        <th class="px-6 py-4">
                            Référence
                        </th>

                        <th class="px-6 py-4">
                            Objet
                        </th>

                        <th class="px-6 py-4">
                            Date
                        </th>

                        <th class="px-6 py-4">
                            Statut
                        </th>

                        <th class="px-6 py-4 text-right">
                            Action
                        </th>

                    </tr>

                </thead>


                <tbody class="divide-y
                             divide-gray-100
                             dark:divide-gray-800">


                    <!-- COURRIER 1 -->

                    <tr class="hover:bg-gray-50
                               dark:hover:bg-gray-800/50
                               transition">

                        <td class="px-6 py-5
                                   font-semibold">

                            CEN-2026-00421

                        </td>

                        <td class="px-6 py-5">

                            Demande de partenariat

                        </td>

                        <td class="px-6 py-5
                                   text-gray-500
                                   dark:text-gray-400">

                            08 sept. 2026

                        </td>

                        <td class="px-6 py-5">

                            <span class="inline-flex
                                         px-3 py-1
                                         rounded-full
                                         text-xs font-semibold
                                         bg-green-100
                                         text-green-700
                                         dark:bg-green-900/30
                                         dark:text-green-400">

                                Traité

                            </span>

                        </td>

                        <td class="px-6 py-5 text-right">

                            <a href="#"
                               class="text-green-600
                                      hover:text-green-700
                                      font-semibold
                                      text-sm">

                                Consulter

                            </a>

                        </td>

                    </tr>


                    <!-- COURRIER 2 -->

                    <tr class="hover:bg-gray-50
                               dark:hover:bg-gray-800/50
                               transition">

                        <td class="px-6 py-5
                                   font-semibold">

                            CEN-2026-00418

                        </td>

                        <td class="px-6 py-5">

                            Demande d'information

                        </td>

                        <td class="px-6 py-5
                                   text-gray-500
                                   dark:text-gray-400">

                            05 sept. 2026

                        </td>

                        <td class="px-6 py-5">

                            <span class="inline-flex
                                         px-3 py-1
                                         rounded-full
                                         text-xs font-semibold
                                         bg-yellow-100
                                         text-yellow-700
                                         dark:bg-yellow-900/30
                                         dark:text-yellow-400">

                                En cours

                            </span>

                        </td>

                        <td class="px-6 py-5 text-right">

                            <a href="#"
                               class="text-green-600
                                      hover:text-green-700
                                      font-semibold
                                      text-sm">

                                Consulter

                            </a>

                        </td>

                    </tr>


                    <!-- COURRIER 3 -->

                    <tr class="hover:bg-gray-50
                               dark:hover:bg-gray-800/50
                               transition">

                        <td class="px-6 py-5
                                   font-semibold">

                            CEN-2026-00412

                        </td>

                        <td class="px-6 py-5">

                            Demande administrative

                        </td>

                        <td class="px-6 py-5
                                   text-gray-500
                                   dark:text-gray-400">

                            02 sept. 2026

                        </td>

                        <td class="px-6 py-5">

                            <span class="inline-flex
                                         px-3 py-1
                                         rounded-full
                                         text-xs font-semibold
                                         bg-gray-100
                                         text-gray-600
                                         dark:bg-gray-800
                                         dark:text-gray-400">

                                Reçu

                            </span>

                        </td>

                        <td class="px-6 py-5 text-right">

                            <a href="#"
                               class="text-green-600
                                      hover:text-green-700
                                      font-semibold
                                      text-sm">

                                Consulter

                            </a>

                        </td>

                    </tr>

                </tbody>

            </table>

        </div>


        <!-- VERSION MOBILE -->

        <div class="md:hidden divide-y
                    divide-gray-100
                    dark:divide-gray-800">

            <div class="p-5">

                <div class="flex justify-between">

                    <span class="font-semibold">
                        CEN-2026-00421
                    </span>

                    <span class="px-2 py-1
                                 rounded-full
                                 text-xs
                                 bg-green-100
                                 text-green-700">

                        Traité

                    </span>

                </div>

                <p class="mt-2 text-sm">
                    Demande de partenariat
                </p>

                <p class="mt-1 text-xs text-gray-500">
                    08 septembre 2026
                </p>

            </div>


            <div class="p-5">

                <div class="flex justify-between">

                    <span class="font-semibold">
                        CEN-2026-00418
                    </span>

                    <span class="px-2 py-1
                                 rounded-full
                                 text-xs
                                 bg-yellow-100
                                 text-yellow-700">

                        En cours

                    </span>

                </div>

                <p class="mt-2 text-sm">
                    Demande d'information
                </p>

                <p class="mt-1 text-xs text-gray-500">
                    05 septembre 2026
                </p>

            </div>

        </div>

    </div>

@endsection