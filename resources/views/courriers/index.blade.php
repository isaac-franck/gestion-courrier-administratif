@extends('layouts.app')

@php
    $statuts = [
        'depose' => [
            'label' => 'Déposé',
            'class' => 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900/30 dark:text-yellow-400'
        ],

        'enregistre' => [
            'label' => 'Enregistré',
            'class' => 'bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-400'
        ],

        'transmis_directeur' => [
            'label' => 'Transmis au directeur',
            'class' => 'bg-blue-100 text-blue-800 dark:bg-blue-900/30 dark:text-blue-400'
        ],

        'valide' => [
            'label' => 'Validé',
            'class' => 'bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-400'
        ],

        'transmis_destinataire' => [
            'label' => 'Transmis au destinataire',
            'class' => 'bg-indigo-100 text-indigo-800 dark:bg-indigo-900/30 dark:text-indigo-400'
        ],

        'a_modifier' => [
            'label' => 'À modifier',
            'class' => 'bg-orange-100 text-orange-800 dark:bg-orange-900/30 dark:text-orange-400'
        ],

        'rejete' => [
            'label' => 'Rejeté',
            'class' => 'bg-red-100 text-red-800 dark:bg-red-900/30 dark:text-red-400'
        ],
    ];
@endphp

@section('content')



<div class="min-h-screen bg-slate-50 dark:bg-slate-950 transition-colors duration-300">

    {{-- HEADER --}}
    <div class="border-b border-slate-200 dark:border-slate-800
                bg-white dark:bg-slate-900">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

            <div class="flex flex-col lg:flex-row
                        lg:items-center lg:justify-between gap-6">

                <div>

                    <div class="flex items-center gap-3">

                        <div class="w-11 h-11 rounded-xl
                                    bg-green-100 dark:bg-green-900/30
                                    flex items-center justify-center">

                            <svg class="w-6 h-6 text-green-600
                                        dark:text-green-400"
                                 fill="none"
                                 stroke="currentColor"
                                 viewBox="0 0 24 24">

                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M3 8l9 6 9-6M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>

                            </svg>

                        </div>

                        <div>

                            <a 
                             href="{{ Auth::user()->role === 'secretaire'
                             ? route('secretaire.dashboard')
                               : route('directeur.dashboard') }}"
   class="inline-flex items-center gap-2 px-4 py-2.5
          rounded-xl
          bg-green-600 hover:bg-green-700
          text-white font-semibold
          shadow-sm hover:shadow-md
          transition-all duration-200">

    <svg xmlns="http://www.w3.org/2000/svg"
         class="w-5 h-5"
         fill="none"
         viewBox="0 0 24 24"
         stroke="currentColor"
         stroke-width="2">
        <path stroke-linecap="round"
              stroke-linejoin="round"
              d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
    </svg>

    Retour au dashboard
