<section id="a-propos" class="relative overflow-hidden bg-white py-20 dark:bg-slate-950">

    {{-- Décoration --}}
    <div class="pointer-events-none absolute -left-32 top-20 h-72 w-72 rounded-full bg-green-500/10 blur-3xl"></div>
    <div class="pointer-events-none absolute -right-32 bottom-0 h-72 w-72 rounded-full bg-green-500/10 blur-3xl"></div>

    <div class="relative mx-auto max-w-7xl px-6 lg:px-8">

        {{-- En-tête --}}
        <div class="mx-auto max-w-3xl text-center">

            <span class="inline-flex items-center rounded-full border border-green-200
                         bg-green-50 px-4 py-1.5 text-sm font-semibold text-green-700
                         dark:border-green-900/50 dark:bg-green-950/40 dark:text-green-400">
                À PROPOS DU CENADI
            </span>

            <h2 class="mt-5 text-3xl font-bold tracking-tight text-slate-900
                       sm:text-4xl lg:text-5xl dark:text-white">
                Le CENADI, au cœur de la
                <span class="text-green-600 dark:text-green-400">
                    transformation numérique
                </span>
            </h2>

            <p class="mt-5 text-lg leading-8 text-slate-600 dark:text-slate-400">
                Découvrez le Centre National de Développement de l’Informatique,
                une structure qui contribue à la transformation numérique de
                l'administration camerounaise.
            </p>

        </div>


        {{-- Bloc principal --}}
        <div class="mt-16 overflow-hidden rounded-3xl border border-slate-200
                    bg-slate-50 shadow-xl dark:border-slate-800
                    dark:bg-slate-900">

            <div class="grid lg:grid-cols-2">

                {{-- Partie logo / identité --}}
                <div class="flex min-h-[420px] items-center justify-center
                            bg-green-50 p-10 dark:bg-green-950/20 lg:p-16">

                    <div class="text-center">

                        {{-- Logo --}}
                        <div class="mx-auto flex h-40 w-40 items-center justify-center
                                    rounded-3xl bg-white p-6 shadow-lg
                                    dark:bg-slate-800">

                            <img
                                src="{{ asset('images/cenadi.png') }}"
                                alt="Logo du CENADI"
                                class="max-h-full max-w-full object-contain"
                            >

                        </div>

                        <h3 class="mt-8 text-2xl font-bold text-slate-900 dark:text-white">
                            CENADI
                        </h3>

                        <p class="mt-2 text-sm font-medium uppercase tracking-wider
                                  text-green-700 dark:text-green-400">
                            Centre National de Développement de l’Informatique
                        </p>

                    </div>

                </div>


                {{-- Présentation --}}
                <div class="p-8 sm:p-10 lg:p-16">

                    <div class="flex items-center gap-3">

                        <div class="flex h-10 w-10 items-center justify-center
                                    rounded-xl bg-green-100 text-green-700
                                    dark:bg-green-950 dark:text-green-400">

                            <svg xmlns="http://www.w3.org/2000/svg"
                                 fill="none"
                                 viewBox="0 0 24 24"
                                 stroke-width="1.8"
                                 stroke="currentColor"
                                 class="h-5 w-5">

                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      d="M3 7.5 12 3l9 4.5M4.5 9.75v8.5L12 22l7.5-3.75v-8.5M8 6l8 4M12 3v7" />

                            </svg>

                        </div>

                        <h3 class="text-xl font-bold text-slate-900 dark:text-white">
                            Une institution au service du numérique
                        </h3>

                    </div>


                    <div class="mt-6 space-y-5 text-base leading-7
                                text-slate-600 dark:text-slate-400">

                        <p>
                            Le <strong class="text-slate-900 dark:text-slate-200">
                                Centre National de Développement de l’Informatique
                            </strong>
                            (CENADI) est une structure de l'État camerounais
                            rattachée au Ministère des Finances.
                        </p>

                        <p>
                            Il intervient dans le domaine de l’informatique et de
                            la téléinformatique et accompagne notamment les
                            administrations dans leurs projets de transformation
                            numérique.
                        </p>

                        <p>
                            Le CENADI intervient également dans la conception,
                            le développement et l'exploitation de solutions
                            informatiques, ainsi que dans l'hébergement des
                            applications et des données.
                        </p>

                    </div>


                    {{-- Informations clés --}}
                    <div class="mt-8 grid gap-4 sm:grid-cols-2">

                        <div class="rounded-2xl border border-slate-200 bg-white p-5
                                    dark:border-slate-700 dark:bg-slate-800">

                            <p class="text-2xl font-bold text-green-600 dark:text-green-400">
                                1988
                            </p>

                            <p class="mt-1 text-sm text-slate-500 dark:text-slate-400">
                                Création du CENADI
                            </p>

                        </div>


                        <div class="rounded-2xl border border-slate-200 bg-white p-5
                                    dark:border-slate-700 dark:bg-slate-800">

                            <p class="text-2xl font-bold text-green-600 dark:text-green-400">
                                MINFI
                            </p>

                            <p class="mt-1 text-sm text-slate-500 dark:text-slate-400">
                                Ministère de tutelle
                            </p>

                        </div>

                    </div>


                    {{-- Bouton --}}
                    <div class="mt-8">

                        <a href="https://www.cenadi.cm/"
                           target="_blank"
                           rel="noopener noreferrer"
                           class="inline-flex items-center gap-2 rounded-xl
                                  bg-green-600 px-5 py-3 text-sm font-semibold
                                  text-white shadow-lg shadow-green-600/20
                                  transition hover:bg-green-700">

                            En savoir plus sur le CENADI

                            <svg xmlns="http://www.w3.org/2000/svg"
                                 fill="none"
                                 viewBox="0 0 24 24"
                                 stroke-width="2"
                                 stroke="currentColor"
                                 class="h-4 w-4">

                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      d="M13.5 6H19m0 0v5.5M19 6l-7 7" />

                            </svg>

                        </a>

                    </div>

                </div>

            </div>

        </div>


        {{-- Les domaines d'intervention --}}
        <div class="mt-12 grid gap-5 sm:grid-cols-2 lg:grid-cols-4">

            <div class="rounded-2xl border border-slate-200 bg-white p-6
                        dark:border-slate-800 dark:bg-slate-900">

                <div class="mb-4 flex h-11 w-11 items-center justify-center
                            rounded-xl bg-green-100 text-green-600
                            dark:bg-green-950 dark:text-green-400">

                    💻
                </div>

                <h4 class="font-semibold text-slate-900 dark:text-white">
                    Développement
                </h4>

                <p class="mt-2 text-sm leading-6 text-slate-500 dark:text-slate-400">
                    Conception et développement de solutions informatiques.
                </p>

            </div>


            <div class="rounded-2xl border border-slate-200 bg-white p-6
                        dark:border-slate-800 dark:bg-slate-900">

                <div class="mb-4 flex h-11 w-11 items-center justify-center
                            rounded-xl bg-green-100 text-green-600
                            dark:bg-green-950 dark:text-green-400">

                    🌐
                </div>

                <h4 class="font-semibold text-slate-900 dark:text-white">
                    Infrastructures
                </h4>

                <p class="mt-2 text-sm leading-6 text-slate-500 dark:text-slate-400">
                    Réseaux, infrastructures et services informatiques.
                </p>

            </div>


            <div class="rounded-2xl border border-slate-200 bg-white p-6
                        dark:border-slate-800 dark:bg-slate-900">

                <div class="mb-4 flex h-11 w-11 items-center justify-center
                            rounded-xl bg-green-100 text-green-600
                            dark:bg-green-950 dark:text-green-400">

                    🔐
                </div>

                <h4 class="font-semibold text-slate-900 dark:text-white">
                    Sécurité
                </h4>

                <p class="mt-2 text-sm leading-6 text-slate-500 dark:text-slate-400">
                    Protection, confidentialité et intégrité des données.
                </p>

            </div>


            <div class="rounded-2xl border border-slate-200 bg-white p-6
                        dark:border-slate-800 dark:bg-slate-900">

                <div class="mb-4 flex h-11 w-11 items-center justify-center
                            rounded-xl bg-green-100 text-green-600
                            dark:bg-green-950 dark:text-green-400">

                    🎓
                </div>

                <h4 class="font-semibold text-slate-900 dark:text-white">
                    Formation
                </h4>

                <p class="mt-2 text-sm leading-6 text-slate-500 dark:text-slate-400">
                    Formation et accompagnement dans le domaine informatique.
                </p>

            </div>

        </div>

    </div>

</section>