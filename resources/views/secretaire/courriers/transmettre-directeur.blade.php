{{-- resources/views/secretaire/courriers/transmettre-directeur.blade.php --}}

@extends('layouts.app')

@section('title', 'Transmettre au directeur')

@section('content')

<div class="min-h-screen bg-slate-50 dark:bg-slate-950 transition-colors duration-300">

    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-6 sm:py-8">

        {{-- =========================================================
            EN-TÊTE
        ========================================================== --}}
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-8">

            <div>
                <div class="flex items-center gap-3 mb-2">

                    {{-- Icône courrier --}}
                    <div class="flex h-12 w-12 items-center justify-center rounded-2xl
                                bg-green-100 dark:bg-green-900/30">

                        <svg
                            class="w-6 h-6 text-green-700 dark:text-green-400"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="1.8"
                                d="M3 8l9 6 9-6M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"
                            />
                        </svg>

                    </div>

                    <div>
                        <p class="text-sm font-semibold text-green-700 dark:text-green-400">
                            CENADI
                        </p>

                        <h1 class="text-2xl sm:text-3xl font-bold
                                   text-slate-900 dark:text-white">
                            Transmettre au directeur
                        </h1>
                    </div>

                </div>

                <p class="text-sm sm:text-base text-slate-600 dark:text-slate-400">
                    Vérifiez les informations du courrier avant sa transmission
                    au directeur.
                </p>
            </div>

            {{-- Retour dashboard --}}
            <div>
                <x-retour-dashboard />
            </div>

        </div>


        {{-- =========================================================
            MESSAGE DE SUCCÈS
        ========================================================== --}}
        @if(session('success'))

            <div class="mb-6 rounded-2xl border border-green-200
                        bg-green-50 dark:bg-green-900/20
                        dark:border-green-800 p-4">

                <div class="flex items-start gap-3">

                    <div class="flex h-9 w-9 shrink-0 items-center justify-center
                                rounded-full bg-green-100 dark:bg-green-900/40">

                        <svg
                            class="w-5 h-5 text-green-700 dark:text-green-400"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M5 13l4 4L19 7"
                            />
                        </svg>

                    </div>

                    <p class="text-sm font-medium text-green-800 dark:text-green-300">
                        {{ session('success') }}
                    </p>

                </div>

            </div>

        @endif


        {{-- =========================================================
            ERREURS DE VALIDATION
        ========================================================== --}}
        @if($errors->any())

            <div class="mb-6 rounded-2xl border border-red-200
                        bg-red-50 dark:bg-red-900/20
                        dark:border-red-800 p-4">

                <div class="flex items-start gap-3">

                    <svg
                        class="w-5 h-5 mt-0.5 text-red-600 dark:text-red-400 shrink-0"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M12 9v3m0 4h.01M5.07 19h13.86c1.54 0 2.5-1.67 1.73-3L13.73 4a2 2 0 00-2.46 0L3.34 16c-.77 1.33.19 3 1.73 3z"
                        />
                    </svg>

                    <div>

                        <p class="font-semibold text-red-800 dark:text-red-300 mb-1">
                            Impossible de transmettre le courrier
                        </p>

                        <ul class="text-sm text-red-700 dark:text-red-400 space-y-1">
                            @foreach($errors->all() as $error)
                                <li>• {{ $error }}</li>
                            @endforeach
                        </ul>

                    </div>

                </div>

            </div>

        @endif


        {{-- =========================================================
            CONTENU PRINCIPAL
        ========================================================== --}}
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">


            {{-- =====================================================
                INFORMATIONS DU COURRIER
            ====================================================== --}}
            <div class="lg:col-span-2">

                <div class="rounded-3xl bg-white dark:bg-slate-900
                            border border-slate-200 dark:border-slate-800
                            shadow-sm overflow-hidden">

                    {{-- En-tête carte --}}
                    <div class="px-5 sm:px-6 py-5 border-b
                                border-slate-200 dark:border-slate-800">

                        <div class="flex flex-col sm:flex-row
                                    sm:items-center sm:justify-between gap-3">

                            <div>

                                <p class="text-xs font-semibold uppercase tracking-wider
                                          text-slate-500 dark:text-slate-400">
                                    Courrier administratif
                                </p>

                                <h2 class="mt-1 text-xl font-bold
                                           text-slate-900 dark:text-white">

                                    {{ $courrier->nom }}

                                </h2>

                            </div>


                            {{-- Statut --}}
                            <span class="inline-flex items-center gap-2
                                         self-start sm:self-auto
                                         rounded-full px-3 py-1.5
                                         text-xs font-semibold
                                         bg-green-100 text-green-800
                                         dark:bg-green-900/30
                                         dark:text-green-300">

                                <span class="w-2 h-2 rounded-full bg-green-500"></span>

                                Enregistré

                            </span>

                        </div>

                    </div>


                    {{-- Corps --}}
                    <div class="p-5 sm:p-6 space-y-6">


                        {{-- Numéro --}}
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">

                            <div>
                                <p class="text-xs font-medium uppercase tracking-wide
                                          text-slate-500 dark:text-slate-400">
                                    Numéro du courrier
                                </p>

                                <p class="mt-1 text-base font-bold
                                          text-slate-900 dark:text-white">

                                    {{ $courrier->numero ?? 'Non attribué' }}

                                </p>
                            </div>


                            {{-- Date courrier --}}
                            <div>

                                <p class="text-xs font-medium uppercase tracking-wide
                                          text-slate-500 dark:text-slate-400">
                                    Date du courrier
                                </p>

                                <p class="mt-1 text-base font-semibold
                                          text-slate-900 dark:text-white">

                                    {{ $courrier->date_courrier?->format('d/m/Y') ?? '—' }}

                                </p>

                            </div>

                        </div>


                        {{-- Expéditeur --}}
                        <div class="rounded-2xl bg-slate-50 dark:bg-slate-800/60
                                    border border-slate-200 dark:border-slate-700
                                    p-4">

                            <div class="flex items-center gap-3 mb-4">

                                <div class="h-10 w-10 rounded-xl
                                            bg-yellow-100 dark:bg-yellow-900/30
                                            flex items-center justify-center">

                                    <svg
                                        class="w-5 h-5 text-yellow-700 dark:text-yellow-400"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="1.8"
                                            d="M15 19a3 3 0 00-6 0m9-8a6 6 0 11-12 0 6 6 0 0112 0z"
                                        />
                                    </svg>

                                </div>

                                <div>

                                    <p class="text-xs uppercase tracking-wide
                                              font-semibold
                                              text-slate-500 dark:text-slate-400">
                                        Expéditeur
                                    </p>

                                    <p class="font-bold text-slate-900 dark:text-white">

                                        {{ $courrier->expediteur?->prenom }}
                                        {{ $courrier->expediteur?->nom }}

                                    </p>

                                </div>

                            </div>


                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">

                                <div>

                                    <p class="text-xs text-slate-500 dark:text-slate-400">
                                        Adresse e-mail
                                    </p>

                                    <p class="text-sm font-medium
                                              text-slate-800 dark:text-slate-200 break-all">

                                        {{ $courrier->expediteur?->email ?? '—' }}

                                    </p>

                                </div>


                                <div>

                                    <p class="text-xs text-slate-500 dark:text-slate-400">
                                        Téléphone
                                    </p>

                                    <p class="text-sm font-medium
                                              text-slate-800 dark:text-slate-200">

                                        {{ $courrier->expediteur?->telephone ?? '—' }}

                                    </p>

                                </div>

                            </div>

                        </div>


                        {{-- Description --}}
                        <div>

                            <p class="text-xs font-semibold uppercase tracking-wide
                                      text-slate-500 dark:text-slate-400 mb-2">

                                Description

                            </p>

                            <div class="rounded-2xl bg-slate-50 dark:bg-slate-800/60
                                        border border-slate-200 dark:border-slate-700
                                        p-4">

                                <p class="text-sm leading-6
                                          text-slate-700 dark:text-slate-300
                                          whitespace-pre-line">

                                    {{ $courrier->description }}

                                </p>

                            </div>

                        </div>


                        {{-- Pièces jointes --}}
                        @if($courrier->piecesJointes->count())

                            <div>

                                <div class="flex items-center justify-between mb-3">

                                    <div>

                                        <p class="text-xs font-semibold uppercase tracking-wide
                                                  text-slate-500 dark:text-slate-400">

                                            Documents joints

                                        </p>

                                        <p class="text-sm text-slate-500 dark:text-slate-400">

                                            {{ $courrier->piecesJointes->count() }}
                                            document(s)

                                        </p>

                                    </div>

                                </div>


                                <div class="space-y-2">

                                    @foreach($courrier->piecesJointes as $piece)

                                        <div class="flex items-center justify-between gap-3
                                                    rounded-xl border
                                                    border-slate-200 dark:border-slate-700
                                                    bg-white dark:bg-slate-800
                                                    p-3">

                                            <div class="flex items-center gap-3 min-w-0">

                                                <div class="h-9 w-9 shrink-0 rounded-lg
                                                            bg-red-50 dark:bg-red-900/20
                                                            flex items-center justify-center">

                                                    <svg
                                                        class="w-5 h-5 text-red-600 dark:text-red-400"
                                                        fill="none"
                                                        stroke="currentColor"
                                                        viewBox="0 0 24 24"
                                                    >
                                                        <path
                                                            stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            stroke-width="1.8"
                                                            d="M7 3h7l5 5v13H7a2 2 0 01-2-2V5a2 2 0 012-2z"
                                                        />
                                                    </svg>

                                                </div>

                                                <div class="min-w-0">

                                                    <p class="text-sm font-semibold
                                                              text-slate-800 dark:text-slate-200
                                                              truncate">

                                                        {{ $piece->nom_original }}

                                                    </p>

                                                    @if($piece->taille)

                                                        <p class="text-xs text-slate-500
                                                                  dark:text-slate-400">

                                                            {{ number_format($piece->taille / 1024, 1) }}
                                                            Ko

                                                        </p>

                                                    @endif

                                                </div>

                                            </div>


                                            <a
                                                href="{{ route(
                                                    'courriers.pieces.show',
                                                    [$courrier, $piece]
                                                ) }}"
                                                target="_blank"
                                                class="shrink-0 inline-flex items-center gap-1.5
                                                       px-3 py-2 rounded-lg
                                                       text-xs font-semibold
                                                       text-green-700 dark:text-green-400
                                                       hover:bg-green-50
                                                       dark:hover:bg-green-900/20
                                                       transition"
                                            >

                                                Voir

                                                <svg
                                                    class="w-4 h-4"
                                                    fill="none"
                                                    stroke="currentColor"
                                                    viewBox="0 0 24 24"
                                                >
                                                    <path
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M9 5l7 7-7 7"
                                                    />
                                                </svg>

                                            </a>

                                        </div>

                                    @endforeach

                                </div>

                            </div>

                        @endif

                    </div>

                </div>

            </div>


            {{-- =====================================================
                PANNEAU TRANSMISSION
            ====================================================== --}}
            <div class="lg:col-span-1">

                <div class="lg:sticky lg:top-6">

                    <div class="rounded-3xl bg-white dark:bg-slate-900
                                border border-slate-200 dark:border-slate-800
                                shadow-sm overflow-hidden">


                        {{-- Header --}}
                        <div class="p-5 bg-gradient-to-br
                                    from-green-700 to-green-800
                                    text-white">

                            <div class="flex items-center gap-3">

                                <div class="h-11 w-11 rounded-xl
                                            bg-white/15
                                            flex items-center justify-center">

                                    <svg
                                        class="w-6 h-6"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="1.8"
                                            d="M5 12h14M13 6l6 6-6 6"
                                        />
                                    </svg>

                                </div>

                                <div>

                                    <h2 class="font-bold text-lg">
                                        Transmission
                                    </h2>

                                    <p class="text-sm text-green-100">
                                        Vers le directeur
                                    </p>

                                </div>

                            </div>

                        </div>


                        {{-- Formulaire --}}
                        <form
                            method="POST"
                            action="{{ route(
                                'secretaire.courriers.transmission.store',
                                $courrier
                            ) }}"
                            class="p-5 space-y-5"
                        >

                            @csrf


                            {{-- Destinataire --}}
                            <div>

                                <label class="block text-sm font-semibold
                                              text-slate-800 dark:text-slate-200 mb-2">

                                    Destinataire

                                </label>

                                <div class="flex items-center gap-3 rounded-xl
                                            bg-slate-50 dark:bg-slate-800
                                            border border-slate-200 dark:border-slate-700
                                            p-3">

                                    <div class="h-9 w-9 rounded-full
                                                bg-green-100 dark:bg-green-900/30
                                                flex items-center justify-center">

                                        <svg
                                            class="w-5 h-5 text-green-700 dark:text-green-400"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="1.8"
                                                d="M5.5 20a6.5 6.5 0 0113 0M16 7a4 4 0 11-8 0 4 4 0 018 0z"
                                            />
                                        </svg>

                                    </div>

                                    <div>

                                        <p class="text-xs text-slate-500
                                                  dark:text-slate-400">
                                            Directeur
                                        </p>

                                        <p class="text-sm font-bold
                                                  text-slate-900 dark:text-white">

                                            {{ $directeur->prenom }}
                                            {{ $directeur->nom }}

                                        </p>

                                    </div>

                                </div>

                            </div>


                            {{-- Commentaire --}}
                            <div>

                                <label
                                    for="commentaire"
                                    class="block text-sm font-semibold
                                           text-slate-800 dark:text-slate-200 mb-2"
                                >
                                    Commentaire
                                    <span class="font-normal text-slate-400">
                                        (facultatif)
                                    </span>
                                </label>

                                <textarea
                                    id="commentaire"
                                    name="commentaire"
                                    rows="5"
                                    maxlength="5000"
                                    placeholder="Ajoutez une remarque destinée au directeur..."
                                    class="w-full rounded-xl
                                           border border-slate-300 dark:border-slate-700
                                           bg-white dark:bg-slate-800
                                           text-slate-900 dark:text-white
                                           placeholder-slate-400
                                           px-4 py-3 text-sm
                                           focus:outline-none
                                           focus:ring-2 focus:ring-green-500
                                           focus:border-green-500
                                           resize-none
                                           transition"
                                >{{ old('commentaire') }}</textarea>

                                @error('commentaire')

                                    <p class="mt-1 text-xs text-red-600 dark:text-red-400">
                                        {{ $message }}
                                    </p>

                                @enderror

                                <p class="mt-1 text-xs text-slate-400">
                                    Ce commentaire sera associé à la transmission.
                                </p>

                            </div>


                            {{-- Information --}}
                            <div class="rounded-xl
                                        bg-yellow-50 dark:bg-yellow-900/20
                                        border border-yellow-200 dark:border-yellow-800
                                        p-4">

                                <div class="flex gap-3">

                                    <svg
                                        class="w-5 h-5 shrink-0 text-yellow-600
                                               dark:text-yellow-400"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="1.8"
                                            d="M12 9v4m0 4h.01M4.93 19h14.14c1.54 0 2.5-1.67 1.73-3L13.73 4a2 2 0 00-3.46 0L3.2 16c-.77 1.33.19 3 1.73 3z"
                                        />
                                    </svg>

                                    <div>

                                        <p class="text-sm font-semibold
                                                  text-yellow-800 dark:text-yellow-300">

                                            Attention

                                        </p>

                                        <p class="mt-1 text-xs leading-5
                                                  text-yellow-700 dark:text-yellow-400">

                                            Après confirmation, le courrier sera transmis
                                            au directeur et son statut passera à
                                            <strong>« Transmis au directeur »</strong>.

                                        </p>

                                    </div>

                                </div>

                            </div>


                            {{-- Boutons --}}
                            <div class="flex flex-col-reverse sm:flex-row gap-3 pt-2">

                                <a
                                    href="{{ route(
                                        'courriers.show',
                                        $courrier
                                    ) }}"
                                    class="flex-1 inline-flex items-center
                                           justify-center gap-2
                                           px-4 py-3 rounded-xl
                                           border border-slate-300
                                           dark:border-slate-700
                                           text-slate-700 dark:text-slate-300
                                           font-semibold text-sm
                                           hover:bg-slate-50
                                           dark:hover:bg-slate-800
                                           transition"
                                >

                                    Annuler

                                </a>


                                <button
                                    type="submit"
                                    class="flex-1 inline-flex items-center
                                           justify-center gap-2
                                           px-4 py-3 rounded-xl
                                           bg-green-700 hover:bg-green-800
                                           text-white
                                           font-semibold text-sm
                                           shadow-sm
                                           hover:shadow-md
                                           transition
                                           focus:outline-none
                                           focus:ring-2
                                           focus:ring-green-500
                                           focus:ring-offset-2
                                           dark:focus:ring-offset-slate-900"
                                >

                                    <svg
                                        class="w-5 h-5"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M5 12h14M13 6l6 6-6 6"
                                        />
                                    </svg>

                                    Transmettre

                                </button>

                            </div>

                        </form>

                    </div>


                    {{-- =================================================
                        RAPPEL DU PROCESSUS
                    ================================================== --}}
                    <div class="mt-5 rounded-2xl
                                border border-slate-200 dark:border-slate-800
                                bg-white dark:bg-slate-900
                                p-5">

                        <p class="text-sm font-bold
                                  text-slate-900 dark:text-white mb-4">

                            Étape suivante

                        </p>

                        <div class="flex items-start gap-3">

                            <div class="flex flex-col items-center">

                                <div class="h-8 w-8 rounded-full
                                            bg-green-100 dark:bg-green-900/30
                                            text-green-700 dark:text-green-400
                                            flex items-center justify-center
                                            text-sm font-bold">

                                    1

                                </div>

                                <div class="w-px h-8 bg-slate-200 dark:bg-slate-700"></div>

                                <div class="h-8 w-8 rounded-full
                                            bg-yellow-100 dark:bg-yellow-900/30
                                            text-yellow-700 dark:text-yellow-400
                                            flex items-center justify-center
                                            text-sm font-bold">

                                    2

                                </div>

                            </div>


                            <div class="space-y-7">

                                <div>

                                    <p class="text-sm font-semibold
                                              text-slate-800 dark:text-slate-200">

                                        Transmission

                                    </p>

                                    <p class="text-xs text-slate-500 dark:text-slate-400">

                                        Le directeur reçoit le courrier.

                                    </p>

                                </div>

                                <div>

                                    <p class="text-sm font-semibold
                                              text-slate-800 dark:text-slate-200">

                                        Examen du courrier

                                    </p>

                                    <p class="text-xs text-slate-500 dark:text-slate-400">

                                        Le directeur pourra ensuite le valider,
                                        le rejeter ou demander une modification.

                                    </p>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection