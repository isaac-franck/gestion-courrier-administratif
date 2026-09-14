
<!DOCTYPE html>
<html lang="fr" class="scroll-smooth">
<head>
    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>
        @yield('title', 'Dashboard') - CENADI
    </title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script>
        // Initialisation du thème
        if (
            localStorage.getItem('theme') === 'dark' ||
            (!localStorage.getItem('theme') &&
                window.matchMedia('(prefers-color-scheme: dark)').matches)
        ) {
            document.documentElement.classList.add('dark');
        }
    </script>
</head>

<body class="bg-gray-50 text-gray-800
             dark:bg-gray-950 dark:text-gray-100
             transition-colors duration-300">

<div class="min-h-screen flex">

    <!-- ============================= -->
    <!-- SIDEBAR -->
    <!-- ============================= -->

    <aside id="sidebar"
           class="fixed lg:static inset-y-0 left-0 z-50
                  w-72
                  bg-white dark:bg-gray-900
                  border-r border-gray-200 dark:border-gray-800
                  transform -translate-x-full lg:translate-x-0
                  transition-transform duration-300">

        <div class="h-full flex flex-col">

            <!-- LOGO / BRAND -->
            <div class="h-20 flex items-center px-6
                        border-b border-gray-200 dark:border-gray-800">

                <div class="flex items-center gap-3">

                    <div class="w-11 h-11 rounded-xl
                                bg-gradient-to-br
                                from-green-600 to-green-800
                                flex items-center justify-center
                                text-white font-bold text-lg
                                shadow-lg shadow-green-600/20">

                        <img
                        src="{{ asset('images/cenadi.png') }}"
                        alt="Logo du CENADI"
                        class="h-9 w-9 object-contain"
                    >
                    </div>

                    <div>
                        <h1 class="font-bold text-gray-900 dark:text-white">
                            CENADI
                        </h1>

                        <p class="text-xs text-gray-500 dark:text-gray-400">
                            Gestion du courrier
                        </p>
                    </div>

                </div>

            </div>


            <!-- NAVIGATION -->

            <nav class="flex-1 px-4 py-6 space-y-2 overflow-y-auto">

                <p class="px-3 mb-3 text-xs font-semibold
                          uppercase tracking-wider
                          text-gray-400">

                    Menu principal
                </p>


                <!-- Dashboard -->

                <a href="{{ route('external.dashboard') }}"
                   class="flex items-center gap-3 px-4 py-3 rounded-xl
                          bg-green-50 dark:bg-green-900/20
                          text-green-700 dark:text-green-400
                          font-semibold">

                    <svg class="w-5 h-5"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M3 12l2-2m0 0l7-7
                                 7 7M5 10v10a1 1 0 001 1h3m10-11
                                 v10a1 1 0 01-1 1h-3m-6 0h6"/>
                    </svg>

                    <span>Tableau de bord</span>
                </a>


                <!-- Déposer courrier -->

                <a href="#"
                   class="flex items-center gap-3 px-4 py-3 rounded-xl
                          text-gray-600 dark:text-gray-300
                          hover:bg-green-50 dark:hover:bg-green-900/20
                          hover:text-green-700 dark:hover:text-green-400
                          transition">

                    <svg class="w-5 h-5"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M12 4v16m8-8H4"/>
                    </svg>

                    <span>Déposer un courrier</span>
                </a>


                <!-- Répondre -->

                <a href="#"
                   class="flex items-center gap-3 px-4 py-3 rounded-xl
                          text-gray-600 dark:text-gray-300
                          hover:bg-green-50 dark:hover:bg-green-900/20
                          hover:text-green-700 dark:hover:text-green-400
                          transition">

                    <svg class="w-5 h-5"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M3 10h11m0 0l-4-4m4 4l-4 4
                                 M21 14H10m0 0l4-4m-4 4l4 4"/>
                    </svg>

                    <span>Répondre à un courrier</span>
                </a>


                <p class="px-3 pt-6 mb-3 text-xs font-semibold
                          uppercase tracking-wider
                          text-gray-400">

                    Consultation
                </p>


                <!-- Mes courriers -->

                <a href="#"
                   class="flex items-center gap-3 px-4 py-3 rounded-xl
                          text-gray-600 dark:text-gray-300
                          hover:bg-gray-100 dark:hover:bg-gray-800
                          transition">

                    <svg class="w-5 h-5"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M3 7h18M3 7l2 13h14l2-13M8 7V5
                                 a4 4 0 018 0v2"/>
                    </svg>

                    <span>Mes courriers</span>
                </a>


                <!-- Réponses -->

                <a href="#"
                   class="flex items-center gap-3 px-4 py-3 rounded-xl
                          text-gray-600 dark:text-gray-300
                          hover:bg-gray-100 dark:hover:bg-gray-800
                          transition">

                    <svg class="w-5 h-5"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M7 8h10M7 12h6m8-5a9 9 0
                                 11-18 0 9 9 0 0118 0z"/>
                    </svg>

                    <span>Mes réponses</span>
                </a>


                <!-- Notifications -->

                <a href="#"
                   class="flex items-center justify-between
                          px-4 py-3 rounded-xl
                          text-gray-600 dark:text-gray-300
                          hover:bg-gray-100 dark:hover:bg-gray-800
                          transition">

                    <div class="flex items-center gap-3">

                        <svg class="w-5 h-5"
                             fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24">

                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M15 17h5l-1.5-1.5A2 2
                                     0 0118 14v-3a6 6 0
                                     00-12 0v3a2 2 0
                                     01-.5 1.5L4 17h5m6 0
                                     a3 3 0 01-6 0"/>
                        </svg>

                        <span>Notifications</span>

                    </div>

                    <span class="px-2 py-1 text-xs font-bold
                                 rounded-full
                                 bg-yellow-400 text-yellow-950">

                        3
                    </span>

                </a>

            </nav>


            <!-- USER -->

            

            <div class="p-4 border-t border-gray-200 dark:border-gray-800">

    <div class="flex items-center gap-3 p-3 rounded-xl
                bg-gray-50 dark:bg-gray-800">

        <div class="w-10 h-10 rounded-full
                    bg-gradient-to-br from-green-500 to-green-700
                    flex items-center justify-center
                    text-white font-semibold">

            {{ strtoupper(substr($user->prenom ?? 'U', 0, 1)) }}

        </div>

        <div class="flex-1 min-w-0">

            <p class="font-semibold truncate">
                {{ $user->prenom ?? '' }}
                {{ $user->nom ?? '' }}
            </p>

            <p class="text-xs text-gray-500 dark:text-gray-400">
                {{ $user->role ?? 'Utilisateur externe' }}
            </p>

        </div>

    </div>


    <!-- Déconnexion -->

    <form action="{{ route('logout') }}"
          method="POST"
          class="mt-3">

        @csrf

        <button type="submit"
                class="w-full flex items-center gap-3
                       px-4 py-3 rounded-xl
                       text-red-600 dark:text-red-400
                       hover:bg-red-50
                       dark:hover:bg-red-900/20
                       transition">

            <svg class="w-5 h-5"
                 fill="none"
                 stroke="currentColor"
                 viewBox="0 0 24 24">

                <path stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M17 16l4-4m0 0l-4-4m4 4H7
                         m6 4v1a3 3 0 01-3 3H6a3 3
                         0 01-3-3V7a3 3 0 013-3h4a3
                         3 0 013 3v1"/>

            </svg>

            <span class="font-medium">
                Déconnexion
            </span>

        </button>

    </form>

