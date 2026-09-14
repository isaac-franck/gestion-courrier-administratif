@extends('layouts.app')

@section('title', 'Demander une modification')

@section('content')

<div class="max-w-4xl mx-auto px-4 py-8">

    {{-- Retour --}}
    <div class="mb-6">
        <x-retour-dashboard />
    </div>

    {{-- En-tête --}}
    <div class="mb-8">
        <div class="flex items-center gap-3 mb-2">

            <div
                class="w-12 h-12 rounded-xl
                       bg-yellow-100 dark:bg-yellow-900/30
                       flex items-center justify-center"
            >
                ⚠️
            </div>

            <div>
                <h1
                    class="text-2xl font-bold
                           text-slate-900 dark:text-white"
                >
                    Demander une modification
                </h1>

                <p class="text-sm text-slate-500 dark:text-slate-400">
                    Indiquez à l’émetteur les corrections à effectuer.
                </p>
            </div>

        </div>
    </div>


    {{-- Informations du courrier --}}
    <div
        class="mb-6 p-6 rounded-2xl
               bg-white dark:bg-slate-900
               border border-slate-200 dark:border-slate-700
               shadow-sm"
    >

        <h2
            class="text-lg font-bold
                   text-slate-900 dark:text-white mb-4"
        >
            Courrier concerné
        </h2>

        <div class="grid md:grid-cols-2 gap-4">

            <div>
                <p class="text-sm text-slate-500">
                    Numéro
                </p>

                <p class="font-semibold text-slate-900 dark:text-white">
                    {{ $courrier->numero ?? 'Non attribué' }}
                </p>
            </div>

            <div>
                <p class="text-sm text-slate-500">
                    Émetteur
                </p>

                <p class="font-semibold text-slate-900 dark:text-white">
                    {{ $courrier->expediteur->prenom }}
                    {{ $courrier->expediteur->nom }}
                </p>
            </div>

            <div class="md:col-span-2">

                <p class="text-sm text-slate-500">
                    Nom du courrier
                </p>

                <p class="font-semibold text-slate-900 dark:text-white">
                    {{ $courrier->nom }}
                </p>

            </div>

        </div>

    </div>


    {{-- Formulaire --}}
    <form
        method="POST"
        action="{{ route(
            'secretaire.courriers.modification.store',
            $courrier
        ) }}"
        class="space-y-6"
    >

        @csrf

        <div
            class="p-6 rounded-2xl
                   bg-white dark:bg-slate-900
                   border border-slate-200 dark:border-slate-700
                   shadow-sm"
        >

            <label
                for="commentaire"
                class="block mb-2
                       font-bold
                       text-slate-900 dark:text-white"
            >
                Indications de modification
            </label>

            <p
                class="text-sm
                       text-slate-500 dark:text-slate-400
                       mb-4"
            >
                Expliquez précisément à l’émetteur les éléments
                qui doivent être corrigés ou complétés.
            </p>

            <textarea
                id="commentaire"
                name="commentaire"
                rows="7"
                required
                minlength="5"
                maxlength="5000"
                class="w-full rounded-xl
                       border border-slate-300
                       dark:border-slate-600
                       bg-white dark:bg-slate-800
                       text-slate-900 dark:text-white
                       focus:ring-2
                       focus:ring-green-500
                       focus:border-green-500
                       resize-y"
                placeholder="Exemple : veuillez corriger la date indiquée dans le courrier et joindre la pièce justificative manquante..."
            >{{ old('commentaire') }}</textarea>

            @error('commentaire')
                <p class="mt-2 text-sm text-red-600">
                    {{ $message }}
                </p>
            @enderror

        </div>


        {{-- Actions --}}
        <div class="flex flex-col sm:flex-row gap-3 justify-end">

            <a
                href="{{ route('courriers.show', $courrier) }}"
                class="px-5 py-3 rounded-xl
                       border border-slate-300
                       dark:border-slate-600
                       text-slate-700
                       dark:text-slate-200
                       font-semibold
                       text-center
                       hover:bg-slate-100
                       dark:hover:bg-slate-800
                       transition"
            >
                Annuler
            </a>

            <button
                type="submit"
                class="px-5 py-3 rounded-xl
                       bg-yellow-500
                       hover:bg-yellow-600
                       text-slate-900
                       font-bold
                       shadow-lg
                       transition"
            >
                Demander la modification
            </button>

        </div>

    </form>

</div>

@endsection