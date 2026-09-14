@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-slate-50 dark:bg-slate-950 py-8">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- EN-TÊTE --}}
        <div class="flex flex-col sm:flex-row sm:items-center
                    sm:justify-between gap-4 mb-8">

            <div>
                <p class="text-sm font-medium text-green-600 dark:text-green-400 mb-1">
                    Gestion du courrier
                </p>

                <h1 class="text-2xl sm:text-3xl font-bold
                           text-slate-900 dark:text-white">
                    Détails du courrier
                </h1>

                <p class="mt-1 text-sm text-slate-500 dark:text-slate-400">
                    Consultez toutes les informations et l'évolution du courrier.
                </p>
            </div>

            {{-- RETOUR --}}
            <button
                type="button"
                onclick="history.back()"
                class="inline-flex items-center justify-center gap-2
                       px-4 py-2.5 rounded-xl
                       border border-slate-200 dark:border-slate-700
                       bg-white dark:bg-slate-900
                       text-slate-700 dark:text-slate-200
                       hover:bg-slate-100 dark:hover:bg-slate-800
                       transition">

                <svg xmlns="http://www.w3.org/2000/svg"
                     class="w-5 h-5"
                     fill="none"
                     viewBox="0 0 24 24"
                     stroke="currentColor">

                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M10 19l-7-7m0 0l7-7m7 7H3"/>
                </svg>

                Retour
            </button>

        </div>


        {{-- INFORMATIONS PRINCIPALES --}}
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">


            {{-- COLONNE PRINCIPALE --}}
            <div class="lg:col-span-2 space-y-6">


                {{-- IDENTIFICATION --}}
                <div class="bg-white dark:bg-slate-900
                            border border-slate-200 dark:border-slate-800
                            rounded-2xl shadow-sm p-6">

                    <div class="flex items-center justify-between gap-4 mb-6">

                        <div>
                            <h2 class="text-lg font-bold
                                       text-slate-900 dark:text-white">
                                Informations du courrier
                            </h2>

                            <p class="text-sm text-slate-500 dark:text-slate-400">
                                Informations générales
                            </p>
                        </div>

                        {{-- STATUT --}}
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

                            $statut = $statuts[$courrier->statut] ?? [
                                'label' => ucfirst(str_replace('_', ' ', $courrier->statut)),
                                'class' => 'bg-slate-100 text-slate-800 dark:bg-slate-800 dark:text-slate-300'
                            ];
                        @endphp

                        <span class="inline-flex items-center
                                     px-3 py-1.5 rounded-full
                                     text-xs font-bold
                                     {{ $statut['class'] }}">

                            {{ $statut['label'] }}

                        </span>

                    </div>


                    {{-- NUMÉRO --}}
                    <div class="mb-6">

                        <p class="text-xs font-semibold uppercase
                                  tracking-wide text-slate-500
                                  dark:text-slate-400">

                            Numéro du courrier
                        </p>

                        <p class="mt-1 text-xl font-bold
                                  text-green-700 dark:text-green-400">

                            {{ $courrier->numero ?? 'Non encore attribué' }}

                        </p>

                    </div>


                    {{-- GRILLE INFORMATIONS --}}
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">

                        <div>
                            <p class="text-xs font-semibold uppercase
                                      tracking-wide text-slate-500
                                      dark:text-slate-400">
                                Nom du courrier
                            </p>

                            <p class="mt-1 font-semibold
                                      text-slate-900 dark:text-white">
                                {{ $courrier->nom }}
                            </p>
                        </div>


                        <div>
                            <p class="text-xs font-semibold uppercase
                                      tracking-wide text-slate-500
                                      dark:text-slate-400">
                                Expéditeur
                            </p>

                            <p class="mt-1 font-semibold
                                      text-slate-900 dark:text-white">

                                {{ $courrier->expediteur->prenom ?? '' }}
                                {{ $courrier->expediteur->nom ?? 'Inconnu' }}

                            </p>
                        </div>


                        <div>
                            <p class="text-xs font-semibold uppercase
                                      tracking-wide text-slate-500
                                      dark:text-slate-400">
                                Date du courrier
                            </p>

                            <p class="mt-1 font-semibold
                                      text-slate-900 dark:text-white">

                                {{ $courrier->date_courrier?->format('d/m/Y') ?? 'Non renseignée' }}

                            </p>
                        </div>


                        <div>
                            <p class="text-xs font-semibold uppercase
                                      tracking-wide text-slate-500
                                      dark:text-slate-400">
                                Date de dépôt
                            </p>

                            <p class="mt-1 font-semibold
                                      text-slate-900 dark:text-white">

                                {{ $courrier->date_depot?->format('d/m/Y H:i') ?? 'Non renseignée' }}

                            </p>
                        </div>


                        <div class="sm:col-span-2">

                            <p class="text-xs font-semibold uppercase
                                      tracking-wide text-slate-500
                                      dark:text-slate-400">
                                Destinataire
                            </p>

                            <p class="mt-1 font-semibold
                                      text-slate-900 dark:text-white">

                                @if($courrier->destinataire)

                                    {{ $courrier->destinataire->prenom }}
                                    {{ $courrier->destinataire->nom }}

                                @else

                                    <span class="text-slate-400">
                                        Pas encore attribué
                                    </span>

                                @endif

                            </p>

                        </div>

                    </div>


                    {{-- DESCRIPTION --}}
                    <div class="mt-8 pt-6
                                border-t border-slate-200
                                dark:border-slate-800">

                        <p class="text-xs font-semibold uppercase
                                  tracking-wide text-slate-500
                                  dark:text-slate-400">

                            Description
                        </p>

                        <div class="mt-3 p-4 rounded-xl
                                    bg-slate-50 dark:bg-slate-800/50
                                    text-sm leading-7
                                    text-slate-700 dark:text-slate-300">

                            {!! nl2br(e($courrier->description)) !!}

                        </div>

                    </div>

                </div>


                {{-- PIÈCES JOINTES --}}
                <div class="bg-white dark:bg-slate-900
                            border border-slate-200 dark:border-slate-800
                            rounded-2xl shadow-sm p-6">

                    <div class="mb-5">

                        <h2 class="text-lg font-bold
                                   text-slate-900 dark:text-white">

                            Pièces jointes

                        </h2>

                        <p class="text-sm text-slate-500 dark:text-slate-400">
                            Documents associés à ce courrier.
                        </p>

                    </div>


                    @if($courrier->piecesJointes->count())

                        <div class="space-y-3">

                            @foreach($courrier->piecesJointes as $piece)

                                <div class="flex flex-col sm:flex-row
                                            sm:items-center sm:justify-between
                                            gap-4 p-4 rounded-xl
                                            border border-slate-200
                                            dark:border-slate-700">

                                    <div class="flex items-center gap-3 min-w-0">

                                        <div class="w-10 h-10 shrink-0
                                                    rounded-lg
                                                    bg-green-100
                                                    dark:bg-green-900/30
                                                    flex items-center justify-center">

                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                 class="w-5 h-5 text-green-600"
                                                 fill="none"
                                                 viewBox="0 0 24 24"
                                                 stroke="currentColor">

                                                <path stroke-linecap="round"
                                                      stroke-linejoin="round"
                                                      stroke-width="2"
                                                      d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>

                                            </svg>

                                        </div>


                                        <div class="min-w-0">

                                            <p class="font-semibold
                                                      text-sm truncate
                                                      text-slate-900
                                                      dark:text-white">

                                                {{ $piece->nom_original }}

                                            </p>

                                            <p class="text-xs text-slate-500
                                                      dark:text-slate-400">

                                                {{ number_format($piece->taille / 1024, 1) }} Ko

                                            </p>

                                        </div>

                                    </div>


                                    <div class="flex items-center gap-2">

                                        {{-- VOIR --}}
                                        <a href="{{ route('courriers.pieces.show', [$courrier, $piece]) }}"
                                           target="_blank"
                                           class="inline-flex items-center gap-2
                                                  px-3 py-2 rounded-lg
                                                  text-sm font-semibold
                                                  bg-slate-100
                                                  dark:bg-slate-800
                                                  text-slate-700
                                                  dark:text-slate-200
                                                  hover:bg-slate-200
                                                  dark:hover:bg-slate-700">

                                            Voir

                                        </a>


                                        {{-- TÉLÉCHARGER --}}
                                        <a href="{{ route('courriers.pieces.download', [$courrier, $piece]) }}"
                                           class="inline-flex items-center gap-2
                                                  px-3 py-2 rounded-lg
                                                  text-sm font-semibold
                                                  bg-green-600 hover:bg-green-700
                                                  text-white">

                                            Télécharger

                                        </a>

                                    </div>

                                </div>

                            @endforeach

                        </div>

                    @else

                        <div class="py-8 text-center
                                    text-slate-500 dark:text-slate-400">

                            Aucune pièce jointe pour ce courrier.

                        </div>

                    @endif

                </div>

                @auth

    @if(
        auth()->user()->role === 'secretaire'
        && auth()->user()->actif
        && in_array($courrier->statut, [
            'depose',
            'enregistre'
        ])
    )

        <a
            href="{{ route(
                'secretaire.courriers.modification.form',
                $courrier
            ) }}"
            class="inline-flex items-center gap-2
                   px-5 py-3
                   rounded-xl
                   bg-yellow-500
                   hover:bg-yellow-600
                   text-slate-900
                   font-bold
                   shadow-lg
                   transition"
        >
            ⚠️ Demander une modification
        </a>

    @endif

