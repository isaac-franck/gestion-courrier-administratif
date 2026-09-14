
@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-slate-50 text-slate-900 dark:bg-slate-950 dark:text-slate-100 transition-colors duration-300">

    {{-- HEADER --}}
    <header class="sticky top-0 z-40 border-b border-slate-200/80 bg-white/90 backdrop-blur-xl dark:border-slate-800 dark:bg-slate-950/90">

        <div class="mx-auto flex max-w-5xl items-center justify-between px-4 py-4 sm:px-6 lg:px-8">

            <div class="flex items-center gap-4">

                <a href="{{ route('admin.services.index') }}"
                   class="flex h-10 w-10 items-center justify-center rounded-xl border border-slate-200 bg-white text-slate-600 transition hover:border-green-300 hover:text-green-600 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-300">

                    <svg class="h-5 w-5"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                </a>

                <div>
                    <span class="text-xs font-semibold uppercase tracking-widest text-green-600 dark:text-green-400">
                        CENADI
                    </span>

                    <h1 class="text-lg font-bold">
                        Nouveau service
                    </h1>
                </div>

            </div>


            <button
                id="admin-theme-toggle"
                type="button"
                class="flex h-10 w-10 items-center justify-center rounded-xl border border-slate-200 bg-white text-slate-600 transition hover:border-green-300 hover:text-green-600 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-300">

                <svg id="admin-sun-icon"
                     class="hidden h-5 w-5"
                     fill="none"
                     stroke="currentColor"
                     viewBox="0 0 24 24">

                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364-6.364l-.707.707M6.343 17.657l-.707.707m12.728 0l-.707-.707M6.343 6.343l-.707-.707M12 8a4 4 0 100 8 4 4 0 000-8z"/>
                </svg>

                <svg id="admin-moon-icon"
                     class="h-5 w-5"
                     fill="none"
                     stroke="currentColor"
                     viewBox="0 0 24 24">

                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"/>
                </svg>

            </button>

        </div>

    </header>


    <main class="mx-auto max-w-5xl px-4 py-8 sm:px-6 lg:px-8">

        {{-- INTRODUCTION --}}
        <section class="relative overflow-hidden rounded-3xl bg-gradient-to-br from-green-700 via-green-600 to-emerald-500 p-6 text-white shadow-xl sm:p-8">

            <div class="absolute -right-20 -top-20 h-64 w-64 rounded-full bg-yellow-300/20 blur-3xl"></div>

            <div class="relative flex items-start gap-4">

                <div class="flex h-14 w-14 shrink-0 items-center justify-center rounded-2xl bg-white/15">

                    <svg class="h-7 w-7"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M3 7l9-4 9 4-9 4-9-4z"/>
                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M3 7v10l9 4 9-4V7"/>
                    </svg>

                </div>

                <div>
                    <p class="text-xs font-semibold uppercase tracking-widest text-green-100">
                        Organisation
                    </p>

                    <h2 class="mt-1 text-2xl font-bold">
                        Créer un nouveau service
                    </h2>

                    <p class="mt-2 max-w-2xl text-sm leading-6 text-green-50">
                        Ajoutez une nouvelle unité administrative au système
                        afin de faciliter l'affectation du personnel et
                        l'acheminement des courriers.
                    </p>
                </div>

            </div>

        </section>


        {{-- ERREURS --}}
        @if($errors->any())

            <div class="mt-6 rounded-2xl border border-red-200 bg-red-50 p-4 text-red-800 dark:border-red-900/50 dark:bg-red-950/30 dark:text-red-300">

                <p class="font-semibold">
                    Veuillez corriger les erreurs suivantes :
                </p>

                <ul class="mt-2 list-disc space-y-1 pl-5 text-sm">

                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach

                </ul>

            </div>

        @endif


        {{-- FORMULAIRE --}}
        <form
            action="{{ route('admin.services.store') }}"
            method="POST"
            class="mt-6 overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm dark:border-slate-800 dark:bg-slate-900">

            @csrf

            <div class="p-6 sm:p-8">

                <div class="border-b border-slate-100 pb-6 dark:border-slate-800">

                    <h3 class="text-lg font-bold">
                        Informations du service
                    </h3>

                    <p class="mt-1 text-sm text-slate-500 dark:text-slate-400">
                        Renseignez les informations principales du service.
                    </p>

                </div>


                <div class="mt-6 space-y-6">

                    {{-- NOM --}}
                    <div>

                        <label for="nom"
                               class="mb-2 block text-sm font-semibold">

                            Nom du service
                            <span class="text-red-500">*</span>

                        </label>

                        <input
                            id="nom"
                            name="nom"
                            type="text"
                            value="{{ old('nom') }}"
                            required
                            maxlength="255"
                            placeholder="Ex. Service Informatique"
                            class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm outline-none transition placeholder:text-slate-400 focus:border-green-500 focus:ring-4 focus:ring-green-500/10 dark:border-slate-700 dark:bg-slate-950 dark:placeholder:text-slate-600">

                        @error('nom')
                            <p class="mt-2 text-sm text-red-500">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>


                    {{-- DESCRIPTION --}}
                    <div>

                        <label for="description"
                               class="mb-2 block text-sm font-semibold">

                            Description

                            <span class="font-normal text-slate-400">
                                (facultatif)
                            </span>

                        </label>

                        <textarea
                            id="description"
                            name="description"
                            rows="5"
                            maxlength="1000"
                            placeholder="Décrivez brièvement le rôle ou les missions de ce service..."
                            class="w-full resize-none rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm outline-none transition placeholder:text-slate-400 focus:border-green-500 focus:ring-4 focus:ring-green-500/10 dark:border-slate-700 dark:bg-slate-950 dark:placeholder:text-slate-600">{{ old('description') }}</textarea>

                        @error('description')
                            <p class="mt-2 text-sm text-red-500">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>


                    {{-- INFO --}}
                    <div class="rounded-2xl border border-yellow-200 bg-yellow-50 p-4 dark:border-yellow-900/40 dark:bg-yellow-950/20">

                        <div class="flex gap-3">

                            <svg class="mt-0.5 h-5 w-5 shrink-0 text-yellow-600 dark:text-yellow-400"
                                 fill="none"
                                 stroke="currentColor"
                                 viewBox="0 0 24 24">

                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M13 16h-1v-4h-1m1-4h.01M12 3a9 9 0 110 18 9 9 0 010-18z"/>
                            </svg>

                            <div>
                                <p class="text-sm font-semibold text-yellow-800 dark:text-yellow-300">
                                    Activation automatique
                                </p>

                                <p class="mt-1 text-sm leading-6 text-yellow-700 dark:text-yellow-400">
                                    Le nouveau service sera créé comme
                                    <strong>actif</strong> par défaut.
                                    Vous pourrez ensuite le modifier.
                                </p>
                            </div>

                        </div>

                    </div>

                </div>

            </div>


            {{-- ACTIONS --}}
            <div class="flex flex-col-reverse gap-3 border-t border-slate-100 bg-slate-50 p-6 sm:flex-row sm:justify-end dark:border-slate-800 dark:bg-slate-950/50">

                <a href="{{ route('admin.services.index') }}"
                   class="inline-flex items-center justify-center rounded-xl border border-slate-200 px-5 py-3 text-sm font-semibold text-slate-700 transition hover:bg-white dark:border-slate-700 dark:text-slate-300 dark:hover:bg-slate-900">

                    Annuler
                </a>

                <button
                    type="submit"
                    class="inline-flex items-center justify-center gap-2 rounded-xl bg-green-600 px-5 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-green-700">

                    <svg class="h-5 w-5"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M12 4v16m8-8H4"/>
                    </svg>

                    Créer le service
                </button>

            </div>

        </form>

    </main>

</div>


<script>
document.addEventListener('DOMContentLoaded', function () {

    const toggle = document.getElementById('admin-theme-toggle');
    const sun = document.getElementById('admin-sun-icon');
    const moon = document.getElementById('admin-moon-icon');

    if (!toggle) return;

    function updateIcons() {

        const dark = document.documentElement.classList.contains('dark');

        if (dark) {
            moon.classList.add('hidden');
            sun.classList.remove('hidden');
        } else {
            sun.classList.add('hidden');
            moon.classList.remove('hidden');
        }
    }

    toggle.addEventListener('click', function () {

        document.documentElement.classList.toggle('dark');

        localStorage.setItem(
            'theme',
            document.documentElement.classList.contains('dark')
                ? 'dark'
                : 'light'
        );

        updateIcons();
    });

    updateIcons();
});
</script>

@endsection
