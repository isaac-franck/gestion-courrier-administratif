{{-- ============================================================
     NAVBAR - PLATEFORME DE GESTION DU COURRIER
============================================================ --}}

<nav
    class="fixed inset-x-0 top-0 z-50 border-b
           border-slate-200/80 bg-white/95
           shadow-sm backdrop-blur-md
           dark:border-slate-800/80
           dark:bg-slate-950/95"
>

    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

        <div class="flex h-20 items-center justify-between">


            {{-- =================================================
                 LOGO CENADI
            ================================================== --}}

            <a
                href="{{ route('home') }}"
                class="flex shrink-0 items-center gap-3"
            >

                {{-- Logo --}}
                <div
                    class="flex h-11 w-11 items-center justify-center
                           overflow-hidden rounded-xl
                           bg-green-50
                           dark:bg-green-500/10"
                >

                    <img
                        src="{{ asset('images/cenadi.png') }}"
                        alt="Logo du CENADI"
                        class="h-9 w-9 object-contain"
                    >

                </div>


                {{-- Nom de la plateforme --}}
                <div class="hidden sm:block">

                    <span
                        class="block text-base font-bold leading-tight
                               text-slate-900 dark:text-white"
                    >
                        CENADI
                    </span>

                    <span
                        class="block text-[11px] font-medium
                               uppercase tracking-wide
                               text-slate-500
                               dark:text-slate-400"
                    >
                        Gestion du courrier
                    </span>

                </div>

            </a>


            {{-- =================================================
                 NAVIGATION DESKTOP
            ================================================== --}}

            <div class="hidden items-center gap-1 md:flex">

                {{-- Accueil --}}
                <a
                    href="#accueil"
                    class="rounded-lg px-3 py-2 text-sm font-medium
                           text-slate-600 transition
                           hover:bg-green-50 hover:text-green-700
                           dark:text-slate-300
                           dark:hover:bg-green-500/10
                           dark:hover:text-green-400"
                >
                    Accueil
                </a>


                {{-- À propos --}}
                <a
                    href="#a-propos"
                    class="rounded-lg px-3 py-2 text-sm font-medium
                           text-slate-600 transition
                           hover:bg-green-50 hover:text-green-700
                           dark:text-slate-300
                           dark:hover:bg-green-500/10
                           dark:hover:text-green-400"
                >
                    À propos
                </a>


                {{-- Fonctionnalités --}}
                <a
                    href="#fonctionnalites"
                    class="rounded-lg px-3 py-2 text-sm font-medium
                           text-slate-600 transition
                           hover:bg-green-50 hover:text-green-700
                           dark:text-slate-300
                           dark:hover:bg-green-500/10
                           dark:hover:text-green-400"
                >
                    Fonctionnalités
                </a>


                {{-- Processus --}}
                <a
                    href="#processus"
                    class="rounded-lg px-3 py-2 text-sm font-medium
                           text-slate-600 transition
                           hover:bg-green-50 hover:text-green-700
                           dark:text-slate-300
                           dark:hover:bg-green-500/10
                           dark:hover:text-green-400"
                >
                    Processus
                </a>


                {{-- Avantages --}}
                <a
                    href="#avantages"
                    class="rounded-lg px-3 py-2 text-sm font-medium
                           text-slate-600 transition
                           hover:bg-green-50 hover:text-green-700
                           dark:text-slate-300
                           dark:hover:bg-green-500/10
                           dark:hover:text-green-400"
                >
                    Avantages
                </a>


                {{-- Contact --}}
                <a
                    href="#contact"
                    class="rounded-lg px-3 py-2 text-sm font-medium
                           text-slate-600 transition
                           hover:bg-green-50 hover:text-green-700
                           dark:text-slate-300
                           dark:hover:bg-green-500/10
                           dark:hover:text-green-400"
                >
                    Contact
                </a>

            </div>


            {{-- =================================================
                 ACTIONS DESKTOP
            ================================================== --}}

            <div class="hidden items-center gap-3 md:flex">


                {{-- ==========================
                     BOUTON THÈME
                =========================== --}}

                <button
                    id="theme-toggle"
                    type="button"
                    aria-label="Changer le thème"
                    title="Changer le thème"
                    class="flex h-10 w-10 items-center justify-center
                           rounded-xl border
                           border-slate-200
                           bg-white
                           text-slate-600
                           transition-all duration-200
                           hover:border-green-300
                           hover:bg-green-50
                           hover:text-green-700
                           dark:border-slate-700
                           dark:bg-slate-900
                           dark:text-slate-300
                           dark:hover:border-green-500/30
                           dark:hover:bg-green-500/10
                           dark:hover:text-green-400"
                >

                    {{-- Soleil --}}

                    <svg
                        class="h-5 w-5 dark:hidden"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >

                        <circle
                            cx="12"
                            cy="12"
                            r="4"
                            stroke-width="2"
                        />

                        <path
                            stroke-linecap="round"
                            stroke-width="2"
                            d="M12 2v2
                               m0 16v2
                               M4.93 4.93l1.42 1.42
                               m11.31 11.31l1.41 1.41
                               M2 12h2
                               m16 0h2
                               M4.93 19.07l1.42-1.41
                               M17.66 6.34l1.41-1.41"
                        />

                    </svg>


                    {{-- Lune --}}

                    <svg
                        class="hidden h-5 w-5 dark:block"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M21 12.79
                               A9 9 0 1111.21 3
                               7 7 0 0021 12.79z"
                        />

                    </svg>

                </button>


                {{-- Séparateur --}}

                <div
                    class="h-7 w-px bg-slate-200
                           dark:bg-slate-800"
                ></div>


                {{-- ==========================
                     S'INSCRIRE
                =========================== --}}

                <a
                    href="{{ route('register') }}"
                    class="inline-flex items-center justify-center
                           rounded-xl border border-green-600
                           px-4 py-2.5
                           text-sm font-semibold
                           text-green-700
                           transition-all duration-200
                           hover:bg-green-50
                           hover:shadow-sm
                           dark:border-green-500
                           dark:text-green-400
                           dark:hover:bg-green-500/10"
                >
                    S'inscrire
                </a>


                {{-- ==========================
                     SE CONNECTER
                =========================== --}}

                <a
                    href="{{ route('login') }}"
                    class="inline-flex items-center justify-center
                           gap-2 rounded-xl
                           bg-green-600
                           px-5 py-2.5
                           text-sm font-semibold
                           text-white
                           shadow-sm
                           shadow-green-600/20
                           transition-all duration-200
                           hover:-translate-y-0.5
                           hover:bg-green-700
                           hover:shadow-lg
                           dark:bg-green-500
                           dark:text-slate-950
                           dark:hover:bg-green-400"
                >

                    Se connecter

                    <svg
                        class="h-4 w-4"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M5 12h14
                               M13 6l6 6-6 6"
                        />

                    </svg>

                </a>

            </div>


            {{-- =================================================
                 ACTIONS MOBILE
            ================================================== --}}

            <div class="flex items-center gap-2 md:hidden">


                {{-- ==========================
                     THÈME MOBILE
                =========================== --}}

                <button
                    id="theme-toggle-mobile"
                    type="button"
                    aria-label="Changer le thème"
                    title="Changer le thème"
                    class="flex h-10 w-10 items-center justify-center
                           rounded-xl border
                           border-slate-200
                           bg-white
                           text-slate-600
                           transition-all duration-200
                           hover:border-green-300
                           hover:bg-green-50
                           hover:text-green-700
                           dark:border-slate-700
                           dark:bg-slate-900
                           dark:text-slate-300
                           dark:hover:border-green-500/30
                           dark:hover:bg-green-500/10
                           dark:hover:text-green-400"
                >

                    {{-- Soleil --}}

                    <svg
                        class="h-5 w-5 dark:hidden"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >

                        <circle
                            cx="12"
                            cy="12"
                            r="4"
                            stroke-width="2"
                        />

                        <path
                            stroke-linecap="round"
                            stroke-width="2"
                            d="M12 2v2
                               m0 16v2
                               M4.93 4.93l1.42 1.42
                               m11.31 11.31l1.41 1.41
                               M2 12h2
                               m16 0h2
                               M4.93 19.07l1.42-1.41
                               M17.66 6.34l1.41-1.41"
                        />

                    </svg>


                    {{-- Lune --}}

                    <svg
                        class="hidden h-5 w-5 dark:block"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M21 12.79
                               A9 9 0 1111.21 3
                               7 7 0 0021 12.79z"
                        />

                    </svg>

                </button>


                {{-- ==========================
                     HAMBURGER
                =========================== --}}

                <button
                    id="mobile-menu-button"
                    type="button"
                    aria-label="Ouvrir le menu"
                    aria-expanded="false"
                    class="flex h-10 w-10 items-center
                           justify-center rounded-xl border
                           border-slate-200
                           bg-white
                           text-slate-700
                           transition-all duration-200
                           hover:border-green-300
                           hover:bg-green-50
                           hover:text-green-700
                           dark:border-slate-700
                           dark:bg-slate-900
                           dark:text-slate-300
                           dark:hover:border-green-500/30
                           dark:hover:bg-green-500/10
                           dark:hover:text-green-400"
                >

                    {{-- Icône hamburger --}}

                    <svg
                        id="menu-open-icon"
                        class="h-5 w-5"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M4 6h16
                               M4 12h16
                               M4 18h16"
                        />

                    </svg>


                    {{-- Icône X --}}

                    <svg
                        id="menu-close-icon"
                        class="hidden h-5 w-5"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M6 18L18 6
                               M6 6l12 12"
                        />

                    </svg>

                </button>

            </div>

        </div>

    </div>


    {{-- ============================================================
         MENU MOBILE
    ============================================================= --}}

    <div
        id="mobile-menu"
        class="hidden border-t
               border-slate-200
               bg-white
               dark:border-slate-800
               dark:bg-slate-950
               md:hidden"
    >

        <div class="space-y-1 px-5 py-5">


            {{-- ==========================
                 NAVIGATION
            =========================== --}}

            <a
                href="#accueil"
                class="mobile-menu-link block rounded-xl
                       px-4 py-3 text-sm font-medium
                       text-slate-700 transition
                       hover:bg-green-50
                       hover:text-green-700
                       dark:text-slate-300
                       dark:hover:bg-green-500/10
                       dark:hover:text-green-400"
            >
                Accueil
            </a>


            <a
                href="#a-propos"
                class="mobile-menu-link block rounded-xl
                       px-4 py-3 text-sm font-medium
                       text-slate-700 transition
                       hover:bg-green-50
                       hover:text-green-700
                       dark:text-slate-300
                       dark:hover:bg-green-500/10
                       dark:hover:text-green-400"
            >
                À propos
            </a>


            <a
                href="#fonctionnalites"
                class="mobile-menu-link block rounded-xl
                       px-4 py-3 text-sm font-medium
                       text-slate-700 transition
                       hover:bg-green-50
                       hover:text-green-700
                       dark:text-slate-300
                       dark:hover:bg-green-500/10
                       dark:hover:text-green-400"
            >
                Fonctionnalités
            </a>


            <a
                href="#processus"
                class="mobile-menu-link block rounded-xl
                       px-4 py-3 text-sm font-medium
                       text-slate-700 transition
                       hover:bg-green-50
                       hover:text-green-700
                       dark:text-slate-300
                       dark:hover:bg-green-500/10
                       dark:hover:text-green-400"
            >
                Processus
            </a>


            <a
                href="#avantages"
                class="mobile-menu-link block rounded-xl
                       px-4 py-3 text-sm font-medium
                       text-slate-700 transition
                       hover:bg-green-50
                       hover:text-green-700
                       dark:text-slate-300
                       dark:hover:bg-green-500/10
                       dark:hover:text-green-400"
            >
                Avantages
            </a>


            <a
                href="#contact"
                class="mobile-menu-link block rounded-xl
                       px-4 py-3 text-sm font-medium
                       text-slate-700 transition
                       hover:bg-green-50
                       hover:text-green-700
                       dark:text-slate-300
                       dark:hover:bg-green-500/10
                       dark:hover:text-green-400"
            >
                Contact
            </a>


            {{-- Séparateur --}}

            <div
                class="my-4 border-t
                       border-slate-200
                       dark:border-slate-800"
            ></div>


            {{-- =================================================
                 BOUTONS AUTHENTIFICATION MOBILE
            ================================================== --}}

            <div class="grid gap-3 sm:grid-cols-2">


                {{-- ==========================
                     S'INSCRIRE
                =========================== --}}

                <a
                    href="{{ route('register') }}"
                    class="mobile-menu-link
                           flex w-full items-center
                           justify-center gap-2
                           rounded-xl border
                           border-green-600
                           px-4 py-3
                           text-sm font-semibold
                           text-green-700
                           transition-all duration-200
                           hover:bg-green-50
                           hover:shadow-sm
                           dark:border-green-500
                           dark:text-green-400
                           dark:hover:bg-green-500/10"
                >

                    <svg
                        class="h-5 w-5"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M12 4v16
                               M4 12h16"
                        />

                    </svg>

                    S'inscrire

                </a>


                {{-- ==========================
                     SE CONNECTER
                =========================== --}}

                <a
                    href="{{ route('login') }}"
                    class="mobile-menu-link
                           flex w-full items-center
                           justify-center gap-2
                           rounded-xl
                           bg-green-600
                           px-4 py-3
                           text-sm font-semibold
                           text-white
                           shadow-sm
                           shadow-green-600/20
                           transition-all duration-200
                           hover:-translate-y-0.5
                           hover:bg-green-700
                           hover:shadow-md
                           dark:bg-green-500
                           dark:text-slate-950
                           dark:hover:bg-green-400"
                >

                    Se connecter

                    <svg
                        class="h-4 w-4"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M5 12h14
                               M13 6l6 6-6 6"
                        />

                    </svg>

                </a>

            </div>

        </div>

    </div>

</nav>