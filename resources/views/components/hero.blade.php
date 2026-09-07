<section
    id="accueil"
    class="relative min-h-screen overflow-hidden"
>
    
    {{-- Image mode clair --}}
    <div
        class="absolute inset-0
               bg-cover bg-center
               bg-[url('/images/hero-light.jpg')]
               dark:hidden"
    ></div>

    {{-- Image mode sombre --}}
    <div
        class="absolute inset-0 hidden
               bg-cover bg-center
               dark:block
               bg-[url('/images/hero-dark.jpg')]"
    ></div>


    {{-- Overlay --}}
    <div
        class="absolute inset-0
               bg-white/75
               dark:bg-slate-950/80"
    ></div>


    {{-- Dégradé vert --}}
    <div
        class="absolute inset-0
               bg-gradient-to-r
               from-white/90
               via-white/60
               to-transparent
               dark:from-slate-950/95
               dark:via-slate-950/70
               dark:to-transparent"
    ></div>


    {{-- Contenu --}}
    <div
        class="relative z-10 mx-auto
               flex min-h-screen max-w-7xl
               items-center px-6
               pt-20"
    >

        <div class="max-w-3xl">

            {{-- Label --}}
            <div
                class="mb-6 inline-flex items-center
                       rounded-full
                       border border-green-200
                       bg-green-50/80
                       px-4 py-2
                       text-sm font-semibold
                       tracking-wide
                       text-green-700
                       backdrop-blur-sm
                       dark:border-green-800
                       dark:bg-green-950/50
                       dark:text-green-400"
            >

                <span
                    class="mr-2 h-2 w-2 rounded-full
                           bg-green-500"
                ></span>

                GESTION DU COURRIER ADMINISTRATIF

            </div>


            {{-- Titre --}}
            <h1
                class="text-4xl font-bold
                       leading-tight tracking-tight
                       text-slate-950
                       sm:text-5xl
                       lg:text-7xl
                       dark:text-white"
            >

                Simplifiez la gestion
                <br class="hidden sm:block">

                de vos
                <span
                    class="text-green-600
                           dark:text-green-400"
                >
                    courriers.
                </span>

            </h1>


            {{-- Sous-titre --}}
            <p
                class="mt-6 max-w-2xl
                       text-base leading-7
                       text-slate-600
                       sm:text-lg sm:leading-8
                       dark:text-slate-300"
            >

                Centralisez, organisez et suivez
                vos courriers administratifs depuis
                une plateforme unique, simple et
                efficace.

            </p>


            {{-- Boutons --}}
            <div
                class="mt-8 flex flex-col gap-4
                       sm:flex-row"
            >

                {{-- Bouton principal --}}
                <a
                    href="{{ route('login') }}"
                    class="inline-flex items-center
                           justify-center
                           rounded-xl
                           bg-green-600
                           px-7 py-3.5
                           font-semibold
                           text-white
                           shadow-lg
                           shadow-green-600/25
                           transition
                           duration-300
                           hover:-translate-y-1
                           hover:bg-green-700
                           hover:shadow-xl
                           dark:bg-green-500
                           dark:text-green-950
                           dark:hover:bg-green-400"
                >

                    Se connecter

                    <span class="ml-2">→</span>

                </a>


                {{-- Bouton secondaire --}}
                <a
                    href="#fonctionnalites"
                    class="inline-flex items-center
                           justify-center
                           rounded-xl
                           border border-slate-300
                           bg-white/70
                           px-7 py-3.5
                           font-semibold
                           text-slate-800
                           backdrop-blur-sm
                           transition
                           duration-300
                           hover:-translate-y-1
                           hover:border-green-500
                           hover:text-green-600
                           dark:border-slate-600
                           dark:bg-slate-900/50
                           dark:text-white
                           dark:hover:border-green-400
                           dark:hover:text-green-400"
                >

                    Découvrir la solution

                </a>

            </div>

        </div>

    </div>


    {{-- Indication de défilement --}}
    <div
        class="absolute bottom-8
               left-1/2
               -translate-x-1/2"
    >

        <a
            href="#fonctionnalites"
            class="flex flex-col items-center
                   gap-2 text-xs
                   text-slate-500
                   dark:text-slate-400"
        >

            <span>Découvrir</span>

            <span class="animate-bounce">
                ↓
            </span>

        </a>

    </div>

</section>