</a>

                            <h1 class="text-2xl sm:text-3xl font-bold
                                       text-slate-900 dark:text-white">

                                Tous les courriers

                            </h1>

                            <p class="text-sm text-slate-500
                                      dark:text-slate-400 mt-1">

                                Consultez et recherchez les courriers
                                enregistrés sur la plateforme.

                            </p>

                        </div>

                    </div>

                </div>

                {{-- COMPTEUR --}}

                <div class="flex items-center gap-3">

                    <div class="px-4 py-3 rounded-xl
                                bg-green-50 dark:bg-green-900/20
                                border border-green-100
                                dark:border-green-900/40">

                        <p class="text-xs font-medium
                                  text-green-700 dark:text-green-400">

                            Courriers trouvés

                        </p>

                        <p class="text-xl font-bold
                                  text-green-800 dark:text-green-300">

                            {{ $courriers->total() }}

                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>


    {{-- CONTENU --}}

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">


        {{-- FILTRES --}}

        <div class="bg-white dark:bg-slate-900
                    border border-slate-200 dark:border-slate-800
                    rounded-2xl shadow-sm p-5 mb-6">

            <form method="GET"
                  action="{{ request()->url() }}">

                <div class="grid grid-cols-1 md:grid-cols-2
                            lg:grid-cols-12 gap-4">


                    {{-- RECHERCHE --}}

                    <div class="lg:col-span-5">

                        <label class="block text-sm font-semibold
                                      text-slate-700 dark:text-slate-300 mb-2">

                            Rechercher

                        </label>

                        <div class="relative">

                            <svg class="absolute left-3 top-1/2
                                        -translate-y-1/2
                                        w-5 h-5 text-slate-400"
                                 fill="none"
                                 stroke="currentColor"
                                 viewBox="0 0 24 24">

                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      stroke-width="2"
                                      d="m21 21-4.35-4.35m1.35-5.65a7 7 0 11-14 0 7 7 0 0114 0z"/>

                            </svg>

                            <input
                                type="text"
                                name="recherche"
                                value="{{ request('recherche') }}"
                                placeholder="Nom, numéro, expéditeur..."
                                class="w-full pl-10 pr-4 py-3 rounded-xl
                                       border border-slate-300
                                       dark:border-slate-700
                                       bg-slate-50 dark:bg-slate-800
                                       text-slate-900 dark:text-white
                                       placeholder-slate-400
                                       focus:ring-2 focus:ring-green-500
                                       focus:border-green-500
                                       outline-none transition"
                            >

                        </div>

                    </div>


                    {{-- STATUT --}}

                    <div class="lg:col-span-3">

                        <label class="block text-sm font-semibold
                                      text-slate-700 dark:text-slate-300 mb-2">

                            État

                        </label>

                        <select
                            name="statut"
                            class="w-full py-3 px-4 rounded-xl
                                   border border-slate-300
                                   dark:border-slate-700
                                   bg-slate-50 dark:bg-slate-800
                                   text-slate-900 dark:text-white
                                   focus:ring-2 focus:ring-green-500
                                   focus:border-green-500
                                   outline-none">

                            <option value="">Tous les états</option>

                            <option value="depose"
                                @selected(request('statut') === 'depose')>
                                Déposé
                            </option>

                            <option value="a_modifier"
                                @selected(request('statut') === 'a_modifier')>
                                À modifier
                            </option>

                            <option value="enregistre"
                                @selected(request('statut') === 'enregistre')>
                                Enregistré
                            </option>

                            <option value="transmis_directeur"
                                @selected(request('statut') === 'transmis_directeur')>
                                Transmis au directeur
                            </option>

                            <option value="valide"
                                @selected(request('statut') === 'valide')>
                                Validé
                            </option>

                            <option value="transmis_destinataire"
                                @selected(request('statut') === 'transmis_destinataire')>
                                Transmis au destinataire
                            </option>

                            <option value="rejete"
                                @selected(request('statut') === 'rejete')>
                                Rejeté
                            </option>

                        </select>

                    </div>


                    {{-- TRI --}}

                    <div class="lg:col-span-2">

                        <label class="block text-sm font-semibold
                                      text-slate-700 dark:text-slate-300 mb-2">

                            Trier par

                        </label>

                        <select
                            name="tri"
                            class="w-full py-3 px-4 rounded-xl
                                   border border-slate-300
                                   dark:border-slate-700
                                   bg-slate-50 dark:bg-slate-800
                                   text-slate-900 dark:text-white
                                   focus:ring-2 focus:ring-green-500
                                   outline-none">

                            <option value="date_depot"
                                @selected($tri === 'date_depot')>
                                Date de dépôt
                            </option>

                            <option value="date_courrier"
                                @selected($tri === 'date_courrier')>
                                Date du courrier
                            </option>

                        </select>

                    </div>


                    {{-- ORDRE --}}

                    <div class="lg:col-span-2">

                        <label class="block text-sm font-semibold
                                      text-slate-700 dark:text-slate-300 mb-2">

                            Ordre

                        </label>

                        <select
                            name="ordre"
                            class="w-full py-3 px-4 rounded-xl
                                   border border-slate-300
                                   dark:border-slate-700
                                   bg-slate-50 dark:bg-slate-800
                                   text-slate-900 dark:text-white
                                   focus:ring-2 focus:ring-green-500
                                   outline-none">

                            <option value="desc"
                                @selected($ordre === 'desc')>
                                Plus récent
                            </option>

                            <option value="asc"
                                @selected($ordre === 'asc')>
                                Plus ancien
                            </option>

                        </select>

                    </div>

                </div>


                {{-- BOUTONS --}}

                <div class="flex flex-wrap items-center gap-3 mt-5">

                    <button
                        type="submit"
                        class="inline-flex items-center gap-2
                               px-5 py-2.5 rounded-xl
                               bg-green-600 hover:bg-green-700
                               text-white font-semibold
                               transition shadow-sm">

                        <svg class="w-5 h-5"
                             fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24">

                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="2"
                                  d="m21 21-4.35-4.35m1.35-5.65a7 7 0 11-14 0 7 7 0 0114 0z"/>

                        </svg>

                        Rechercher

                    </button>


                    <a
                        href="{{ request()->url() }}"
                        class="inline-flex items-center gap-2
                               px-5 py-2.5 rounded-xl
                               border border-slate-300
                               dark:border-slate-700
                               text-slate-700 dark:text-slate-300
                               hover:bg-slate-100
                               dark:hover:bg-slate-800
                               font-semibold transition">

                        Réinitialiser

                    </a>

                </div>

            </form>

        </div>


        {{-- TABLEAU --}}

        <div class="bg-white dark:bg-slate-900
                    border border-slate-200 dark:border-slate-800
                    rounded-2xl shadow-sm overflow-hidden">


            {{-- VERSION DESKTOP --}}

            <div class="hidden md:block overflow-x-auto">

                <table class="w-full">

                    <thead class="bg-slate-50 dark:bg-slate-800/70">

                        <tr>

                            <th class="px-6 py-4 text-left text-xs
                                       font-bold uppercase tracking-wider
                                       text-slate-500 dark:text-slate-400">

                                Numéro

                            </th>

                            <th class="px-6 py-4 text-left text-xs
                                       font-bold uppercase tracking-wider
                                       text-slate-500 dark:text-slate-400">

                                Courrier

                            </th>

                            <th class="px-6 py-4 text-left text-xs
                                       font-bold uppercase tracking-wider
                                       text-slate-500 dark:text-slate-400">

                                Expéditeur

                            </th>

                            <th class="px-6 py-4 text-left text-xs
                                       font-bold uppercase tracking-wider
                                       text-slate-500 dark:text-slate-400">

                                Destinataire

                            </th>

                            <th class="px-6 py-4 text-left text-xs
                                       font-bold uppercase tracking-wider
                                       text-slate-500 dark:text-slate-400">

                                Date

                            </th>

                            <th class="px-6 py-4 text-left text-xs
                                       font-bold uppercase tracking-wider
                                       text-slate-500 dark:text-slate-400">

                                État

                            </th>

                            <th class="px-6 py-4 text-right text-xs
                                       font-bold uppercase tracking-wider
                                       text-slate-500 dark:text-slate-400">

                                Action

                            </th>

                        </tr>

                    </thead>


                    <tbody class="divide-y divide-slate-200
                                  dark:divide-slate-800">

                        @forelse($courriers as $courrier)

                        @php
    $statut = $statuts[$courrier->statut] ?? [
        'label' => ucfirst(str_replace('_', ' ', $courrier->statut)),
        'class' => 'bg-slate-100 text-slate-800 dark:bg-slate-800 dark:text-slate-300'
    ];
