<section id="contact"
    class="relative overflow-hidden bg-slate-50 py-24 dark:bg-slate-950">

    {{-- ======================================== --}}
    {{-- DÉCORATIONS D'ARRIÈRE-PLAN --}}
    {{-- ======================================== --}}

    <div class="pointer-events-none absolute -left-32 top-1/2
                h-80 w-80 -translate-y-1/2 rounded-full
                bg-green-500/20 blur-3xl">
    </div>

    <div class="pointer-events-none absolute -right-32 top-1/2
                h-80 w-80 -translate-y-1/2 rounded-full
                bg-green-500/20 blur-3xl">
    </div>


    <div class="relative mx-auto max-w-7xl px-6 lg:px-8">

        {{-- ======================================== --}}
        {{-- BLOC PRINCIPAL --}}
        {{-- ======================================== --}}

        <div class="relative overflow-hidden rounded-[2rem]
                    bg-slate-900 px-6 py-16 shadow-2xl
                    sm:px-10 lg:px-16 lg:py-20
                    dark:bg-slate-800">


            {{-- Dégradé décoratif --}}
            <div class="pointer-events-none absolute inset-0
                        bg-gradient-to-br from-green-600/20
                        via-transparent to-transparent">
            </div>


            {{-- Cercles décoratifs --}}
            <div class="pointer-events-none absolute -right-24 -top-24
                        h-72 w-72 rounded-full border
                        border-green-400/10">
            </div>

            <div class="pointer-events-none absolute -right-10 -top-10
                        h-44 w-44 rounded-full border
                        border-green-400/10">
            </div>


            <div class="relative mx-auto max-w-4xl text-center">


                {{-- ======================================== --}}
                {{-- BADGE --}}
                {{-- ======================================== --}}

                <div class="inline-flex items-center gap-2 rounded-full
                            border border-green-400/20
                            bg-green-500/10 px-4 py-2
                            text-sm font-semibold text-green-400">

                    <span class="relative flex h-2.5 w-2.5">

                        <span class="absolute inline-flex h-full w-full
                                     animate-ping rounded-full
                                     bg-green-400 opacity-75">
                        </span>

                        <span class="relative inline-flex h-2.5 w-2.5
                                     rounded-full bg-green-400">
                        </span>

                    </span>

                    UNE GESTION PLUS SIMPLE

                </div>


                {{-- ======================================== --}}
                {{-- TITRE --}}
                {{-- ======================================== --}}

                <h2 class="mt-6 text-3xl font-bold tracking-tight
                           text-white sm:text-4xl lg:text-5xl">

                    Simplifiez dès maintenant la gestion
                    de vos courriers administratifs.

                </h2>


                {{-- ======================================== --}}
                {{-- DESCRIPTION --}}
                {{-- ======================================== --}}

                <p class="mx-auto mt-6 max-w-2xl text-base
                          leading-7 text-slate-300 sm:text-lg">

                    Centralisez vos courriers, suivez leur traitement
                    et facilitez les échanges entre les différents
                    services grâce à une plateforme conçue pour
                    simplifier votre quotidien.

                </p>


                {{-- ======================================== --}}
                {{-- BOUTONS --}}
                {{-- ======================================== --}}

                <div class="mt-10 flex flex-col items-center
                            justify-center gap-4 sm:flex-row">


                    {{-- Bouton principal --}}
                    <a href="{{ route('login') }}"
                       class="group inline-flex w-full items-center
                              justify-center gap-2 rounded-xl
                              bg-green-500 px-6 py-3.5
                              text-sm font-bold text-white
                              shadow-lg shadow-green-500/20
                              transition-all duration-300
                              hover:-translate-y-1
                              hover:bg-green-400
                              hover:shadow-xl
                              hover:shadow-green-500/30
                              sm:w-auto">

                        Se connecter à la plateforme

                        <svg xmlns="http://www.w3.org/2000/svg"
                             fill="none"
                             viewBox="0 0 24 24"
                             stroke-width="2"
                             stroke="currentColor"
                             class="h-5 w-5 transition-transform
                                    duration-300
                                    group-hover:translate-x-1">

                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  d="M13.5 6H19m0 0v5.5M19 6l-7 7"/>

                        </svg>

                    </a>


                    {{-- Bouton secondaire --}}
                    <a href="#"
                       onclick="window.scrollTo({
                           top: 0,
                           behavior: 'smooth'
                       }); return false;"
                       class="inline-flex w-full items-center
                              justify-center gap-2 rounded-xl
                              border border-slate-700
                              bg-slate-800 px-6 py-3.5
                              text-sm font-semibold text-slate-200
                              transition-all duration-300
                              hover:border-slate-600
                              hover:bg-slate-700
                              sm:w-auto">

                        Retour à l'accueil

                        <svg xmlns="http://www.w3.org/2000/svg"
                             fill="none"
                             viewBox="0 0 24 24"
                             stroke-width="2"
                             stroke="currentColor"
                             class="h-4 w-4">

                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  d="M5 12h14M12 5l7 7-7 7"/>

                        </svg>

                    </a>

                </div>


                {{-- ======================================== --}}
                {{-- PETITE GARANTIE / RAPPEL --}}
                {{-- ======================================== --}}

                <div class="mt-8 flex flex-wrap items-center
                            justify-center gap-x-6 gap-y-3
                            text-sm text-slate-400">

                    <div class="flex items-center gap-2">

                        <svg xmlns="http://www.w3.org/2000/svg"
                             fill="none"
                             viewBox="0 0 24 24"
                             stroke-width="2"
                             stroke="currentColor"
                             class="h-4 w-4 text-green-400">

                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  d="m5 12 4 4L19 6"/>

                        </svg>

                        Suivi des courriers

                    </div>


                    <div class="hidden h-1 w-1 rounded-full
                                bg-slate-600 sm:block">
                    </div>


                    <div class="flex items-center gap-2">

                        <svg xmlns="http://www.w3.org/2000/svg"
                             fill="none"
                             viewBox="0 0 24 24"
                             stroke-width="2"
                             stroke="currentColor"
                             class="h-4 w-4 text-green-400">

                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  d="m5 12 4 4L19 6"/>

                        </svg>

                        Gestion centralisée

                    </div>


                    <div class="hidden h-1 w-1 rounded-full
                                bg-slate-600 sm:block">
                    </div>


                    <div class="flex items-center gap-2">

                        <svg xmlns="http://www.w3.org/2000/svg"
                             fill="none"
                             viewBox="0 0 24 24"
                             stroke-width="2"
                             stroke="currentColor"
                             class="h-4 w-4 text-green-400">

                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  d="m5 12 4 4L19 6"/>

                        </svg>

                        Accès sécurisé

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>