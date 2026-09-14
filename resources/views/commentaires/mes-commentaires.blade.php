@extends('layouts.app')

@section('content')

<div
    x-data="{ dark: localStorage.getItem('theme') === 'dark' }"
    x-init="
        document.documentElement.classList.toggle('dark', dark);
        $watch('dark', value => {
            document.documentElement.classList.toggle('dark', value);
            localStorage.setItem('theme', value ? 'dark' : 'light');
        });
    "
    class="min-h-screen bg-slate-50 dark:bg-slate-950"
>

    <header class="bg-white dark:bg-slate-900
                   border-b border-slate-200 dark:border-slate-800">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-5">

            <x-retour-dashboard />

            <div class="mt-5 flex flex-col sm:flex-row
                        sm:items-center sm:justify-between gap-4">

                <div>

                    <p class="text-sm font-semibold
                              text-yellow-600 dark:text-yellow-400">
                        CENADI • COMMUNICATION
                    </p>

                    <h1 class="text-3xl font-black
                               text-slate-900 dark:text-white">
                        Mes commentaires
                    </h1>

                    <p class="mt-1 text-slate-500 dark:text-slate-400">
                        Consultez les commentaires qui vous ont été adressés.
                    </p>

                </div>

                @if(auth()->user()->role !== 'personnel'
                    && auth()->user()->role !== 'externe')

                    <a
                        href="{{ route('commentaires.create') }}"
                        class="inline-flex items-center justify-center
                               gap-2 px-5 py-3 rounded-xl
                               bg-green-600 hover:bg-green-700
                               text-white font-bold shadow-lg"
                    >
                        <span>＋</span>
                        Envoyer un commentaire
                    </a>

                @endif

            </div>

        </div>

    </header>


    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

        @if(session('success'))

            <div class="mb-6 rounded-2xl
                        border border-green-200
                        bg-green-50
                        dark:bg-green-900/20
                        dark:border-green-800
                        p-4 text-green-800 dark:text-green-300">

                {{ session('success') }}

            </div>

        @endif


        @if($commentaires->count())

            <div class="space-y-4">

                @foreach($commentaires as $commentaire)

                    <a
                        href="{{ route('commentaires.show', $commentaire) }}"
                        class="block group"
                    >

                        <article
                            class="rounded-2xl border
                            {{ !$commentaire->lu
                                ? 'border-green-300 bg-green-50 dark:border-green-700 dark:bg-green-900/20'
                                : 'border-slate-200 bg-white dark:border-slate-800 dark:bg-slate-900'
                            }}
                            p-5 sm:p-6
                            shadow-sm hover:shadow-lg
                            transition"
                        >

                            <div class="flex flex-col sm:flex-row
                                        sm:items-start sm:justify-between
                                        gap-4">

                                <div class="flex gap-4">

                                    <div
                                        class="w-11 h-11 shrink-0 rounded-xl
                                               bg-green-100 dark:bg-green-900/40
                                               flex items-center justify-center"
                                    >
                                        💬
                                    </div>

                                    <div>

                                        <div class="flex flex-wrap
                                                    items-center gap-2">

                                            <h2 class="font-bold
                                                       text-slate-900
                                                       dark:text-white">

                                                {{ $commentaire->auteur->prenom }}
                                                {{ $commentaire->auteur->nom }}

                                            </h2>

                                            @if(!$commentaire->lu)

                                                <span
                                                    class="px-2.5 py-1 rounded-full
                                                           text-xs font-bold
                                                           bg-green-600 text-white"
                                                >
                                                    Nouveau
                                                </span>

                                            @else

                                                <span
                                                    class="px-2.5 py-1 rounded-full
                                                           text-xs font-semibold
                                                           bg-slate-100
                                                           dark:bg-slate-800
                                                           text-slate-500"
                                                >
                                                    Lu
                                                </span>

                                            @endif

                                        </div>

                                        <p class="text-sm text-slate-500
                                                  dark:text-slate-400 mt-1">

                                            {{ $commentaire->created_at->diffForHumans() }}

                                        </p>

                                    </div>

                                </div>

                                <span
                                    class="text-green-600 dark:text-green-400
                                           font-bold group-hover:translate-x-1
                                           transition"
                                >
                                    Consulter →
                                </span>

                            </div>


                            <p class="mt-4 text-slate-700
                                      dark:text-slate-300 line-clamp-2">

                                {{ $commentaire->contenu }}

                            </p>


                            @if($commentaire->courrier)

                                <div class="mt-4 inline-flex items-center
                                            gap-2 px-3 py-2 rounded-xl
                                            bg-yellow-50 dark:bg-yellow-900/20
                                            text-yellow-800
                                            dark:text-yellow-300 text-sm">

                                    📄

                                    <span>
                                        Courrier :
                                        <strong>
                                            {{ $commentaire->courrier->numero
                                                ?? 'Sans numéro' }}
                                        </strong>
                                    </span>

                                </div>

                            @endif

                        </article>

                    </a>

                @endforeach

            </div>

            <div class="mt-8">
                {{ $commentaires->links() }}
            </div>

        @else

            <div class="rounded-3xl
                        border border-dashed
                        border-slate-300 dark:border-slate-700
                        bg-white dark:bg-slate-900
                        p-12 text-center">

                <div class="text-5xl mb-4">
                    💬
                </div>

                <h2 class="text-xl font-bold
                           text-slate-900 dark:text-white">
                    Aucun commentaire
                </h2>

                <p class="mt-2 text-slate-500 dark:text-slate-400">
                    Vous n'avez reçu aucun commentaire pour le moment.
                </p>

            </div>

        @endif

    </main>

</div>

@endsection