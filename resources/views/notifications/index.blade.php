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

    <title>Mes notifications - CENADI</title>

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

                <!-- Logo / identité -->
                <div class="flex items-center gap-3">

                    <div class="flex h-10 w-10
                                items-center justify-center
                                rounded-xl
                                bg-green-600
                                shadow-sm">

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


                <!-- Actions -->
                <div class="flex items-center gap-2">

                    <!-- Thème -->
                    <button
                        type="button"
                        @click="darkMode = !darkMode"
                        class="flex h-10 w-10
                               items-center justify-center
                               rounded-xl
                               border border-gray-200
                               bg-white
                               text-gray-600
                               transition
                               hover:bg-gray-100
                               dark:border-gray-700
                               dark:bg-gray-900
                               dark:text-yellow-400
                               dark:hover:bg-gray-800"
                        aria-label="Changer de thème">

                        <!-- Soleil -->
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

                        <!-- Lune -->
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

        </div>

    </header>


    <!-- CONTENU -->
    <main class="mx-auto max-w-7xl
                 px-4 py-8
                 sm:px-6 lg:px-8">

        <!-- Retour -->
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


        <!-- TITRE -->
        <div class="mb-8">

            <div class="flex flex-col gap-3
                        sm:flex-row
                        sm:items-center
                        sm:justify-between">

                <div>

                    <p class="text-sm font-semibold
                              uppercase tracking-wider
                              text-green-600
                              dark:text-green-400">

                        Espace personnel

                    </p>

                    <h1 class="mt-1 text-3xl
                               font-bold tracking-tight
                               text-gray-900
                               dark:text-white">

                        Mes notifications

                    </h1>

                    <p class="mt-2 text-gray-600
                              dark:text-gray-400">

                        Consultez les informations et les mises à jour
                        concernant vos courriers.

                    </p>

                </div>

                <div class="flex h-14 w-14
                            items-center justify-center
                            rounded-2xl
                            bg-yellow-100
                            dark:bg-yellow-900/30">

                    <svg class="h-7 w-7 text-yellow-600
                                dark:text-yellow-400"
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

            </div>

        </div>


        <!-- RECHERCHE PAR DATE -->
        <div class="mb-6 rounded-2xl
                    border border-gray-200
                    bg-white p-5 shadow-sm
                    dark:border-gray-800
                    dark:bg-gray-900">

            <form method="GET"
                  action="{{ route('notifications.index') }}"
                  class="flex flex-col gap-4
                         lg:flex-row lg:items-end">

                <div class="flex-1">

                    <label for="date"
                           class="mb-2 block text-sm
                                  font-semibold
                                  text-gray-700
                                  dark:text-gray-300">

                        Rechercher par date

                    </label>

                    <input
                        id="date"
                        name="date"
                        type="date"
                        value="{{ $date }}"
                        class="w-full rounded-xl
                               border border-gray-300
                               bg-white px-4 py-3
                               text-gray-900
                               outline-none
                               transition
                               focus:border-green-500
                               focus:ring-2
                               focus:ring-green-500/20
                               dark:border-gray-700
                               dark:bg-gray-800
                               dark:text-white">

                </div>

                <div class="flex gap-2">

                    <button
                        type="submit"
                        class="rounded-xl
                               bg-green-600
                               px-5 py-3
                               font-semibold
                               text-white
                               shadow-sm
                               transition
                               hover:bg-green-700">

                        Rechercher

                    </button>

                    @if ($date)

                        <a href="{{ route('notifications.index') }}"
                           class="rounded-xl
                                  border border-gray-300
                                  bg-white
                                  px-5 py-3
                                  font-semibold
                                  text-gray-700
                                  transition
                                  hover:bg-gray-100
                                  dark:border-gray-700
                                  dark:bg-gray-800
                                  dark:text-gray-200
                                  dark:hover:bg-gray-700">

                            Effacer

                        </a>

                    @endif

                </div>

            </form>

        </div>


        <!-- LISTE -->
        <div class="space-y-4">

            @forelse ($notifications as $notification)

                @php
                    $nonLue = is_null($notification->read_at);

                    $titre = $notification->data['titre']
                        ?? 'Nouvelle notification';

                    $message = $notification->data['message']
                        ?? 'Vous avez reçu une nouvelle notification.';
                @endphp

                <article
                    class="rounded-2xl border
                           p-5 shadow-sm
                           transition
                           hover:shadow-md

                           @if ($nonLue)
                               border-green-200
                               bg-green-50/70
                               dark:border-green-900
                               dark:bg-green-950/30
                           @else
                               border-gray-200
                               bg-white
                               dark:border-gray-800
                               dark:bg-gray-900
                           @endif">

                    <div class="flex flex-col gap-5
                                sm:flex-row
                                sm:items-center
                                sm:justify-between">

                        <div class="flex gap-4">

                            <div class="flex h-11 w-11
                                        shrink-0
                                        items-center justify-center
                                        rounded-xl
                                        @if ($nonLue)
                                            bg-green-600
                                        @else
                                            bg-gray-200
                                            dark:bg-gray-800
                                        @endif">

                                <svg class="h-5 w-5
                                            @if ($nonLue)
                                                text-white
                                            @else
                                                text-gray-500
                                                dark:text-gray-400
                                            @endif"
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


                            <div>

                                <div class="flex flex-wrap
                                            items-center gap-2">

                                    <h2 class="font-bold
                                               text-gray-900
                                               dark:text-white">

                                        {{ $titre }}

                                    </h2>

                                    @if ($nonLue)

                                        <span class="rounded-full
                                                     bg-green-600
                                                     px-2.5 py-1
                                                     text-xs
                                                     font-bold
                                                     text-white">

                                            Nouvelle

                                        </span>

                                    @else

                                        <span class="rounded-full
                                                     bg-gray-100
                                                     px-2.5 py-1
                                                     text-xs
                                                     font-medium
                                                     text-gray-600
                                                     dark:bg-gray-800
                                                     dark:text-gray-400">

                                            Lue

                                        </span>

                                    @endif

                                </div>

                                @if (($notification->data['type'] ?? null) === 'nouveau_commentaire')

    <div class="flex items-center gap-3">

        <div class="w-10 h-10 rounded-xl
                    bg-yellow-100 dark:bg-yellow-900/30
                    flex items-center justify-center">
            💬
        </div>

        <div>

            <h3 class="font-bold text-slate-900 dark:text-white">
                Nouveau commentaire
            </h3>

            <p class="text-sm text-slate-500 dark:text-slate-400">
                {{ $notification->data['message']
                    ?? 'Vous avez reçu un nouveau commentaire.' }}
            </p>

        </div>

    </div>

