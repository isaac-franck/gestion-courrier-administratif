
@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-slate-50 text-slate-900 dark:bg-slate-950 dark:text-slate-100 transition-colors duration-300">

    {{-- HEADER --}}
    <header class="sticky top-0 z-40 border-b border-slate-200/80 bg-white/90 backdrop-blur-xl dark:border-slate-800 dark:bg-slate-950/90">

        <div class="mx-auto flex max-w-7xl items-center justify-between px-4 py-4 sm:px-6 lg:px-8">

            <div class="flex items-center gap-4">

                {{-- Retour --}}
                <a href="{{ route('admin.dashboard') }}"
                   class="flex h-10 w-10 items-center justify-center rounded-xl border border-slate-200 bg-white text-slate-600 transition hover:border-green-300 hover:text-green-600 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-300 dark:hover:border-green-700 dark:hover:text-green-400"
                   title="Retour au tableau de bord">

                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                </a>

                <div>
                    <div class="flex items-center gap-2">
                        <span class="h-2 w-2 rounded-full bg-green-500"></span>

                        <span class="text-xs font-semibold uppercase tracking-widest text-green-600 dark:text-green-400">
                            CENADI
                        </span>
                    </div>

                    <h1 class="mt-1 text-lg font-bold sm:text-xl">
                        Gestion des services
                    </h1>
                </div>

            </div>

            {{-- Theme --}}
            <button
                id="admin-theme-toggle"
                type="button"
                class="flex h-10 w-10 items-center justify-center rounded-xl border border-slate-200 bg-white text-slate-600 transition hover:border-green-300 hover:text-green-600 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-300 dark:hover:border-green-700 dark:hover:text-green-400"
                title="Changer de thème">

                {{-- Soleil --}}
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

                {{-- Lune --}}
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


    {{-- CONTENU --}}
    <main class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">

        {{-- Messages --}}
        @if(session('success'))

            <div class="mb-6 flex items-start gap-3 rounded-2xl border border-green-200 bg-green-50 p-4 text-green-800 dark:border-green-900/50 dark:bg-green-950/30 dark:text-green-300">

                <svg class="mt-0.5 h-5 w-5 shrink-0"
                     fill="none"
                     stroke="currentColor"
                     viewBox="0 0 24 24">

                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M5 13l4 4L19 7"/>
                </svg>

                <div>
                    <p class="font-semibold">Opération réussie</p>
                    <p class="mt-1 text-sm">{{ session('success') }}</p>
                </div>
            </div>

        @endif


        @if($errors->any())

            <div class="mb-6 rounded-2xl border border-red-200 bg-red-50 p-4 text-red-800 dark:border-red-900/50 dark:bg-red-950/30 dark:text-red-300">

                <div class="flex gap-3">

                    <svg class="mt-0.5 h-5 w-5 shrink-0"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M12 8v4m0 4h.01M12 3a9 9 0 110 18 9 9 0 010-18z"/>
                    </svg>

                    <div>
                        <p class="font-semibold">Impossible d'effectuer l'opération</p>

                        @foreach($errors->all() as $error)
                            <p class="mt-1 text-sm">{{ $error }}</p>
                        @endforeach
                    </div>

                </div>
            </div>

        @endif


        {{-- HERO --}}
        <section class="relative overflow-hidden rounded-3xl bg-gradient-to-br from-green-700 via-green-600 to-emerald-500 p-6 text-white shadow-xl sm:p-8">

            {{-- Décoration --}}
            <div class="absolute -right-20 -top-20 h-64 w-64 rounded-full bg-yellow-300/20 blur-2xl"></div>
            <div class="absolute -bottom-24 left-1/3 h-72 w-72 rounded-full bg-white/10 blur-3xl"></div>

            <div class="relative flex flex-col justify-between gap-6 lg:flex-row lg:items-center">

                <div class="max-w-2xl">

                    <div class="mb-4 inline-flex items-center gap-2 rounded-full border border-white/20 bg-white/10 px-3 py-1.5 text-xs font-semibold uppercase tracking-wider backdrop-blur">

                        <svg class="h-4 w-4"
                             fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24">

                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M3 8l9-5 9 5-9 5-9-5z"/>
                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M3 8v8l9 5 9-5V8"/>
                        </svg>

                        Organisation administrative
                    </div>

                    <h2 class="text-2xl font-bold sm:text-3xl">
                        Les services du CENADI
                    </h2>

                    <p class="mt-3 max-w-xl text-sm leading-6 text-green-50 sm:text-base">
                        Organisez les unités administratives, gérez leurs
                        affectations et facilitez la circulation des courriers
                        au sein de votre organisation.
                    </p>

                </div>


                <a href="{{ route('admin.services.create') }}"
                   class="inline-flex items-center justify-center gap-2 rounded-xl bg-yellow-400 px-5 py-3 font-semibold text-slate-900 shadow-lg shadow-yellow-900/10 transition hover:bg-yellow-300">

                    <svg class="h-5 w-5"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M12 4v16m8-8H4"/>
                    </svg>

                    Nouveau service
                </a>

            </div>

        </section>


        {{-- BARRE DE RECHERCHE --}}
        <section class="mt-8">

            <form method="GET"
                  action="{{ route('admin.services.index') }}"
                  class="rounded-2xl border border-slate-200 bg-white p-4 shadow-sm dark:border-slate-800 dark:bg-slate-900">

                <div class="flex flex-col gap-3 sm:flex-row">

                    <div class="relative flex-1">

                        <svg class="absolute left-4 top-1/2 h-5 w-5 -translate-y-1/2 text-slate-400"
                             fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24">

                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M21 21l-4.35-4.35m2.35-5.65a8 8 0 11-16 0 8 8 0 0116 0z"/>
                        </svg>

                        <input
                            type="text"
                            name="search"
                            value="{{ request('search') }}"
                            placeholder="Rechercher un service..."
                            class="w-full rounded-xl border border-slate-200 bg-slate-50 py-3 pl-11 pr-4 text-sm outline-none transition focus:border-green-500 focus:ring-2 focus:ring-green-500/20 dark:border-slate-700 dark:bg-slate-950"
                        >

                    </div>

                    <button
                        type="submit"
                        class="inline-flex items-center justify-center gap-2 rounded-xl bg-green-600 px-5 py-3 text-sm font-semibold text-white transition hover:bg-green-700">

                        Rechercher
                    </button>

                    @if(request('search'))

                        <a href="{{ route('admin.services.index') }}"
                           class="inline-flex items-center justify-center rounded-xl border border-slate-200 px-5 py-3 text-sm font-semibold text-slate-600 transition hover:bg-slate-50 dark:border-slate-700 dark:text-slate-300 dark:hover:bg-slate-800">

                            Réinitialiser
                        </a>

                    @endif

                </div>

            </form>

        </section>


        {{-- EN-TÊTE LISTE --}}
        <div class="mt-8 flex flex-col justify-between gap-3 sm:flex-row sm:items-end">

            <div>
                <p class="text-sm font-medium text-green-600 dark:text-green-400">
                    ORGANISATION
                </p>

                <h2 class="mt-1 text-2xl font-bold">
                    Services
                </h2>

                <p class="mt-1 text-sm text-slate-500 dark:text-slate-400">
                    {{ $services->total() }} service(s) enregistré(s)
                </p>
            </div>

        </div>


        {{-- LISTE DES SERVICES --}}
        <section class="mt-5">

            @if($services->count())

                <div class="grid gap-5 md:grid-cols-2 xl:grid-cols-3">

                    @foreach($services as $service)

                        <article class="group relative overflow-hidden rounded-2xl border border-slate-200 bg-white p-5 shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-lg dark:border-slate-800 dark:bg-slate-900">

                            {{-- Barre décorative --}}
                            <div class="absolute left-0 top-0 h-1 w-full bg-gradient-to-r from-green-500 via-green-600 to-yellow-400"></div>

                            <div class="flex items-start justify-between gap-4">

                                {{-- Icône --}}
                                <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-green-100 text-green-700 dark:bg-green-950/50 dark:text-green-400">

                                    <svg class="h-6 w-6"
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
                                        <path stroke-linecap="round"
                                              stroke-linejoin="round"
                                              stroke-width="2"
                                              d="M12 11v10"/>
                                    </svg>

                                </div>


                                {{-- Statut --}}
                                @if($service->actif)

                                    <span class="inline-flex items-center gap-1.5 rounded-full bg-green-100 px-3 py-1 text-xs font-semibold text-green-700 dark:bg-green-950/50 dark:text-green-400">

                                        <span class="h-1.5 w-1.5 rounded-full bg-green-500"></span>

                                        Actif
                                    </span>

                                @else

                                    <span class="inline-flex items-center gap-1.5 rounded-full bg-slate-100 px-3 py-1 text-xs font-semibold text-slate-600 dark:bg-slate-800 dark:text-slate-400">

                                        <span class="h-1.5 w-1.5 rounded-full bg-slate-400"></span>

                                        Inactif
                                    </span>

                                @endif

                            </div>


                            {{-- Informations --}}
                            <div class="mt-5">

                                <h3 class="text-lg font-bold">
                                    {{ $service->nom }}
                                </h3>

                                <p class="mt-2 min-h-[48px] text-sm leading-6 text-slate-500 dark:text-slate-400">
                                    {{ $service->description ?: 'Aucune description renseignée pour ce service.' }}
                                </p>

                            </div>


                            {{-- Statistiques --}}
                            <div class="mt-5 grid grid-cols-2 gap-3">

                                <div class="rounded-xl bg-slate-50 p-3 dark:bg-slate-800/60">

                                    <p class="text-xs font-medium text-slate-500 dark:text-slate-400">
                                        Utilisateurs
                                    </p>

                                    <p class="mt-1 text-xl font-bold text-slate-900 dark:text-white">
                                        {{ $service->users_count }}
                                    </p>

                                </div>


                                <div class="rounded-xl bg-yellow-50 p-3 dark:bg-yellow-950/20">

                                    <p class="text-xs font-medium text-yellow-700 dark:text-yellow-400">
                                        Courriers
                                    </p>

                                    <p class="mt-1 text-xl font-bold text-yellow-700 dark:text-yellow-400">
                                        —
                                    </p>

                                </div>

                            </div>


                            {{-- Actions --}}
                            <div class="mt-5 flex gap-2 border-t border-slate-100 pt-4 dark:border-slate-800">

                                <a href="{{ route('admin.services.edit', $service) }}"
                                   class="inline-flex flex-1 items-center justify-center gap-2 rounded-xl border border-slate-200 px-3 py-2.5 text-sm font-semibold text-slate-700 transition hover:border-green-300 hover:text-green-600 dark:border-slate-700 dark:text-slate-300 dark:hover:border-green-700 dark:hover:text-green-400">

                                    <svg class="h-4 w-4"
                                         fill="none"
                                         stroke="currentColor"
                                         viewBox="0 0 24 24">

                                        <path stroke-linecap="round"
                                              stroke-linejoin="round"
                                              stroke-width="2"
                                              d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5"/>
                                        <path stroke-linecap="round"
                                              stroke-linejoin="round"
                                              stroke-width="2"
                                              d="M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z"/>
                                    </svg>

                                    Modifier
                                </a>


                                <form
                                    action="{{ route('admin.services.destroy', $service) }}"
                                    method="POST"
                                    class="flex-1"
                                    onsubmit="return confirm('Voulez-vous vraiment supprimer le service « {{ addslashes($service->nom) }} » ?');">

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="inline-flex w-full items-center justify-center gap-2 rounded-xl bg-red-50 px-3 py-2.5 text-sm font-semibold text-red-600 transition hover:bg-red-100 dark:bg-red-950/30 dark:text-red-400 dark:hover:bg-red-950/50">

                                        <svg class="h-4 w-4"
                                             fill="none"
                                             stroke="currentColor"
                                             viewBox="0 0 24 24">

                                            <path stroke-linecap="round"
                                                  stroke-linejoin="round"
                                                  stroke-width="2"
                                                  d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M9 7V4a1 1 0 011-1h4a1 1 0 011 1v3m-9 0h14"/>
                                        </svg>

                                        Supprimer
                                    </button>

                                </form>

                            </div>

                        </article>

                    @endforeach

                </div>


                {{-- PAGINATION --}}
                <div class="mt-8">
                    {{ $services->withQueryString()->links() }}
                </div>

            @else

                {{-- Aucun résultat --}}
                <div class="rounded-3xl border border-dashed border-slate-300 bg-white px-6 py-16 text-center dark:border-slate-700 dark:bg-slate-900">

                    <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-2xl bg-green-100 text-green-600 dark:bg-green-950/40 dark:text-green-400">

                        <svg class="h-8 w-8"
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

                    <h3 class="mt-5 text-lg font-bold">
                        Aucun service trouvé
                    </h3>

                    <p class="mx-auto mt-2 max-w-md text-sm text-slate-500 dark:text-slate-400">
                        Aucun service ne correspond à votre recherche.
                        Vous pouvez créer un nouveau service.
                    </p>

                    <a href="{{ route('admin.services.create') }}"
                       class="mt-6 inline-flex items-center gap-2 rounded-xl bg-green-600 px-5 py-3 text-sm font-semibold text-white transition hover:bg-green-700">

                        <svg class="h-5 w-5"
                             fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24">

                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M12 4v16m8-8H4"/>
                        </svg>

                        Créer un service
                    </a>

                </div>

            @endif

        </section>

    </main>

</div>


{{-- THEME --}}
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

        const dark = document.documentElement.classList.contains('dark');

        localStorage.setItem('theme', dark ? 'dark' : 'light');

        updateIcons();
    });

    updateIcons();
});
</script>

@endsection