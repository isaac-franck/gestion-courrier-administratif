@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-slate-50 dark:bg-slate-950">

    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

        {{-- Retour --}}
        <a
            href="{{ route('secretaire.courriers.a-enregistrer') }}"
            class="inline-flex items-center gap-2 text-sm
                   text-slate-600 dark:text-slate-400
                   hover:text-green-600 dark:hover:text-green-400 mb-6"
        >
            ← Retour aux courriers à enregistrer
        </a>


        {{-- Carte principale --}}
        <div class="bg-white dark:bg-slate-900
                    border border-slate-200 dark:border-slate-800
                    rounded-2xl overflow-hidden">

            {{-- Header --}}
            <div class="px-6 py-5 border-b border-slate-200
                        dark:border-slate-800">

                <p class="text-sm font-medium text-green-600
                          dark:text-green-400">
                    Enregistrement du courrier
                </p>

                <h1 class="text-2xl font-bold text-slate-900
                           dark:text-white mt-1">

                    {{ $courrier->nom }}

                </h1>

            </div>


            {{-- Informations --}}
            <div class="p-6">

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">

                    <div>
                        <p class="text-xs uppercase font-semibold
                                  text-slate-400">
                            Expéditeur
                        </p>

                        <p class="mt-1 font-medium text-slate-900
                                  dark:text-white">

                            {{ $courrier->expediteur->prenom }}
                            {{ $courrier->expediteur->nom }}

                        </p>
                    </div>


                    <div>
                        <p class="text-xs uppercase font-semibold
                                  text-slate-400">
                            Date du courrier
                        </p>

                        <p class="mt-1 font-medium text-slate-900
                                  dark:text-white">

                            {{ $courrier->date_depot->format('d/m/Y') }}

                        </p>
                    </div>


                    <div class="md:col-span-2">

                        <p class="text-xs uppercase font-semibold
                                  text-slate-400">
                            Description
                        </p>

                        <p class="mt-2 text-slate-700 dark:text-slate-300
                                  leading-relaxed">

                            {{ $courrier->description }}

                        </p>

                    </div>

                </div>


                {{-- Formulaire --}}
                <div class="border-t border-slate-200
                            dark:border-slate-800 pt-6">

                    <h2 class="text-lg font-semibold text-slate-900
                               dark:text-white">

                        Attribution du numéro

                    </h2>

                    <p class="text-sm text-slate-500
                              dark:text-slate-400 mt-1 mb-5">

                        Saisissez le numéro administratif unique que vous
                        souhaitez attribuer à ce courrier.

                    </p>


                    <form
                        method="POST"
                        action="{{ route(
                            'secretaire.courriers.enregistrer.store',
                            $courrier
                        ) }}"
                    >

                        @csrf
                        @method('PUT')


                        <div>

                            <label
                                for="numero"
                                class="block text-sm font-medium
                                       text-slate-700 dark:text-slate-300 mb-2"
                            >
                                Numéro du courrier
                            </label>

                            <input
                                type="text"
                                id="numero"
                                name="numero"
                                value="{{ old('numero') }}"
                                placeholder="Ex : CENADI-2026-001"
                                required
                                maxlength="100"
                                class="w-full rounded-xl border
                                       border-slate-300 dark:border-slate-700
                                       bg-white dark:bg-slate-800
                                       text-slate-900 dark:text-white
                                       px-4 py-3
                                       focus:ring-2 focus:ring-green-500
                                       focus:border-green-500"
                            >

                            @error('numero')

                                <p class="mt-2 text-sm text-red-600">
                                    {{ $message }}
                                </p>

                            @enderror

                        </div>


                        {{-- Boutons --}}
                        <div class="flex flex-col-reverse sm:flex-row
                                    sm:justify-end gap-3 mt-8">

                            <a
                                href="{{ route(
                                    'secretaire.courriers.a-enregistrer'
                                ) }}"
                                class="px-5 py-2.5 rounded-lg
                                       border border-slate-300
                                       dark:border-slate-700
                                       text-center text-slate-700
                                       dark:text-slate-300
                                       hover:bg-slate-50
                                       dark:hover:bg-slate-800"
                            >
                                Annuler
                            </a>


                            <button
                                type="submit"
                                class="px-5 py-2.5 rounded-lg
                                       bg-green-600 hover:bg-green-700
                                       text-white font-medium transition"
                            >
                                Valider l'enregistrement
                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection