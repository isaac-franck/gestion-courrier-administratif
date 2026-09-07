<section id="processus"
    class="relative overflow-hidden bg-slate-50 py-24 dark:bg-slate-950">

    {{-- Décorations --}}
    <div class="pointer-events-none absolute -left-32 top-20 h-72 w-72
                rounded-full bg-green-500/10 blur-3xl">
    </div>

    <div class="pointer-events-none absolute -right-32 bottom-20 h-72 w-72
                rounded-full bg-green-500/10 blur-3xl">
    </div>


    <div class="relative mx-auto max-w-7xl px-6 lg:px-8">

        {{-- ========================= --}}
        {{-- EN-TÊTE --}}
        {{-- ========================= --}}

        <div class="mx-auto max-w-3xl text-center">

            <span class="inline-flex items-center rounded-full
                         border border-green-200 bg-green-50
                         px-4 py-1.5 text-sm font-semibold
                         text-green-700
                         dark:border-green-900/50
                         dark:bg-green-950/40
                         dark:text-green-400">

                NOTRE PROCESSUS

            </span>


            <h2 class="mt-5 text-3xl font-bold tracking-tight
                       text-slate-900 sm:text-4xl lg:text-5xl
                       dark:text-white">

                Comment ça fonctionne ?

            </h2>


            <p class="mt-5 text-lg leading-8
                      text-slate-600 dark:text-slate-400">

                De la réception à la réponse, chaque courrier suit
                un processus structuré permettant d'assurer son
                suivi et son traitement efficace.

            </p>

        </div>


        {{-- ========================= --}}
        {{-- PROCESSUS --}}
        {{-- ========================= --}}

        <div class="relative mt-20">


            {{-- Ligne horizontale desktop --}}
            <div class="absolute left-[10%] right-[10%] top-12
                        hidden h-0.5 bg-slate-200
                        lg:block dark:bg-slate-800">
            </div>


            {{-- Ligne de progression --}}
            <div id="process-progress"
                class="absolute left-[10%] top-12 hidden h-0.5
                       w-0 bg-green-600 transition-all
                       duration-1000 ease-out
                       lg:block dark:bg-green-500">
            </div>


            <div class="grid gap-12 lg:grid-cols-5 lg:gap-6">


                {{-- ========================= --}}
                {{-- ÉTAPE 1 --}}
                {{-- ========================= --}}

                <article class="process-step group relative text-center">

                    <div class="relative z-10 mx-auto flex h-24 w-24
                                items-center justify-center rounded-full
                                border-8 border-slate-50
                                bg-white shadow-lg
                                transition duration-300
                                group-hover:scale-110
                                group-hover:border-green-50
                                dark:border-slate-950
                                dark:bg-slate-900
                                dark:group-hover:border-green-950">

                        <div class="flex h-14 w-14 items-center justify-center
                                    rounded-full bg-green-100
                                    text-green-600
                                    dark:bg-green-950
                                    dark:text-green-400">

                            {{-- Icône réception --}}
                            <svg xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.8"
                                stroke="currentColor"
                                class="h-7 w-7">

                                <path stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M3 8.25 12 3l9 5.25M4.5 9.75V18L12 21l7.5-3V9.75M3 8.25l9 5.25 9-5.25M12 13.5V21"/>

                            </svg>

                        </div>

                    </div>


                    <span class="mt-5 block text-xs font-bold
                                 uppercase tracking-widest
                                 text-green-600 dark:text-green-400">

                        ÉTAPE 01

                    </span>


                    <h3 class="mt-2 text-lg font-bold
                               text-slate-900 dark:text-white">

                        Réception

                    </h3>


                    <p class="mx-auto mt-3 max-w-xs text-sm leading-6
                              text-slate-500 dark:text-slate-400">

                        Le courrier est reçu par l'organisation
                        et identifié pour son traitement.

                    </p>

                </article>



                {{-- ========================= --}}
                {{-- ÉTAPE 2 --}}
                {{-- ========================= --}}

                <article class="process-step group relative text-center">

                    <div class="relative z-10 mx-auto flex h-24 w-24
                                items-center justify-center rounded-full
                                border-8 border-slate-50
                                bg-white shadow-lg
                                transition duration-300
                                group-hover:scale-110
                                group-hover:border-green-50
                                dark:border-slate-950
                                dark:bg-slate-900
                                dark:group-hover:border-green-950">

                        <div class="flex h-14 w-14 items-center justify-center
                                    rounded-full bg-green-100
                                    text-green-600
                                    dark:bg-green-950
                                    dark:text-green-400">

                            {{-- Icône enregistrement --}}
                            <svg xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.8"
                                stroke="currentColor"
                                class="h-7 w-7">

                                <path stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M6 4.5h12A1.5 1.5 0 0 1 19.5 6v12a1.5 1.5 0 0 1-1.5 1.5H6A1.5 1.5 0 0 1 4.5 18V6A1.5 1.5 0 0 1 6 4.5Z"/>

                                <path stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M8 8h8M8 12h8M8 16h5"/>

                            </svg>

                        </div>

                    </div>


                    <span class="mt-5 block text-xs font-bold
                                 uppercase tracking-widest
                                 text-green-600 dark:text-green-400">

                        ÉTAPE 02

                    </span>


                    <h3 class="mt-2 text-lg font-bold
                               text-slate-900 dark:text-white">

                        Enregistrement

                    </h3>


                    <p class="mx-auto mt-3 max-w-xs text-sm leading-6
                              text-slate-500 dark:text-slate-400">

                        Les informations du courrier sont enregistrées
                        dans la plateforme.

                    </p>

                </article>



                {{-- ========================= --}}
                {{-- ÉTAPE 3 --}}
                {{-- ========================= --}}

                <article class="process-step group relative text-center">

                    <div class="relative z-10 mx-auto flex h-24 w-24
                                items-center justify-center rounded-full
                                border-8 border-slate-50
                                bg-white shadow-lg
                                transition duration-300
                                group-hover:scale-110
                                group-hover:border-green-50
                                dark:border-slate-950
                                dark:bg-slate-900
                                dark:group-hover:border-green-950">

                        <div class="flex h-14 w-14 items-center justify-center
                                    rounded-full bg-green-100
                                    text-green-600
                                    dark:bg-green-950
                                    dark:text-green-400">

                            {{-- Icône attribution --}}
                            <svg xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.8"
                                stroke="currentColor"
                                class="h-7 w-7">

                                <path stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M12 6v12M6 12h12"/>

                                <path stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M5 6.5A2.5 2.5 0 0 1 7.5 4h9A2.5 2.5 0 0 1 19 6.5v11a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 5 17.5v-11Z"/>

                            </svg>

                        </div>

                    </div>


                    <span class="mt-5 block text-xs font-bold
                                 uppercase tracking-widest
                                 text-green-600 dark:text-green-400">

                        ÉTAPE 03

                    </span>


                    <h3 class="mt-2 text-lg font-bold
                               text-slate-900 dark:text-white">

                        Attribution

                    </h3>


                    <p class="mx-auto mt-3 max-w-xs text-sm leading-6
                              text-slate-500 dark:text-slate-400">

                        Le courrier est orienté vers le service
                        ou le responsable concerné.

                    </p>

                </article>



                {{-- ========================= --}}
                {{-- ÉTAPE 4 --}}
                {{-- ========================= --}}

                <article class="process-step group relative text-center">

                    <div class="relative z-10 mx-auto flex h-24 w-24
                                items-center justify-center rounded-full
                                border-8 border-slate-50
                                bg-white shadow-lg
                                transition duration-300
                                group-hover:scale-110
                                group-hover:border-green-50
                                dark:border-slate-950
                                dark:bg-slate-900
                                dark:group-hover:border-green-950">

                        <div class="flex h-14 w-14 items-center justify-center
                                    rounded-full bg-green-100
                                    text-green-600
                                    dark:bg-green-950
                                    dark:text-green-400">

                            {{-- Icône traitement --}}
                            <svg xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.8"
                                stroke="currentColor"
                                class="h-7 w-7">

                                <path stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M12 3v18M3 12h18"/>

                                <path stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="m5.5 5.5 13 13M18.5 5.5l-13 13"/>

                            </svg>

                        </div>

                    </div>


                    <span class="mt-5 block text-xs font-bold
                                 uppercase tracking-widest
                                 text-green-600 dark:text-green-400">

                        ÉTAPE 04

                    </span>


                    <h3 class="mt-2 text-lg font-bold
                               text-slate-900 dark:text-white">

                        Traitement

                    </h3>


                    <p class="mx-auto mt-3 max-w-xs text-sm leading-6
                              text-slate-500 dark:text-slate-400">

                        Le service concerné analyse le courrier
                        et effectue les actions nécessaires.

                    </p>

                </article>



                {{-- ========================= --}}
                {{-- ÉTAPE 5 --}}
                {{-- ========================= --}}

                <article class="process-step group relative text-center">

                    <div class="relative z-10 mx-auto flex h-24 w-24
                                items-center justify-center rounded-full
                                border-8 border-slate-50
                                bg-white shadow-lg
                                transition duration-300
                                group-hover:scale-110
                                group-hover:border-green-50
                                dark:border-slate-950
                                dark:bg-slate-900
                                dark:group-hover:border-green-950">

                        <div class="flex h-14 w-14 items-center justify-center
                                    rounded-full bg-green-100
                                    text-green-600
                                    dark:bg-green-950
                                    dark:text-green-400">

                            {{-- Icône réponse --}}
                            <svg xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.8"
                                stroke="currentColor"
                                class="h-7 w-7">

                                <path stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M4 12a8 8 0 1 0 16 0"/>

                                <path stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M4 12V6m0 6 5-3M20 12v6m0-6-5 3"/>

                            </svg>

                        </div>

                    </div>


                    <span class="mt-5 block text-xs font-bold
                                 uppercase tracking-widest
                                 text-green-600 dark:text-green-400">

                        ÉTAPE 05

                    </span>


                    <h3 class="mt-2 text-lg font-bold
                               text-slate-900 dark:text-white">

                        Réponse

                    </h3>


                    <p class="mx-auto mt-3 max-w-xs text-sm leading-6
                              text-slate-500 dark:text-slate-400">

                        Une réponse est préparée et transmise
                        à l'expéditeur du courrier.

                    </p>

                </article>

            </div>

        </div>


        {{-- ========================= --}}
        {{-- MESSAGE FINAL --}}
        {{-- ========================= --}}

        <div class="mx-auto mt-20 max-w-4xl">

            <div class="rounded-3xl border border-green-200
                        bg-green-50 p-8 text-center
                        dark:border-green-900/50
                        dark:bg-green-950/20 sm:p-10">

                <div class="mx-auto flex h-14 w-14 items-center
                            justify-center rounded-2xl
                            bg-green-600 text-white
                            shadow-lg shadow-green-600/20">

                    <svg xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="2"
                        stroke="currentColor"
                        class="h-7 w-7">

                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            d="m5 12 4 4L19 6"/>

                    </svg>

                </div>


                <h3 class="mt-5 text-2xl font-bold
                           text-slate-900 dark:text-white">

                    Un courrier, un suivi, une réponse.

                </h3>


                <p class="mx-auto mt-3 max-w-2xl text-base
                          leading-7 text-slate-600
                          dark:text-slate-400">

                    La plateforme permet de suivre l'évolution de chaque
                    courrier et de faciliter la collaboration entre
                    les différents services.

                </p>

            </div>

        </div>

    </div>

</section>