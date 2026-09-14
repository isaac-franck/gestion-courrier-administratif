@php
    $role = auth()->user()->role;

    $peutEnvoyerCommentaire = in_array($role, [
        'chef_service',
        'secretaire',
        'directeur',
        'administrateur',
    ]);

    $commentairesOuvert = request()->routeIs('commentaires.*');
@endphp

<div
    x-data="{ ouvert: {{ $commentairesOuvert ? 'true' : 'false' }} }"
    class="space-y-1"
>

    {{-- Menu principal --}}
    <button
        type="button"
        @click="ouvert = !ouvert"
        class="w-full flex items-center justify-between
               px-4 py-3 rounded-xl
               text-slate-700 dark:text-slate-200
               hover:bg-green-50 dark:hover:bg-slate-800
               transition"
    >

        <span class="flex items-center gap-3">

            <span class="text-xl">
                💬
            </span>

            <span class="font-semibold">
                Commentaires
            </span>

            @if(($nombreCommentairesNonLus ?? 0) > 0)
                <span
                    class="min-w-[22px] h-5 px-1.5
                           flex items-center justify-center
                           rounded-full
                           bg-yellow-400
                           text-xs font-bold
                           text-slate-900"
                >
                    {{ $nombreCommentairesNonLus > 99
                        ? '99+'
                        : $nombreCommentairesNonLus }}
                </span>
            @endif

        </span>

        <svg
            class="w-4 h-4 transition-transform duration-200"
            :class="{ 'rotate-180': ouvert }"
            fill="none"
            stroke="currentColor"
            viewBox="0 0 24 24"
        >
            <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M19 9l-7 7-7-7"
            />
        </svg>

    </button>


    {{-- Sous-menu --}}
    <div
        x-show="ouvert"
        x-transition
        class="ml-5 pl-4 border-l-2
               border-green-200 dark:border-green-900
               space-y-1"
    >

        {{-- Mes commentaires --}}
        <a
            href="{{ route('commentaires.index') }}"
            class="flex items-center gap-3
                   px-4 py-2.5 rounded-lg
                   text-sm
                   {{ request()->routeIs('commentaires.index')
                        ? 'bg-green-100 text-green-700 dark:bg-green-900/30 dark:text-green-400 font-semibold'
                        : 'text-slate-600 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-800' }}
                   transition"
        >
            <span>📥</span>

            <span>
                Mes commentaires
            </span>
        </a>


        {{-- Envoyer un commentaire --}}
        @if($peutEnvoyerCommentaire)

            <a
                href="{{ route('commentaires.create') }}"
                class="flex items-center gap-3
                       px-4 py-2.5 rounded-lg
                       text-sm
                       {{ request()->routeIs('commentaires.create')
                            ? 'bg-green-100 text-green-700 dark:bg-green-900/30 dark:text-green-400 font-semibold'
                            : 'text-slate-600 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-800' }}
                       transition"
            >
                <span>✉️</span>

                <span>
                    Envoyer un commentaire
                </span>
            </a>

        @endif

    </div>

</div>