@endif


                                <p class="mt-1 line-clamp-2
                                          text-sm
                                          text-gray-600
                                          dark:text-gray-400">

                                    {{ $message }}

                                </p>


                                <p class="mt-2 text-xs text-gray-500
          dark:text-gray-500">

    {{ $notification->created_at->diffForHumans() }}

    ·

    {{ $notification->created_at->format('d/m/Y à H:i') }}

</p>

                            </div>

                        </div>


                        <!-- CONSULTER -->
                        <div class="sm:shrink-0">

                            <a href="{{ route(
                                'notifications.show',
                                $notification->id
                            ) }}"
                               class="inline-flex w-full
                                      items-center
                                      justify-center
                                      gap-2
                                      rounded-xl
                                      bg-green-600
                                      px-5 py-2.5
                                      text-sm
                                      font-semibold
                                      text-white
                                      transition
                                      hover:bg-green-700
                                      sm:w-auto">

                                Consulter

                                <svg class="h-4 w-4"
                                     fill="none"
                                     stroke="currentColor"
                                     viewBox="0 0 24 24">

                                    <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          stroke-width="2"
                                          d="M9 5l7 7-7 7"/>

                                </svg>

                            </a>

                        </div>

                    </div>

                </article>

            @empty

                <div class="rounded-2xl
                            border border-dashed
                            border-gray-300
                            bg-white p-12
                            text-center
                            dark:border-gray-700
                            dark:bg-gray-900">

                    <div class="mx-auto flex h-16 w-16
                                items-center justify-center
                                rounded-2xl
                                bg-gray-100
                                dark:bg-gray-800">

                        <svg class="h-8 w-8
                                    text-gray-400"
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

                    <h2 class="mt-4 text-lg font-bold
                               text-gray-900
                               dark:text-white">

                        Aucune notification

                    </h2>

                    <p class="mt-2 text-sm
                              text-gray-500
                              dark:text-gray-400">

                        Vous n'avez reçu aucune notification
                        correspondant à votre recherche.

                    </p>

                </div>

            @endforelse

        </div>


        <!-- PAGINATION -->
        @if ($notifications->hasPages())

            <div class="mt-8">
                {{ $notifications->links() }}
            </div>

        @endif

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