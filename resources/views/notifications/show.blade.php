<!DOCTYPE html>
<html lang="fr"
      x-data="{ darkMode: localStorage.getItem('theme') === 'dark' }"
      x-init="
          if (darkMode) {
              document.documentElement.classList.add('dark');
          }

          $watch('darkMode', value => {
              localStorage.setItem('theme', value ? 'dark' : 'light');

              if (value) {
                  document.documentElement.classList.add('dark');
              } else {
                  document.documentElement.classList.remove('dark');
              }
          });
      "
      :class="{ 'dark': darkMode }">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Notification - CENADI</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="min-h-screen
             bg-gray-50
             text-gray-900
             transition-colors duration-300
             dark:bg-gray-950
             dark:text-white">


    <!-- HEADER -->
    <header class="sticky top-0 z-50
                   border-b border-gray-200
                   bg-white/95 backdrop-blur
                   dark:border-gray-800
                   dark:bg-gray-950/95">

        <div class="mx-auto max-w-7xl
                    px-4 sm:px-6 lg:px-8">

            <div class="flex h-16
                        items-center justify-between">

                <div class="flex items-center gap-3">

                    <div class="flex h-10 w-10
                                items-center justify-center
                                rounded-xl bg-green-600">

                        <svg class="h-6 w-6 text-white"
                             fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24">

                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M3 8l9 6 9-6M5 5h14a2 2 0 012 2v10a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2z"/>

                        </svg>

                    </div>

                    <div>

                        <p class="font-bold text-green-700
                                  dark:text-green-400">

                            CENADI

                        </p>

                        <p class="hidden text-xs text-gray-500 sm:block
                                  dark:text-gray-400">

                            Gestion du courrier administratif

                        </p>

                    </div>

                </div>


                <!-- THEME -->
                <button
                    type="button"
                    @click="darkMode = !darkMode"
                    class="flex h-10 w-10
                           items-center justify-center
                           rounded-xl
                           border border-gray-200
                           bg-white
                           text-gray-600
                           hover:bg-gray-100
                           dark:border-gray-700
                           dark:bg-gray-900
                           dark:text-yellow-400
                           dark:hover:bg-gray-800">

                    <svg x-show="darkMode"
                         class="h-5 w-5"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364-6.364l-.707.707M6.343 17.657l-.707.707m12.728 0l-.707-.707M6.343 6.343l-.707-.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/>

                    </svg>

                    <svg x-show="!darkMode"
                         class="h-5 w-5"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M21 12.79A9 9 0 1111.21 3
                                 7 7 0 0021 12.79z"/>

                    </svg>

                </button>

            </div>

        </div>

    </header>


    <!-- CONTENU -->
    <main class="mx-auto max-w-4xl
                 px-4 py-8
                 sm:px-6 lg:px-8">


        <!-- RETOUR -->
        <div class="mb-6">

            <button
                type="button"
                onclick="history.back()"
                class="inline-flex items-center gap-2
                       rounded-xl
                       border border-gray-200
                       bg-white
                       px-4 py-2.5
                       text-sm font-semibold
                       text-gray-700
                       shadow-sm
                       transition
                       hover:bg-gray-100
                       dark:border-gray-700
                       dark:bg-gray-900
                       dark:text-gray-200
                       dark:hover:bg-gray-800">

                <svg class="h-5 w-5"
                     fill="none"
                     stroke="currentColor"
                     viewBox="0 0 24 24">

                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M15 19l-7-7 7-7"/>

                </svg>

                Retour

            </button>

        </div>


        <!-- CARTE PRINCIPALE -->
        <article class="overflow-hidden
                        rounded-2xl
                        border border-gray-200
                        bg-white
                        shadow-sm
                        dark:border-gray-800
                        dark:bg-gray-900">


            <!-- EN-TÊTE -->
            <div class="border-b
                        border-gray-200
                        bg-gradient-to-r
                        from-green-50
                        to-yellow-50
                        px-6 py-6
                        dark:border-gray-800
                        dark:from-green-950/30
                        dark:to-yellow-950/20
                        sm:px-8">

                <div class="flex items-start gap-4">

                    <div class="flex h-12 w-12
                                shrink-0
                                items-center justify-center
                                rounded-xl
                                bg-green-600">

                        <svg class="h-6 w-6 text-white"
                             fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24">

                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M15 17h5l-1.405-1.405
                                     A2.032 2.032 0 0118 14.158V11
                                     a6.002 6.002 0 00-4-5.659V5
                                     a2 2 0 10-4 0v.341
                                     C7.67 6.165 6 8.388
                                     6 11v3.159
                                     c0 .538-.214 1.055-.595 1.436
                                     L4 17h5m6 0v1
                                     a3 3 0 11-6 0v-1m6 0H9"/>

                        </svg>

                    </div>


                    <div class="min-w-0">

                        <p class="text-sm font-semibold
                                  text-green-600
                                  dark:text-green-400">

                            Notification CENADI

                        </p>

                        <h1 class="mt-1 text-2xl
                                   font-bold
                                   text-gray-900
                                   dark:text-white">

                            {{ $notification->data['titre']
                                ?? 'Notification' }}

                        </h1>

                        <p class="mt-2 text-sm
                                  text-gray-500
                                  dark:text-gray-400">

                            Reçue le
                            {{ $notification->created_at
                                ->format('d/m/Y à H:i') }}

                        </p>

                    </div>

                </div>

            </div>


            <!-- INFORMATIONS -->
            <div class="space-y-6 px-6 py-6 sm:px-8 sm:py-8">


                <!-- MESSAGE -->
                <div>

                    <p class="mb-2 text-sm
                              font-semibold
                              text-gray-500
                              dark:text-gray-400">

                        Message

                    </p>

                    <div class="rounded-xl
                                bg-gray-50
                                p-4
                                dark:bg-gray-800">

                        <p class="leading-7
                                  text-gray-800
                                  dark:text-gray-200">

                            {{ $notification->data['message']
                                ?? 'Aucun message disponible.' }}

                        </p>

                    </div>

                </div>


                <!-- COURRIER -->
                @if (
                    isset($notification->data['numero']) ||
                    isset($notification->data['nom'])
                )

                    <div class="grid gap-4 sm:grid-cols-2">

                        @if (isset($notification->data['numero']))

                            <div class="rounded-xl
                                        border
                                        border-gray-200
                                        p-4
                                        dark:border-gray-700">

                                <p class="text-xs font-semibold
                                          uppercase tracking-wide
                                          text-gray-500">

                                    Numéro du courrier

                                </p>

                                <p class="mt-2 font-bold
                                          text-green-600
                                          dark:text-green-400">

                                    {{ $notification->data['numero'] }}

                                </p>

                            </div>

                        @endif


                        @if (isset($notification->data['nom']))

                            <div class="rounded-xl
                                        border
                                        border-gray-200
                                        p-4
                                        dark:border-gray-700">

                                <p class="text-xs font-semibold
                                          uppercase tracking-wide
                                          text-gray-500">

                                    Courrier concerné

                                </p>

                                <p class="mt-2 font-semibold
                                          text-gray-900
                                          dark:text-white">

                                    {{ $notification->data['nom'] }}

                                </p>

                            </div>

                        @endif

                    </div>

                @endif


                <!-- TYPE -->
                @if (isset($notification->data['type']))

                    <div class="rounded-xl
                                border
                                border-yellow-200
                                bg-yellow-50
                                p-4
                                dark:border-yellow-900
                                dark:bg-yellow-950/20">

                        <p class="text-xs font-semibold
                                  uppercase tracking-wide
                                  text-yellow-700
                                  dark:text-yellow-400">

                            Type de notification

                        </p>

                        <p class="mt-1 font-medium
                                  text-yellow-900
                                  dark:text-yellow-200">

                            {{ ucfirst(
                                str_replace(
                                    '_',
                                    ' ',
                                    $notification->data['type']
                                )
                            ) }}

                        </p>

                    </div>

                @endif

                @if (($notification->data['type'] ?? null) === 'nouveau_commentaire')

    @php
        $commentaireId =
            $notification->data['commentaire_id'] ?? null;
    @endphp

    @if($commentaireId)

        <div class="mt-6">

            <a
                href="{{ route('commentaires.show', $commentaireId) }}"
                class="inline-flex items-center gap-2
                       px-5 py-3 rounded-xl
                       bg-green-600 hover:bg-green-700
                       text-white font-bold
                       shadow-lg transition"
            >
                💬 Consulter le commentaire
            </a>

        </div>

    @endif

