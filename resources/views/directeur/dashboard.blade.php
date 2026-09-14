@extends('layouts.app')

@section('title', 'Dashboard Directeur')

@section('content')

<div class="min-h-screen bg-slate-50 dark:bg-slate-950">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">

        <div class="mb-8">
            <p class="text-sm font-semibold text-green-600">
                CENADI
            </p>

            <h1 class="mt-2 text-3xl font-bold text-slate-900 dark:text-white">
                Tableau de bord du Directeur
            </h1>

            <p class="mt-2 text-slate-600 dark:text-slate-400">
                Bienvenue,
                <span class="font-semibold">
                    {{ $user->prenom }} {{ $user->nom }}
                </span>.
            </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

            <div class="bg-white dark:bg-slate-900 rounded-2xl p-6 shadow-sm">
                <p class="text-sm text-slate-500">
                    Courriers à examiner
                </p>

                <p class="mt-2 text-3xl font-bold text-green-600">
                    {{ $courriersAExaminer }}
                </p>
            </div>

            <div class="bg-white dark:bg-slate-900 rounded-2xl p-6 shadow-sm">
                <p class="text-sm text-slate-500">
                    Courriers validés
                </p>

                <p class="mt-2 text-3xl font-bold text-blue-600">
                    {{ $courriersValides }}
                </p>
            </div>

            <div class="bg-white dark:bg-slate-900 rounded-2xl p-6 shadow-sm">
                <p class="text-sm text-slate-500">
                    Courriers rejetés
                </p>

                <p class="mt-2 text-3xl font-bold text-red-600">
                    {{ $courriersRejetes }}
                </p>
            </div>

            <div class="bg-white dark:bg-slate-900 rounded-2xl p-6 shadow-sm">
                <p class="text-sm text-slate-500">
                    Modifications demandées
                </p>

                <p class="mt-2 text-3xl font-bold text-yellow-600">
                    {{ $courriersAModifier }}
                </p>
            </div>

        </div>

    </div>

</div>

@endsection