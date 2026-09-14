@extends('layouts.app')

@section('content')

<div
    x-data="{ dark: localStorage.getItem('theme') === 'dark' }"
    x-init="
        document.documentElement.classList.toggle('dark', dark);
        $watch('dark', value => {
            document.documentElement.classList.toggle('dark', value);
            localStorage.setItem('theme', value ? 'dark' : 'light');
        });
    "
    class="min-h-screen bg-slate-50 dark:bg-slate-950 transition-colors"
>

    <header class="border-b border-slate-200 dark:border-slate-800
                   bg-white/90 dark:bg-slate-900/90 backdrop-blur">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8
                    py-4 flex items-center justify-between">

            <div class="flex items-center gap-3">

                <div class="w-11 h-11 rounded-xl
                            bg-green-600 flex items-center justify-center">

                    <svg class="w-6 h-6 text-white"
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
                    <h1 class="font-bold text-green-700 dark:text-green-400">
                        CENADI
                    </h1>

                    <p class="text-xs text-slate-500 dark:text-slate-400">
                        Gestion du courrier administratif
                    </p>
                </div>

            </div>

            <button
                type="button"
                @click="dark = !dark"
                class="p-2.5 rounded-xl
                       bg-slate-100 dark:bg-slate-800
                       text-slate-700 dark:text-slate-200
                       hover:bg-yellow-100 dark:hover:bg-slate-700
                       transition"
            >
                <span x-show="!dark">🌙</span>
                <span x-show="dark">☀️</span>
            </button>

        </div>

    </header>


    <main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

        <x-retour-dashboard />


        <div class="bg-white dark:bg-slate-900
                    rounded-3xl shadow-xl
                    border border-slate-200 dark:border-slate-800
                    overflow-hidden">

            <div class="px-6 py-6 sm:px-8
                        bg-gradient-to-r from-green-700 to-green-600">

                <div class="flex items-center gap-4">

                    <div class="w-12 h-12 rounded-2xl
                                bg-yellow-400
                                flex items-center justify-center">

                        <span class="text-2xl">💬</span>

                    </div>

                    <div>
                        <h2 class="text-2xl font-bold text-white">
                            Envoyer un commentaire
                        </h2>

                        <p class="text-green-100 text-sm mt-1">
                            Échangez avec un utilisateur autorisé.
                        </p>
                    </div>

                </div>

            </div>


            <form
                method="POST"
                action="{{ route('commentaires.store') }}"
                class="p-6 sm:p-8 space-y-6"
            >

                @csrf


                {{-- Destinataire --}}

                <div>

                    <label
                        for="destinataire_id"
                        class="block text-sm font-semibold
                               text-slate-700 dark:text-slate-200 mb-2"
                    >
                        Destinataire
                    </label>

                    <select
                        id="destinataire_id"
                        name="destinataire_id"
                        required
                        class="w-full rounded-xl
                               border border-slate-300
                               dark:border-slate-700
                               bg-white dark:bg-slate-800
                               text-slate-900 dark:text-white
                               px-4 py-3
                               focus:ring-2 focus:ring-green-500
                               focus:border-green-500"
                    >

                        <option value="">
                            Sélectionner un destinataire
                        </option>

                        @foreach ($destinataires as $destinataire)

                            <option
                                value="{{ $destinataire->id }}"
                                @selected(old('destinataire_id') == $destinataire->id)
                            >
                                {{ $destinataire->prenom }}
                                {{ $destinataire->nom }}
                                — {{ ucfirst(str_replace('_', ' ', $destinataire->role)) }}
                            </option>

                        @endforeach

                    </select>

                    @error('destinataire_id')
                        <p class="mt-2 text-sm text-red-600">
                            {{ $message }}
                        </p>
                    @enderror

                </div>


                {{-- Courrier --}}

                @if(isset($courriers) && $courriers->count())

                    <div>

                        <label
                            for="courrier_id"
                            class="block text-sm font-semibold
                                   text-slate-700 dark:text-slate-200 mb-2"
                        >
                            Courrier concerné
                            <span class="font-normal text-slate-400">
                                (facultatif)
                            </span>
                        </label>

                        <select
                            id="courrier_id"
                            name="courrier_id"
                            class="w-full rounded-xl
                                   border border-slate-300
                                   dark:border-slate-700
                                   bg-white dark:bg-slate-800
                                   text-slate-900 dark:text-white
                                   px-4 py-3
                                   focus:ring-2 focus:ring-green-500"
                        >

                            <option value="">
                                Aucun courrier
                            </option>

                            @foreach($courriers as $courrier)

                                <option
                                    value="{{ $courrier->id }}"
                                    @selected(old('courrier_id') == $courrier->id)
                                >
                                    {{ $courrier->numero ?? 'Sans numéro' }}
                                    — {{ $courrier->nom }}
                                </option>

                            @endforeach

                        </select>

                        @error('courrier_id')
                            <p class="mt-2 text-sm text-red-600">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>

                @endif


                {{-- Contenu --}}

                <div>

                    <label
                        for="contenu"
                        class="block text-sm font-semibold
                               text-slate-700 dark:text-slate-200 mb-2"
                    >
                        Votre commentaire
                    </label>

                    <textarea
                        id="contenu"
                        name="contenu"
                        rows="7"
                        maxlength="5000"
                        required
                        placeholder="Écrivez votre commentaire..."
                        class="w-full rounded-xl
                               border border-slate-300
                               dark:border-slate-700
                               bg-white dark:bg-slate-800
                               text-slate-900 dark:text-white
                               px-4 py-3
                               resize-y
                               focus:ring-2 focus:ring-green-500"
                    >{{ old('contenu') }}</textarea>

                    @error('contenu')
                        <p class="mt-2 text-sm text-red-600">
                            {{ $message }}
                        </p>
                    @enderror

                </div>


                <div class="flex flex-col sm:flex-row
                            justify-end gap-3">

                    <a
                        href="{{ route('commentaires.index') }}"
                        class="inline-flex justify-center items-center
                               px-5 py-3 rounded-xl
                               bg-slate-100 dark:bg-slate-800
                               text-slate-700 dark:text-slate-200
                               font-semibold"
                    >
                        Annuler
                    </a>

                    <button
                        type="submit"
                        class="inline-flex justify-center items-center
                               px-6 py-3 rounded-xl
                               bg-green-600 hover:bg-green-700
                               text-white font-bold
                               shadow-lg shadow-green-600/20
                               transition"
                    >
                        Envoyer le commentaire
                    </button>

                </div>

            </form>

        </div>

    </main>

</div>

@endsection