</div>

        </div>

    </aside>


    <!-- OVERLAY MOBILE -->

    <div id="overlay"
         class="fixed inset-0 z-40
                bg-black/50 hidden lg:hidden"
         onclick="toggleSidebar()">
    </div>


    <!-- ============================= -->
    <!-- MAIN -->
    <!-- ============================= -->

    <main class="flex-1 min-w-0">

        <!-- TOPBAR -->

        <header class="h-20
                       bg-white dark:bg-gray-900
                       border-b border-gray-200 dark:border-gray-800
                       flex items-center justify-between
                       px-4 sm:px-6 lg:px-8">

            <div class="flex items-center gap-4">

                <!-- MENU MOBILE -->

                <button onclick="toggleSidebar()"
                        class="lg:hidden p-2 rounded-lg
                               hover:bg-gray-100
                               dark:hover:bg-gray-800">

                    <svg class="w-6 h-6"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>

                </button>


                <div>
                    <h2 class="font-bold text-lg sm:text-xl">
                        @yield('page-title', 'Tableau de bord')
                    </h2>

                    <p class="hidden sm:block text-sm
                              text-gray-500 dark:text-gray-400">

                        Espace utilisateur externe
                    </p>
                </div>

            </div>


            <div class="flex items-center gap-3">

                <!-- NOTIFICATION -->

                <button class="relative p-2.5 rounded-xl
                               hover:bg-gray-100
                               dark:hover:bg-gray-800">

                    <svg class="w-5 h-5"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M15 17h5l-1.5-1.5A2 2
                                 0 0118 14v-3a6 6 0
                                 00-12 0v3a2 2 0
                                 01-.5 1.5L4 17h5m6 0
                                 a3 3 0 01-6 0"/>
                    </svg>

                    <span class="absolute top-1 right-1
                                 w-2.5 h-2.5
                                 bg-yellow-400
                                 rounded-full">
                    </span>

                </button>


                <!-- THEME -->

                <button onclick="toggleTheme()"
                        class="p-2.5 rounded-xl
                               hover:bg-gray-100
                               dark:hover:bg-gray-800">

                    <svg id="themeIcon"
                         class="w-5 h-5"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M12 3v1m0 16v1m9-9h-1M4
                                 12H3m15.364-6.364l-.707.707M6.343
                                 17.657l-.707.707m12.728 0l-.707-.707M6.343
                                 6.343l-.707-.707M16 12a4 4 0
                                 11-8 0 4 4 0 018 0z"/>
                    </svg>

                </button>

            </div>

        </header>


        <!-- CONTENT -->

        <section class="p-4 sm:p-6 lg:p-8">

            @yield('content')

        </section>

    </main>

</div>


<script>

    function toggleSidebar() {

        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('overlay');

        sidebar.classList.toggle('-translate-x-full');
        overlay.classList.toggle('hidden');
    }


    function toggleTheme() {

        const html = document.documentElement;

        if (html.classList.contains('dark')) {

            html.classList.remove('dark');

            localStorage.setItem('theme', 'light');

        } else {

            html.classList.add('dark');

            localStorage.setItem('theme', 'dark');
        }
    }

</script>

</body>
</html>
