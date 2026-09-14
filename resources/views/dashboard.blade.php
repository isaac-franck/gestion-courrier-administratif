@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-slate-50 px-4 py-12 dark:bg-slate-950">

    <div class="mx-auto max-w-4xl">

        <div class="rounded-2xl border border-slate-200
                    bg-white p-8 shadow-sm
                    dark:border-slate-800
                    dark:bg-slate-900">

            <p class="text-sm font-medium text-green-600
                      dark:text-green-400">
                Inscription réussie
            </p>

            <h1 class="mt-2 text-3xl font-bold
                       text-slate-900 dark:text-white">
                Bienvenue {{ auth()->user()->prenom }} !
            </h1>

            <p class="mt-3 text-slate-600 dark:text-slate-400">
                Votre compte a été créé avec succès.
            </p>

            <div class="mt-6 grid gap-4 sm:grid-cols-2">

                <div class="rounded-xl bg-slate-50 p-4 dark:bg-slate-800">
                    <p class="text-xs text-slate-500">Nom</p>
                    <p class="mt-1 font-semibold">
                        {{ auth()->user()->nom }}
                    </p>
                </div>

                <div class="rounded-xl bg-slate-50 p-4 dark:bg-slate-800">
                    <p class="text-xs text-slate-500">Prénom</p>
                    <p class="mt-1 font-semibold">
                        {{ auth()->user()->prenom }}
                    </p>
                </div>

                <div class="rounded-xl bg-slate-50 p-4 dark:bg-slate-800">
                    <p class="text-xs text-slate-500">Sexe</p>
                    <p class="mt-1 font-semibold">
                        {{ ucfirst(auth()->user()->sexe) }}
                    </p>
                </div>

                <div class="rounded-xl bg-slate-50 p-4 dark:bg-slate-800">
                    <p class="text-xs text-slate-500">
                        Date de naissance
                    </p>

                    <p class="mt-1 font-semibold">
                        {{ auth()->user()->date_naissance->format('d/m/Y') }}
                    </p>
                </div>

            </div>

        </div>

    </div>

</div>

@endsection