@endauth

@if(
    auth()->user()->role === 'secretaire' &&
    auth()->user()->actif &&
    $courrier->statut === 'enregistre'
)

    <a
        href="{{ route(
            'secretaire.courriers.transmission.form',
            $courrier
        ) }}"
        class="inline-flex items-center gap-2
                                                  px-3 py-2 rounded-lg
                                                  text-sm font-semibold
                                                  bg-green-600 hover:bg-green-700
                                                  text-white"
    >
        📤 Transmettre au directeur
    </a>

@endif

            </div>


            {{-- COLONNE DROITE --}}
            <div class="space-y-6">


                {{-- ÉTAT --}}
                <div class="bg-white dark:bg-slate-900
                            border border-slate-200 dark:border-slate-800
                            rounded-2xl shadow-sm p-6">

                    <h2 class="text-lg font-bold
                               text-slate-900 dark:text-white mb-5">

                        État du courrier

                    </h2>


                    <div class="flex items-start gap-3">

                        <div class="w-3 h-3 mt-1.5 rounded-full
                                    bg-green-500 shrink-0">
                        </div>

                        <div>

                            <p class="font-semibold
                                      text-slate-900 dark:text-white">

                                {{ $statut['label'] }}

                            </p>

                            <p class="mt-1 text-sm
                                      text-slate-500 dark:text-slate-400">

                                État actuel du traitement.

                            </p>

                        </div>

                    </div>

                </div>


                {{-- INFORMATIONS TECHNIQUES --}}
                <div class="bg-white dark:bg-slate-900
                            border border-slate-200 dark:border-slate-800
                            rounded-2xl shadow-sm p-6">

                    <h2 class="text-lg font-bold
                               text-slate-900 dark:text-white mb-5">

                        Informations

                    </h2>


                    <div class="space-y-4">

                        <div>
                            <p class="text-xs text-slate-500
                                      dark:text-slate-400">
                                Identifiant
                            </p>

                            <p class="font-semibold
                                      text-slate-900 dark:text-white">
                                #{{ $courrier->id }}
                            </p>
                        </div>


                        <div>
                            <p class="text-xs text-slate-500
                                      dark:text-slate-400">
                                Dernière modification
                            </p>

                            <p class="font-semibold
                                      text-slate-900 dark:text-white">

                                {{ $courrier->updated_at?->format('d/m/Y H:i') }}

                            </p>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection