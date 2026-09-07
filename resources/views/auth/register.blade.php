@extends('layouts.app')

@section('content')

    @include('components.navbar')

    <main class="min-h-screen bg-slate-50 pt-20 text-slate-900
                 dark:bg-slate-950 dark:text-slate-100">

        <section class="relative overflow-hidden">

            {{-- Décorations --}}
            <div class="pointer-events-none absolute -left-32 -top-32
                        h-80 w-80 rounded-full bg-green-500/10 blur-3xl
                        dark:bg-green-500/10">
            </div>

            <div class="pointer-events-none absolute -right-32 top-20
                        h-96 w-96 rounded-full bg-yellow-400/10 blur-3xl
                        dark:bg-yellow-400/10">
            </div>


            <div class="relative mx-auto grid min-h-[calc(100vh-5rem)]
                        max-w-7xl items-center gap-12 px-6 py-12
                        lg:grid-cols-2 lg:px-8">


                {{-- ============================= --}}
                {{-- PARTIE GAUCHE --}}
                {{-- ============================= --}}

                <div class="hidden lg:block">

                    <span class="inline-flex items-center rounded-full
                                 bg-green-100 px-4 py-2 text-sm font-semibold
                                 text-green-700
                                 dark:bg-green-500/10 dark:text-green-400">

                        INSCRIPTION
                    </span>

                    <h1 class="mt-6 max-w-xl text-4xl font-bold leading-tight
                               tracking-tight text-slate-900
                               dark:text-white xl:text-5xl">

                        Créez votre compte et
                        <span class="text-green-600 dark:text-green-400">
                            envoyez vos courriers
                        </span>
                        au CENADI.
                    </h1>

                    <p class="mt-6 max-w-xl text-lg leading-8
                              text-slate-600 dark:text-slate-400">

                        Créez votre espace personnel pour transmettre vos
                        courriers administratifs au CENADI et suivre leur
                        traitement depuis une plateforme unique.
                    </p>


                    {{-- Avantages --}}

                    <div class="mt-10 space-y-5">

                        <div class="flex items-start gap-4">

                            <div class="flex h-11 w-11 shrink-0 items-center
                                        justify-center rounded-xl
                                        bg-green-100 text-green-600
                                        dark:bg-green-500/10
                                        dark:text-green-400">

                                {{-- Icône sécurité --}}
                                <svg class="h-5 w-5" fill="none"
                                     stroke="currentColor"
                                     viewBox="0 0 24 24">
                                    <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          stroke-width="2"
                                          d="M12 15v2m-6 4h12a2 2 0 002-2V9a2 2 0 00-2-2H6a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                    <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          stroke-width="2"
                                          d="M8 7V5a4 4 0 118 0v2"/>
                                </svg>

                            </div>

                            <div>
                                <h3 class="font-semibold text-slate-900
                                           dark:text-white">
                                    Un accès sécurisé
                                </h3>

                                <p class="mt-1 text-sm leading-6
                                          text-slate-600 dark:text-slate-400">
                                    Vos informations personnelles sont
                                    associées à votre espace personnel.
                                </p>
                            </div>

                        </div>


                        <div class="flex items-start gap-4">

                            <div class="flex h-11 w-11 shrink-0 items-center
                                        justify-center rounded-xl
                                        bg-yellow-100 text-yellow-600
                                        dark:bg-yellow-500/10
                                        dark:text-yellow-400">

                                {{-- Icône courrier --}}
                                <svg class="h-5 w-5" fill="none"
                                     stroke="currentColor"
                                     viewBox="0 0 24 24">
                                    <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          stroke-width="2"
                                          d="M3 8l9 6 9-6M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>

                            </div>

                            <div>
                                <h3 class="font-semibold text-slate-900
                                           dark:text-white">
                                    Envoyez vos courriers
                                </h3>

                                <p class="mt-1 text-sm leading-6
                                          text-slate-600 dark:text-slate-400">
                                    Transmettez facilement vos courriers
                                    administratifs au CENADI.
                                </p>
                            </div>

                        </div>


                        <div class="flex items-start gap-4">

                            <div class="flex h-11 w-11 shrink-0 items-center
                                        justify-center rounded-xl
                                        bg-green-100 text-green-600
                                        dark:bg-green-500/10
                                        dark:text-green-400">

                                {{-- Icône suivi --}}
                                <svg class="h-5 w-5" fill="none"
                                     stroke="currentColor"
                                     viewBox="0 0 24 24">
                                    <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          stroke-width="2"
                                          d="M9 12l2 2 4-4"/>
                                    <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          stroke-width="2"
                                          d="M12 3a9 9 0 100 18 9 9 0 000-18z"/>
                                </svg>

                            </div>

                            <div>
                                <h3 class="font-semibold text-slate-900
                                           dark:text-white">
                                    Suivez vos demandes
                                </h3>

                                <p class="mt-1 text-sm leading-6
                                          text-slate-600 dark:text-slate-400">
                                    Consultez l'état de traitement de vos
                                    courriers depuis votre espace.
                                </p>
                            </div>

                        </div>

                    </div>

                </div>


                {{-- ============================= --}}
                {{-- FORMULAIRE --}}
                {{-- ============================= --}}

                <div class="w-full max-w-xl lg:ml-auto">

                    {{-- Retour accueil --}}
                    <div class="mb-6">

                        <a href="{{ route('home') }}"
                           class="inline-flex items-center gap-2 text-sm
                                  font-medium text-slate-600
                                  transition hover:text-green-600
                                  dark:text-slate-400
                                  dark:hover:text-green-400">

                            <svg class="h-4 w-4" fill="none"
                                 stroke="currentColor"
                                 viewBox="0 0 24 24">
                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M15 19l-7-7 7-7"/>
                            </svg>

                            Retour à l'accueil

                        </a>

                    </div>


                    {{-- Carte formulaire --}}

                    <div class="rounded-3xl border border-slate-200
                                bg-white p-6 shadow-xl shadow-slate-200/40
                                dark:border-slate-800
                                dark:bg-slate-900
                                dark:shadow-black/20
                                sm:p-8">

                        {{-- En-tête --}}

                        <div class="mb-8">

                            <div class="mb-4 flex h-12 w-12 items-center
                                        justify-center rounded-2xl
                                        bg-green-100 text-green-600
                                        dark:bg-green-500/10
                                        dark:text-green-400">

                                <svg class="h-6 w-6" fill="none"
                                     stroke="currentColor"
                                     viewBox="0 0 24 24">
                                    <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          stroke-width="2"
                                          d="M16 21v-2a4 4 0 00-4-4H6a4 4 0 00-4 4v2"/>
                                    <circle cx="9" cy="7" r="4"
                                            stroke-width="2"/>
                                    <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          stroke-width="2"
                                          d="M19 8v6M22 11h-6"/>
                                </svg>

                            </div>

                            <h2 class="text-2xl font-bold text-slate-900
                                       dark:text-white">
                                Créer un compte
                            </h2>

                            <p class="mt-2 text-sm text-slate-600
                                      dark:text-slate-400">
                                Remplissez les informations ci-dessous pour
                                créer votre espace expéditeur.
                            </p>

                        </div>


                        {{-- Erreurs de validation --}}

                        @if ($errors->any())

                            <div class="mb-6 rounded-xl border
                                        border-red-200 bg-red-50 p-4
                                        dark:border-red-900/50
                                        dark:bg-red-950/30">

                                <ul class="space-y-1 text-sm text-red-600
                                           dark:text-red-400">

                                    @foreach ($errors->all() as $error)

                                        <li>
                                            {{ $error }}
                                        </li>

                                    @endforeach

                                </ul>

                            </div>

                        @endif


                        <form action="{{ route('register') }}"
                              method="POST"
                              class="space-y-5">

                            @csrf


                            {{-- Nom + Prénom --}}

                            <div class="grid gap-5 sm:grid-cols-2">

                                <div>

                                    <label for="nom"
                                           class="mb-2 block text-sm
                                                  font-medium
                                                  text-slate-700
                                                  dark:text-slate-300">
                                        Nom
                                    </label>

                                    <input
                                        type="text"
                                        id="nom"
                                        name="nom"
                                        value="{{ old('nom') }}"
                                        required
                                        autocomplete="family-name"
                                        placeholder="Votre nom"
                                        class="w-full rounded-xl border
                                               border-slate-300 bg-white
                                               px-4 py-3 text-sm
                                               text-slate-900 outline-none
                                               transition
                                               placeholder:text-slate-400
                                               focus:border-green-500
                                               focus:ring-4
                                               focus:ring-green-500/10
                                               dark:border-slate-700
                                               dark:bg-slate-950
                                               dark:text-white
                                               dark:placeholder:text-slate-500">
                                </div>


                                <div>

                                    <label for="prenom"
                                           class="mb-2 block text-sm
                                                  font-medium
                                                  text-slate-700
                                                  dark:text-slate-300">
                                        Prénom
                                    </label>

                                    <input
                                        type="text"
                                        id="prenom"
                                        name="prenom"
                                        value="{{ old('prenom') }}"
                                        required
                                        autocomplete="given-name"
                                        placeholder="Votre prénom"
                                        class="w-full rounded-xl border
                                               border-slate-300 bg-white
                                               px-4 py-3 text-sm
                                               text-slate-900 outline-none
                                               transition
                                               placeholder:text-slate-400
                                               focus:border-green-500
                                               focus:ring-4
                                               focus:ring-green-500/10
                                               dark:border-slate-700
                                               dark:bg-slate-950
                                               dark:text-white
                                               dark:placeholder:text-slate-500">
                                </div>

                            </div>


                            {{-- Email --}}

                            <div>

                                <label for="email"
                                       class="mb-2 block text-sm
                                              font-medium
                                              text-slate-700
                                              dark:text-slate-300">
                                    Adresse e-mail
                                </label>

                                <input
                                    type="email"
                                    id="email"
                                    name="email"
                                    value="{{ old('email') }}"
                                    required
                                    autocomplete="email"
                                    placeholder="exemple@email.com"
                                    class="w-full rounded-xl border
                                           border-slate-300 bg-white
                                           px-4 py-3 text-sm
                                           text-slate-900 outline-none
                                           transition
                                           placeholder:text-slate-400
                                           focus:border-green-500
                                           focus:ring-4
                                           focus:ring-green-500/10
                                           dark:border-slate-700
                                           dark:bg-slate-950
                                           dark:text-white
                                           dark:placeholder:text-slate-500">

                            </div>


                            {{-- Téléphone --}}

                            <div>

                                <label for="telephone"
                                       class="mb-2 block text-sm
                                              font-medium
                                              text-slate-700
                                              dark:text-slate-300">
                                    Numéro de téléphone
                                </label>

                                <input
                                    type="tel"
                                    id="telephone"
                                    name="telephone"
                                    value="{{ old('telephone') }}"
                                    autocomplete="tel"
                                    placeholder="+237 6XX XXX XXX"
                                    class="w-full rounded-xl border
                                           border-slate-300 bg-white
                                           px-4 py-3 text-sm
                                           text-slate-900 outline-none
                                           transition
                                           placeholder:text-slate-400
                                           focus:border-green-500
                                           focus:ring-4
                                           focus:ring-green-500/10
                                           dark:border-slate-700
                                           dark:bg-slate-950
                                           dark:text-white
                                           dark:placeholder:text-slate-500">

                            </div>


                            {{-- Mot de passe --}}

                            <div>

                                <label for="password"
                                       class="mb-2 block text-sm
                                              font-medium
                                              text-slate-700
                                              dark:text-slate-300">
                                    Mot de passe
                                </label>

                                <input
                                    type="password"
                                    id="password"
                                    name="password"
                                    required
                                    autocomplete="new-password"
                                    placeholder="••••••••"
                                    class="w-full rounded-xl border
                                           border-slate-300 bg-white
                                           px-4 py-3 text-sm
                                           text-slate-900 outline-none
                                           transition
                                           placeholder:text-slate-400
                                           focus:border-green-500
                                           focus:ring-4
                                           focus:ring-green-500/10
                                           dark:border-slate-700
                                           dark:bg-slate-950
                                           dark:text-white">

                            </div>


                            {{-- Confirmation --}}

                            <div>

                                <label for="password_confirmation"
                                       class="mb-2 block text-sm
                                              font-medium
                                              text-slate-700
                                              dark:text-slate-300">
                                    Confirmer le mot de passe
                                </label>

                                <input
                                    type="password"
                                    id="password_confirmation"
                                    name="password_confirmation"
                                    required
                                    autocomplete="new-password"
                                    placeholder="••••••••"
                                    class="w-full rounded-xl border
                                           border-slate-300 bg-white
                                           px-4 py-3 text-sm
                                           text-slate-900 outline-none
                                           transition
                                           placeholder:text-slate-400
                                           focus:border-green-500
                                           focus:ring-4
                                           focus:ring-green-500/10
                                           dark:border-slate-700
                                           dark:bg-slate-950
                                           dark:text-white">

                            </div>


                            {{-- Bouton --}}

                            <button
                                type="submit"
                                class="flex w-full items-center
                                       justify-center gap-2 rounded-xl
                                       bg-green-600 px-5 py-3.5
                                       text-sm font-semibold text-white
                                       shadow-lg shadow-green-600/20
                                       transition hover:bg-green-700
                                       focus:outline-none
                                       focus:ring-4
                                       focus:ring-green-500/20
                                       dark:bg-green-500
                                       dark:text-slate-950
                                       dark:hover:bg-green-400">

                                Créer mon compte

                                <svg class="h-4 w-4" fill="none"
                                     stroke="currentColor"
                                     viewBox="0 0 24 24">
                                    <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          stroke-width="2"
                                          d="M5 12h14M13 6l6 6-6 6"/>
                                </svg>

                            </button>

                        </form>


                        {{-- Connexion --}}

                        <div class="mt-6 border-t border-slate-200 pt-6
                                    text-center dark:border-slate-800">

                            <p class="text-sm text-slate-600
                                      dark:text-slate-400">

                                Vous avez déjà un compte ?

                                <a href="{{ route('login') }}"
                                   class="font-semibold text-green-600
                                          hover:text-green-700
                                          dark:text-green-400
                                          dark:hover:text-green-300">
                                    Se connecter
                                </a>

                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </section>

    </main>

@endsection