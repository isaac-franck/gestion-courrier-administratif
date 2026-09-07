@extends('layouts.app')

@section('content')

    @include('components.navbar')

    <main
        class="min-h-screen bg-slate-50 pt-20 transition-colors duration-300 dark:bg-slate-950"
    >

        <section class="relative overflow-hidden">

            <!-- Décorations -->
            <div class="pointer-events-none absolute -left-32 top-20 h-72 w-72 rounded-full bg-green-200/40 blur-3xl dark:bg-green-900/20"></div>

            <div class="pointer-events-none absolute -right-32 bottom-10 h-80 w-80 rounded-full bg-amber-200/40 blur-3xl dark:bg-amber-900/10"></div>


            <div class="mx-auto flex min-h-[calc(100vh-5rem)] max-w-7xl items-center px-6 py-12 lg:px-8">

                <div class="grid w-full items-center gap-12 lg:grid-cols-2 lg:gap-20">


                    <!-- ================================================= -->
                    <!-- PARTIE GAUCHE -->
                    <!-- ================================================= -->

                    <div class="hidden lg:block">

                        <!-- Badge -->
                        <div class="mb-6 inline-flex items-center gap-2 rounded-full border border-green-200 bg-green-50 px-4 py-2 text-sm font-medium text-green-700 dark:border-green-900/60 dark:bg-green-950/40 dark:text-green-400">

                            <span class="flex h-2 w-2 rounded-full bg-green-500"></span>

                            Plateforme sécurisée

                        </div>


                        <!-- Titre -->
                        <h1 class="max-w-xl text-4xl font-extrabold leading-tight tracking-tight text-slate-900 dark:text-white xl:text-5xl">

                            Bienvenue dans votre

                            <span class="text-green-600 dark:text-green-400">
                                espace courrier.
                            </span>

                        </h1>


                        <!-- Description -->
                        <p class="mt-6 max-w-xl text-lg leading-8 text-slate-600 dark:text-slate-400">

                            Connectez-vous à votre espace de travail pour
                            consulter, enregistrer et suivre vos courriers
                            administratifs en toute simplicité.

                        </p>


                        <!-- Illustration courrier -->
                        <div class="relative mt-12">

                            <div class="relative mx-auto max-w-md">

                                <!-- Ombre -->
                                <div class="absolute inset-x-10 bottom-0 h-8 rounded-full bg-slate-300/50 blur-xl dark:bg-black/40"></div>


                                <!-- Document -->
                                <div class="relative rounded-3xl border border-slate-200 bg-white p-8 shadow-2xl shadow-slate-200/60 dark:border-slate-800 dark:bg-slate-900 dark:shadow-black/30">

                                    <!-- En-tête -->
                                    <div class="flex items-center justify-between">

                                        <div class="flex items-center gap-3">

                                            <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-green-600 text-white">

                                                <svg
                                                    class="h-6 w-6"
                                                    fill="none"
                                                    viewBox="0 0 24 24"
                                                    stroke="currentColor"
                                                    stroke-width="1.8"
                                                >
                                                    <path
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        d="M4 6.5A2.5 2.5 0 0 1 6.5 4h11A2.5 2.5 0 0 1 20 6.5v11a2.5 2.5 0 0 1-2.5 2.5h-11A2.5 2.5 0 0 1 4 17.5v-11Z"
                                                    />

                                                    <path
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        d="m6.5 7 5.5 4 5.5-4"
                                                    />
                                                </svg>

                                            </div>

                                            <div>
                                                <p class="font-semibold text-slate-900 dark:text-white">
                                                    Courrier administratif
                                                </p>

                                                <p class="text-xs text-slate-500 dark:text-slate-500">
                                                    Gestion centralisée
                                                </p>
                                            </div>

                                        </div>


                                        <!-- Statut -->
                                        <div class="flex items-center gap-1.5 rounded-full bg-green-50 px-3 py-1.5 text-xs font-medium text-green-700 dark:bg-green-950/50 dark:text-green-400">

                                            <span class="h-1.5 w-1.5 rounded-full bg-green-500"></span>

                                            Actif

                                        </div>

                                    </div>


                                    <!-- Contenu -->
                                    <div class="mt-8 space-y-4">

                                        <div class="h-3 w-3/4 rounded-full bg-slate-100 dark:bg-slate-800"></div>

                                        <div class="h-3 w-full rounded-full bg-slate-100 dark:bg-slate-800"></div>

                                        <div class="h-3 w-5/6 rounded-full bg-slate-100 dark:bg-slate-800"></div>

                                    </div>


                                    <!-- Informations -->
                                    <div class="mt-8 grid grid-cols-3 gap-3">

                                        <div class="rounded-xl bg-slate-50 p-3 dark:bg-slate-800/70">
                                            <div class="mb-2 h-7 w-7 rounded-lg bg-green-100 dark:bg-green-900/40"></div>
                                            <div class="h-2 w-full rounded-full bg-slate-200 dark:bg-slate-700"></div>
                                        </div>

                                        <div class="rounded-xl bg-slate-50 p-3 dark:bg-slate-800/70">
                                            <div class="mb-2 h-7 w-7 rounded-lg bg-amber-100 dark:bg-amber-900/40"></div>
                                            <div class="h-2 w-full rounded-full bg-slate-200 dark:bg-slate-700"></div>
                                        </div>

                                        <div class="rounded-xl bg-slate-50 p-3 dark:bg-slate-800/70">
                                            <div class="mb-2 h-7 w-7 rounded-lg bg-blue-100 dark:bg-blue-900/40"></div>
                                            <div class="h-2 w-full rounded-full bg-slate-200 dark:bg-slate-700"></div>
                                        </div>

                                    </div>

                                </div>


                                <!-- Petite carte flottante -->
                                <div class="absolute -right-6 -top-6 flex items-center gap-3 rounded-2xl border border-slate-200 bg-white px-4 py-3 shadow-xl dark:border-slate-800 dark:bg-slate-900">

                                    <div class="flex h-9 w-9 items-center justify-center rounded-xl bg-amber-100 text-amber-600 dark:bg-amber-900/30 dark:text-amber-400">

                                        <svg
                                            class="h-5 w-5"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke="currentColor"
                                            stroke-width="1.8"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M12 6v6l4 2"
                                            />

                                            <circle
                                                cx="12"
                                                cy="12"
                                                r="8"
                                            />
                                        </svg>

                                    </div>

                                    <div>
                                        <p class="text-xs font-medium text-slate-500 dark:text-slate-400">
                                            Suivi
                                        </p>

                                        <p class="text-sm font-bold text-slate-900 dark:text-white">
                                            En temps réel
                                        </p>
                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>


                    <!-- ================================================= -->
                    <!-- FORMULAIRE -->
                    <!-- ================================================= -->

                    <div class="mx-auto w-full max-w-md">

                        <!-- Retour -->
                        <a
                            href="{{ route('home') }}"
                            class="mb-8 inline-flex items-center gap-2 text-sm font-medium text-slate-600 transition hover:text-green-600 dark:text-slate-400 dark:hover:text-green-400"
                        >

                            <svg
                                class="h-5 w-5"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="1.8"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M19 12H5M11 18l-6-6 6-6"
                                />
                            </svg>

                            Retour à l'accueil

                        </a>


                        <!-- En-tête mobile -->
                        <div class="mb-8 lg:hidden">

                            <div class="mb-5 flex h-14 w-14 items-center justify-center rounded-2xl bg-green-600 text-white shadow-lg shadow-green-600/20">

                                <svg
                                    class="h-7 w-7"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                    stroke-width="1.8"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M4 6.5A2.5 2.5 0 0 1 6.5 4h11A2.5 2.5 0 0 1 20 6.5v11a2.5 2.5 0 0 1-2.5 2.5h-11A2.5 2.5 0 0 1 4 17.5v-11Z"
                                    />

                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="m6.5 7 5.5 4 5.5-4"
                                    />
                                </svg>

                            </div>

                            <p class="text-sm font-semibold uppercase tracking-wider text-green-600 dark:text-green-400">
                                Espace sécurisé
                            </p>

                        </div>


                        <!-- Carte formulaire -->
                        <div class="rounded-3xl border border-slate-200 bg-white p-7 shadow-xl shadow-slate-200/40 dark:border-slate-800 dark:bg-slate-900 dark:shadow-black/20 sm:p-9">


                            <!-- Titre -->
                            <div class="mb-8">

                                <h2 class="text-2xl font-bold tracking-tight text-slate-900 dark:text-white">
                                    Connexion
                                </h2>

                                <p class="mt-2 text-sm leading-6 text-slate-500 dark:text-slate-400">
                                    Connectez-vous avec vos identifiants pour
                                    accéder à votre espace de travail.
                                </p>

                            </div>


                            <!-- Message d'erreur -->
                            @if ($errors->any())

                                <div class="mb-6 rounded-xl border border-red-200 bg-red-50 p-4 dark:border-red-900/50 dark:bg-red-950/30">

                                    <div class="flex gap-3">

                                        <svg
                                            class="h-5 w-5 shrink-0 text-red-600 dark:text-red-400"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke="currentColor"
                                            stroke-width="1.8"
                                        >
                                            <circle
                                                cx="12"
                                                cy="12"
                                                r="9"
                                            />

                                            <path
                                                stroke-linecap="round"
                                                d="M12 8v4"
                                            />

                                            <path
                                                stroke-linecap="round"
                                                d="M12 16h.01"
                                            />
                                        </svg>

                                        <div class="text-sm text-red-700 dark:text-red-400">

                                            @foreach ($errors->all() as $error)

                                                <p>{{ $error }}</p>

                                            @endforeach

                                        </div>

                                    </div>

                                </div>

                            @endif


                            <!-- Formulaire -->
                            <form
                                method="POST"
                                action="{{ route('login') }}"
                                class="space-y-6"
                            >

                                @csrf


                                <!-- Email -->
                                <div>

                                    <label
                                        for="email"
                                        class="mb-2 block text-sm font-semibold text-slate-700 dark:text-slate-300"
                                    >
                                        Adresse email
                                    </label>

                                    <div class="relative">

                                        <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-4">

                                            <svg
                                                class="h-5 w-5 text-slate-400"
                                                fill="none"
                                                viewBox="0 0 24 24"
                                                stroke="currentColor"
                                                stroke-width="1.8"
                                            >
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    d="M4 6h16a1 1 0 0 1 1 1v10a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1Z"
                                                />

                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    d="m4 7 8 6 8-6"
                                                />
                                            </svg>

                                        </div>


                                        <input
                                            id="email"
                                            name="email"
                                            type="email"
                                            value="{{ old('email') }}"
                                            required
                                            autofocus
                                            autocomplete="email"
                                            placeholder="exemple@cenadi.cm"
                                            class="w-full rounded-xl border border-slate-200 bg-slate-50 py-3.5 pl-12 pr-4 text-sm text-slate-900 outline-none transition placeholder:text-slate-400 focus:border-green-500 focus:ring-4 focus:ring-green-500/10 dark:border-slate-700 dark:bg-slate-800 dark:text-white dark:placeholder:text-slate-500 dark:focus:border-green-500"
                                        />

                                    </div>

                                    @error('email')
                                        <p class="mt-2 text-sm text-red-600 dark:text-red-400">
                                            {{ $message }}
                                        </p>
                                    @enderror

                                </div>


                                <!-- Mot de passe -->
                                <div>

                                    <div class="mb-2 flex items-center justify-between">

                                        <label
                                            for="password"
                                            class="block text-sm font-semibold text-slate-700 dark:text-slate-300"
                                        >
                                            Mot de passe
                                        </label>

                                        <a
                                            href="#"
                                            class="text-xs font-semibold text-green-600 transition hover:text-green-700 dark:text-green-400 dark:hover:text-green-300"
                                        >
                                            Mot de passe oublié ?
                                        </a>

                                    </div>


                                    <div class="relative">

                                        <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-4">

                                            <svg
                                                class="h-5 w-5 text-slate-400"
                                                fill="none"
                                                viewBox="0 0 24 24"
                                                stroke="currentColor"
                                                stroke-width="1.8"
                                            >
                                                <rect
                                                    x="5"
                                                    y="10"
                                                    width="14"
                                                    height="10"
                                                    rx="2"
                                                />

                                                <path
                                                    stroke-linecap="round"
                                                    d="M8 10V7a4 4 0 0 1 8 0v3"
                                                />
                                            </svg>

                                        </div>


                                        <input
                                            id="password"
                                            name="password"
                                            type="password"
                                            required
                                            autocomplete="current-password"
                                            placeholder="••••••••"
                                            class="w-full rounded-xl border border-slate-200 bg-slate-50 py-3.5 pl-12 pr-4 text-sm text-slate-900 outline-none transition placeholder:text-slate-400 focus:border-green-500 focus:ring-4 focus:ring-green-500/10 dark:border-slate-700 dark:bg-slate-800 dark:text-white dark:placeholder:text-slate-500 dark:focus:border-green-500"
                                        />

                                    </div>

                                    @error('password')
                                        <p class="mt-2 text-sm text-red-600 dark:text-red-400">
                                            {{ $message }}
                                        </p>
                                    @enderror

                                </div>


                                <!-- Se souvenir -->
                                <div class="flex items-center">

                                    <input
                                        id="remember"
                                        name="remember"
                                        type="checkbox"
                                        class="h-4 w-4 rounded border-slate-300 text-green-600 focus:ring-green-500 dark:border-slate-700 dark:bg-slate-800"
                                    />

                                    <label
                                        for="remember"
                                        class="ml-3 text-sm text-slate-600 dark:text-slate-400"
                                    >
                                        Se souvenir de moi
                                    </label>

                                </div>


                                <!-- Bouton -->
                                <button
                                    type="submit"
                                    class="group flex w-full items-center justify-center gap-3 rounded-xl bg-green-600 px-5 py-3.5 text-sm font-semibold text-white shadow-lg shadow-green-600/20 transition duration-200 hover:-translate-y-0.5 hover:bg-green-700 hover:shadow-xl hover:shadow-green-600/25 focus:outline-none focus:ring-4 focus:ring-green-500/20 active:translate-y-0 dark:bg-green-500 dark:hover:bg-green-600"
                                >

                                    <span>
                                        Se connecter
                                    </span>

                                    <svg
                                        class="h-5 w-5 transition-transform duration-200 group-hover:translate-x-1"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor"
                                        stroke-width="1.8"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M5 12h14M13 6l6 6-6 6"
                                        />
                                    </svg>

                                </button>

                                <div class="mt-7 text-center">

    <p class="text-sm text-slate-500 dark:text-slate-400">
        Vous n'avez pas encore de compte ?
    </p>

    <a href="{{ route('register') }}"
       class="mt-2 inline-flex items-center gap-2
              rounded-xl border border-green-200
              bg-green-50 px-4 py-2.5
              text-sm font-semibold text-green-700
              transition-all duration-200
              hover:-translate-y-0.5
              hover:border-green-300
              hover:bg-green-100
              hover:shadow-sm
              dark:border-green-500/20
              dark:bg-green-500/10
              dark:text-green-400
              dark:hover:border-green-500/30
              dark:hover:bg-green-500/15">

        Créer un compte

        <svg class="h-4 w-4" fill="none"
             stroke="currentColor"
             viewBox="0 0 24 24">
            <path stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M12 4v16m8-8H4"/>
        </svg>

    </a>

</div>

                            </form>


                            <!-- Sécurité -->
                            <div class="mt-7 flex items-center justify-center gap-2 text-xs text-slate-500 dark:text-slate-500">

                                <svg
                                    class="h-4 w-4 text-green-600 dark:text-green-400"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                    stroke-width="1.8"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M12 3 5 6v5c0 4.5 2.9 8.1 7 10 4.1-1.9 7-5.5 7-10V6l-7-3Z"
                                    />

                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="m9 12 2 2 4-4"
                                    />
                                </svg>

                                Connexion sécurisée

                            </div>

                        </div>


                        <!-- Retour -->
                        <div class="mt-6 text-center lg:hidden">

                            <a
                                href="{{ route('home') }}"
                                class="inline-flex items-center gap-2 text-sm font-medium text-slate-500 transition hover:text-green-600 dark:text-slate-400 dark:hover:text-green-400"
                            >
                                ← Retour à l'accueil
                            </a>

                        </div>

                    </div>

                </div>

            </div>

        </section>

    </main>

@endsection