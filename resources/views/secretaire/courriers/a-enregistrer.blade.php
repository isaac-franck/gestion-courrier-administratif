@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-slate-50 dark:bg-slate-950">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

        {{-- En-tête --}}
        <div class="mb-8">

            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">

                <div>
                    <p class="text-sm font-medium text-green-600 dark:text-green-400">
                        Espace secrétaire
                    </p>

                    <h1 class="text-2xl sm:text-3xl font-bold text-slate-900 dark:text-white mt-1">
                        Courriers à enregistrer
                    </h1>

                    <p class="text-slate-500 dark:text-slate-400 mt-2">
                        Consultez les courriers déposés et attribuez-leur un numéro administratif.
                    </p>
                </div>

                <a
                    href="{{ route('secretaire.dashboard') }}"
                    class="inline-flex items-center justify-center px-4 py-2.5
                           rounded-lg border border-slate-200 dark:border-slate-700
                           bg-white dark:bg-slate-900
                           text-slate-700 dark:text-slate-200
                           hover:bg-slate-50 dark:hover:bg-slate-800
                           transition"
                >
                    Retour au dashboard
                </a>

            </div>

        </div>


        {{-- Message de succès --}}
        @if(session('success'))

            <div class="mb-6 rounded-xl border border-green-200
                        bg-green-50 dark:bg-green-950/30
                        dark:border-green-900 p-4">

                <div class="flex items-center gap-3">

                    <div class="flex-shrink-0 w-9 h-9 rounded-full
                                bg-green-100 dark:bg-green-900
                                flex items-center justify-center">

                        <svg class="w-5 h-5 text-green-600 dark:text-green-400"
                             fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24">

                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M5 13l4 4L19 7"/>

                        </svg>

                    </div>

                    <p class="text-sm font-medium text-green-800 dark:text-green-300">
                        {{ session('success') }}
                    </p>

                </div>

            </div>

        @endif


        {{-- Filtres --}}
        <div class="bg-white dark:bg-slate-900
                    border border-slate-200 dark:border-slate-800
                    rounded-2xl p-5 mb-6">

            <form
                method="GET"
                action="{{ route('secretaire.courriers.a-enregistrer') }}"
                class="grid grid-cols-1 md:grid-cols-3 gap-4"
            >

                {{-- Date --}}
                <div>

                    <label
                        for="date"
                        class="block text-sm font-medium text-slate-700
                               dark:text-slate-300 mb-2"
                    >
                        Date de dépôt
                    </label>

                    <input
                        type="date"
                        id="date"
                        name="date"
                        value="{{ $date }}"
                        class="w-full rounded-lg border border-slate-300
                               dark:border-slate-700
                               bg-white dark:bg-slate-800
                               text-slate-900 dark:text-white
                               px-4 py-2.5
                               focus:ring-2 focus:ring-green-500
                               focus:border-green-500"
                    >

                </div>


                {{-- Ordre --}}
                <div>

                    <label
                        for="ordre"
                        class="block text-sm font-medium text-slate-700
                               dark:text-slate-300 mb-2"
                    >
                        Trier par date
                    </label>

                    <select
                        id="ordre"
                        name="ordre"
                        class="w-full rounded-lg border border-slate-300
                               dark:border-slate-700
                               bg-white dark:bg-slate-800
                               text-slate-900 dark:text-white
                               px-4 py-2.5
                               focus:ring-2 focus:ring-green-500"
                    >

                        <option value="desc"
                            {{ $ordre === 'desc' ? 'selected' : '' }}>
                            Plus récent → plus ancien
                        </option>

                        <option value="asc"
                            {{ $ordre === 'asc' ? 'selected' : '' }}>
                            Plus ancien → plus récent
                        </option>

                    </select>

                </div>


                {{-- Bouton --}}
                <div class="flex items-end">

                    <button
                        type="submit"
                        class="w-full px-4 py-2.5 rounded-lg
                               bg-green-600 hover:bg-green-700
                               text-white font-medium transition"
                    >
                        Filtrer
                    </button>

                </div>

            </form>

        </div>


        {{-- Liste --}}
        <div class="bg-white dark:bg-slate-900
                    border border-slate-200 dark:border-slate-800
                    rounded-2xl overflow-hidden">

            <div class="px-6 py-5 border-b border-slate-200
                        dark:border-slate-800">

                <h2 class="font-semibold text-slate-900 dark:text-white">
                    Courriers en attente
                </h2>

                <p class="text-sm text-slate-500 dark:text-slate-400 mt-1">
                    {{ $courriers->total() }} courrier(s) à enregistrer
                </p>

            </div>


            @if($courriers->count())

                <div class="overflow-x-auto">

                    <table class="w-full">

                        <thead class="bg-slate-50 dark:bg-slate-800/50">

                            <tr>

                                <th class="px-6 py-4 text-left text-xs
                                           font-semibold uppercase
                                           text-slate-500 dark:text-slate-400">
                                    Courrier
                                </th>

                                <th class="px-6 py-4 text-left text-xs
                                           font-semibold uppercase
                                           text-slate-500 dark:text-slate-400">
                                    Expéditeur
                                </th>

                                <th class="px-6 py-4 text-left text-xs
                                           font-semibold uppercase
                                           text-slate-500 dark:text-slate-400">
                                    Date
                                </th>

                                <th class="px-6 py-4 text-right text-xs
                                           font-semibold uppercase
                                           text-slate-500 dark:text-slate-400">
                                    Action
                                </th>

                            </tr>

                        </thead>


                        <tbody class="divide-y divide-slate-200
                                     dark:divide-slate-800">

                            @foreach($courriers as $courrier)

                                <tr class="hover:bg-slate-50
                                           dark:hover:bg-slate-800/50">

                                    <td class="px-6 py-4">

                                        <div class="font-medium text-slate-900
                                                    dark:text-white">

                                            {{ $courrier->nom }}

                                        </div>

                                        <div class="text-sm text-slate-500
                                                    dark:text-slate-400 mt-1">

                                            Courrier #{{ $courrier->id }}

                                        </div>

                                    </td>


                                    <td class="px-6 py-4">

                                        <div class="text-sm font-medium
                                                    text-slate-800 dark:text-slate-200">

                                            {{ $courrier->expediteur->prenom }}
                                            {{ $courrier->expediteur->nom }}

                                        </div>

                                        <div class="text-xs text-slate-500
                                                    dark:text-slate-400">

                                            {{ $courrier->expediteur->email }}

                                        </div>

                                    </td>


                                    <td class="px-6 py-4 text-sm
                                               text-slate-600 dark:text-slate-300">

                                        {{ $courrier->date_depot
                                            ? \Carbon\Carbon::parse($courrier->date_depot)->format('d/m/Y H:i')
                                            : $courrier->created_at->format('d/m/Y H:i')
                                        }}

                                    </td>


                                    <td class="px-6 py-4 text-right">

                                        <a
                                            href="{{ route(
                                                'secretaire.courriers.enregistrer',
                                                $courrier
                                            ) }}"
                                            class="inline-flex items-center gap-2
                                                   px-4 py-2 rounded-lg
                                                   bg-green-600 hover:bg-green-700
                                                   text-white text-sm font-medium
                                                   transition"
                                        >

                                            Enregistrer

                                        </a>

                                    </td>

                                </tr>

                            @endforeach

                        </tbody>

                    </table>

                </div>


                {{-- Pagination --}}
                <div class="px-6 py-5 border-t border-slate-200
                            dark:border-slate-800">

                    {{ $courriers->links() }}

                </div>

            @else

                <div class="py-16 text-center">

                    <div class="mx-auto w-14 h-14 rounded-full
                                bg-slate-100 dark:bg-slate-800
                                flex items-center justify-center">

                        <svg class="w-7 h-7 text-slate-400"
                             fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24">

                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M3 8l7.89 5.26a2 2 0 008.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>

                        </svg>

                    </div>

                    <h3 class="mt-4 font-semibold text-slate-900
                               dark:text-white">

                        Aucun courrier à enregistrer

                    </h3>

                    <p class="mt-1 text-sm text-slate-500
                              dark:text-slate-400">

                        Tous les courriers déposés ont été traités.

                    </p>

                </div>

            @endif

        </div>

    </div>

</div>

@endsection