@endif

@if (($notification->data['type'] ?? null) === 'courrier_a_modifier')

    @php
        $courrierId =
            $notification->data['courrier_id'] ?? null;
    @endphp

    @if($courrierId)

        <div class="mt-6">

            <a
                href="{{ route('courriers.show', $courrierId) }}"
                class="inline-flex items-center gap-2
                       px-5 py-3 rounded-xl
                       bg-yellow-500
                       hover:bg-yellow-600
                       text-slate-900
                       font-bold
                       shadow-lg
                       transition"
            >
                ⚠️ Consulter les modifications demandées
            </a>

        </div>

    @endif

@endif

            </div>


            <!-- ACTIONS -->
            <div class="border-t
                        border-gray-200
                        bg-gray-50
                        px-6 py-5
                        dark:border-gray-800
                        dark:bg-gray-950/50
                        sm:px-8">

                <a href="{{ route('notifications.index') }}"
                   class="inline-flex items-center
                          gap-2 rounded-xl
                          bg-green-600
                          px-5 py-2.5
                          font-semibold
                          text-white
                          transition
                          hover:bg-green-700">

                    <svg class="h-5 w-5"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M15 19l-7-7 7-7"/>

                    </svg>

                    Mes notifications

                </a>

            </div>

        </article>

    </main>


    <!-- FOOTER -->
    <footer class="mt-12 border-t
                   border-gray-200
                   dark:border-gray-800">

        <div class="mx-auto max-w-7xl
                    px-4 py-6
                    text-center
                    text-sm text-gray-500
                    dark:text-gray-400">

            © {{ date('Y') }} CENADI —
            Plateforme de gestion du courrier administratif

        </div>

    </footer>

</body>
</html>