@endphp

                            <tr class="hover:bg-green-50/40
                                       dark:hover:bg-green-900/10
                                       transition">

                                {{-- NUMERO --}}

                                <td class="px-6 py-5">

                                    @if($courrier->numero)

                                        <span class="font-semibold
                                                     text-slate-900
                                                     dark:text-white">

                                            {{ $courrier->numero }}

                                        </span>

                                    @else

                                        <span class="text-slate-400">
                                            —
                                        </span>

                                    @endif

                                </td>


                                {{-- COURRIER --}}

                                <td class="px-6 py-5">

                                    <div class="max-w-xs">

                                        <p class="font-semibold
                                                  text-slate-900
                                                  dark:text-white
                                                  truncate">

                                            {{ $courrier->nom }}

                                        </p>

                                        <p class="text-xs text-slate-500
                                                  dark:text-slate-400 mt-1">

                                            Déposé le

                                            {{ $courrier->date_depot
                                                ? $courrier->date_depot->format('d/m/Y')
                                                : '—'
                                            }}

                                        </p>

                                    </div>

                                </td>


                                {{-- EXPEDITEUR --}}

                                <td class="px-6 py-5">

                                    <div>

                                        <p class="font-medium
                                                  text-slate-800
                                                  dark:text-slate-200">

                                            {{ $courrier->expediteur?->prenom }}
                                            {{ $courrier->expediteur?->nom }}

                                        </p>

                                        <p class="text-xs text-slate-500
                                                  dark:text-slate-400">

                                            {{ $courrier->expediteur?->role }}

                                        </p>

                                    </div>

                                </td>


                                {{-- DESTINATAIRE --}}

                                <td class="px-6 py-5">

                                    @if($courrier->destinataire)

                                        <p class="font-medium
                                                  text-slate-800
                                                  dark:text-slate-200">

                                            {{ $courrier->destinataire->prenom }}
                                            {{ $courrier->destinataire->nom }}

                                        </p>

                                    @else

                                        <span class="text-sm text-slate-400">
                                            Non attribué
                                        </span>

                                    @endif

                                </td>


                                {{-- DATE --}}

                                <td class="px-6 py-5">

                                    <span class="text-sm text-slate-600
                                                 dark:text-slate-300">

                                        {{ $courrier->date_courrier
                                            ? $courrier->date_courrier->format('d/m/Y')
                                            : '—'
                                        }}

                                    </span>

                                </td>


                                {{-- ETAT --}}

                                <td class="px-6 py-5">

                                    

                                    <span class="inline-flex items-center
                                                 px-2.5 py-1 rounded-full
                                                 text-xs font-bold
                                                 {{ $statut['class'] }}">

                                        {{ $statut['label'] }}

                                    </span>

                                </td>


                                {{-- ACTION --}}

                                <td class="px-6 py-5 text-right">

                                    <div class="flex justify-end gap-2">

                                        @if(
                                            auth()->user()->role === 'secretaire'
                                            && $courrier->statut === 'depose'
                                        )

                                            <a
                                                href="{{ route(
                                                    'secretaire.courriers.enregistrer',
                                                    $courrier
                                                ) }}"
                                                class="inline-flex items-center
                                                       gap-1.5 px-3 py-2
                                                       rounded-lg
                                                       bg-green-600
                                                       hover:bg-green-700
                                                       text-white text-sm
                                                       font-semibold transition">

                                                Enregistrer

                                            </a>

                                            <button
                                                type="button"
                                                class="inline-flex items-center
                                                       gap-1.5 px-3 py-2
                                                       rounded-lg
                                                       border border-slate-300
                                                       dark:border-slate-700
                                                       text-slate-700
                                                       dark:text-slate-300
                                                       hover:bg-slate-100
                                                       dark:hover:bg-slate-800
                                                       text-sm font-semibold
                                                       transition">

                                                <a href="{{ route('courriers.show', $courrier) }}"
                                                class="text-slate-700
                                                       dark:text-slate-300"
                                                       >
                                                       Consulter
                                                    </a>

                                            </button>

                                        @else

                                            <button
                                                type="button"
                                                class="inline-flex items-center
                                                       gap-1.5 px-3 py-2
                                                       rounded-lg
                                                       border border-slate-300
                                                       dark:border-slate-700
                                                       text-slate-700
                                                       dark:text-slate-300
                                                       hover:bg-slate-100
                                                       dark:hover:bg-slate-800
                                                       text-sm font-semibold
                                                       transition">

                                                <a href="{{ route('courriers.show', $courrier) }}"
                                                class="text-slate-700
                                                       dark:text-slate-300"
                                                       >
                                                       Consulter
                                                    </a>

                                            </button>

                                        @endif

                                    </div>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="7"
                                    class="px-6 py-16 text-center">

                                    <div class="flex flex-col
                                                items-center">

                                        <div class="w-14 h-14 rounded-2xl
                                                    bg-slate-100
                                                    dark:bg-slate-800
                                                    flex items-center
                                                    justify-center mb-4">

                                            <svg class="w-7 h-7
                                                        text-slate-400"
                                                 fill="none"
                                                 stroke="currentColor"
                                                 viewBox="0 0 24 24">

                                                <path stroke-linecap="round"
                                                      stroke-linejoin="round"
                                                      stroke-width="2"
                                                      d="M20 13V7a2 2 0 00-2-2h-4l-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2v-2"/>

                                            </svg>

                                        </div>

                                        <h3 class="font-semibold
                                                   text-slate-900
                                                   dark:text-white">

                                            Aucun courrier trouvé

                                        </h3>

                                        <p class="text-sm text-slate-500
                                                  dark:text-slate-400 mt-1">

                                            Essayez de modifier vos critères
                                            de recherche.

                                        </p>

                                    </div>

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>


            {{-- VERSION MOBILE --}}

            <div class="md:hidden divide-y
                        divide-slate-200 dark:divide-slate-800">

                @forelse($courriers as $courrier)

                

                    <div class="p-5">

                        <div class="flex items-start
                                    justify-between gap-4">

                            <div class="min-w-0">

                                <p class="font-bold text-slate-900
                                          dark:text-white truncate">

                                    {{ $courrier->nom }}

                                </p>

                                <p class="text-xs text-slate-500
                                          dark:text-slate-400 mt-1">

                                    {{ $courrier->numero ?? 'Numéro non attribué' }}

                                </p>

                            </div>

                            @php

                                $statut = $statuts[$courrier->statut]
                                    ?? [
                                        'label' => ucfirst($courrier->statut),
                                        'class' => 'bg-slate-100 text-slate-700'
                                    ];

                            @endphp

                            <span class="shrink-0 inline-flex
                                         px-2.5 py-1 rounded-full
                                         text-xs font-bold
                                         {{ $statut['class'] }}">

                                {{ $statut['label'] }}

                            </span>

                        </div>


                        <div class="grid grid-cols-2 gap-4 mt-5">

                            <div>

                                <p class="text-xs text-slate-400">
                                    Expéditeur
                                </p>

                                <p class="text-sm font-medium
                                          text-slate-800
                                          dark:text-slate-200 mt-1">

                                    {{ $courrier->expediteur?->prenom }}
                                    {{ $courrier->expediteur?->nom }}

                                </p>

                            </div>


                            <div>

                                <p class="text-xs text-slate-400">
                                    Date
                                </p>

                                <p class="text-sm font-medium
                                          text-slate-800
                                          dark:text-slate-200 mt-1">

                                    {{ $courrier->date_courrier
                                        ? $courrier->date_courrier->format('d/m/Y')
                                        : '—'
                                    }}

                                </p>

                            </div>

                        </div>


                        <div class="mt-5">

                            @if(
                                auth()->user()->role === 'secretaire'
                                && $courrier->statut === 'depose'
                            )

                                <a
                                    href="{{ route(
                                        'secretaire.courriers.enregistrer',
                                        $courrier
                                    ) }}"
                                    class="block text-center px-4 py-2.5
                                           rounded-xl bg-green-600
                                           hover:bg-green-700
                                           text-white font-semibold
                                           transition">

                                    Enregistrer le courrier

                                </a>

                            @else

                                <button
                                    type="button"
                                    class="w-full px-4 py-2.5 rounded-xl
                                           border border-slate-300
                                           dark:border-slate-700
                                           text-slate-700
                                           dark:text-slate-300
                                           font-semibold">

                                    Consulter

                                </button>

                            @endif

                        </div>

                    </div>

                @empty

                    <div class="p-10 text-center text-slate-500">

                        Aucun courrier trouvé.

                    </div>

                @endforelse

            </div>


            {{-- PAGINATION --}}

            @if($courriers->hasPages())

                <div class="px-6 py-5 border-t
                            border-slate-200 dark:border-slate-800">

                    {{ $courriers->links() }}

                </div>

            @endif

        </div>

    </div>

</div>

@endsection