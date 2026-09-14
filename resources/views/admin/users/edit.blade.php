@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-slate-50 dark:bg-slate-950 transition-colors duration-300">

    <!-- HEADER -->
    <header class="sticky top-0 z-40 border-b
                   border-slate-200 dark:border-slate-800
                   bg-white/90 dark:bg-slate-900/90
                   backdrop-blur-xl">

        <div class="px-4 sm:px-6 lg:px-8 py-4">

            <div class="flex items-center justify-between gap-4">

                <div class="flex items-center gap-3">

                    <a
                        href="{{ route('admin.users.list') }}"
                        class="flex h-10 w-10 items-center justify-center rounded-xl
                               border border-slate-200 dark:border-slate-700
                               bg-white dark:bg-slate-800
                               text-slate-600 dark:text-slate-300
                               hover:bg-slate-50 dark:hover:bg-slate-700
                               transition"
                    >
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M15 19l-7-7 7-7"/>
                        </svg>
                    </a>

                    <div>

                        <p class="text-sm text-slate-500 dark:text-slate-400">
                            Administration / Utilisateurs
                        </p>

                        <h1 class="text-xl font-bold text-slate-900 dark:text-white">
                            Modifier un utilisateur
                        </h1>

                    </div>

                </div>


                <button
                    id="admin-theme-toggle"
                    type="button"
                    class="h-10 w-10 rounded-xl
                           border border-slate-200 dark:border-slate-700
                           bg-white dark:bg-slate-800
                           text-slate-600 dark:text-slate-300
                           hover:bg-slate-50 dark:hover:bg-slate-700
                           transition"
                >

                    <svg class="h-5 w-5 mx-auto dark:hidden"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">

                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364-6.364l-.707.707M6.343 17.657l-.707.707m12.728 0l-.707-.707M6.343 6.343l-.707-.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/>

                    </svg>

                    <svg class="hidden h-5 w-5 mx-auto dark:block"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">

                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"/>

                    </svg>

                </button>

            </div>

        </div>

    </header>


    <!-- MAIN -->
    <main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

        <!-- ERRORS -->
        @if($errors->any())

            <div class="mb-6 rounded-2xl
                        border border-red-200 dark:border-red-900
                        bg-red-50 dark:bg-red-950/30
                        p-5">

                <div class="flex gap-3">

                    <svg class="h-5 w-5 shrink-0 text-red-600 dark:text-red-400"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">

                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M12 8v4m0 4h.01M10.29 3.86L1.82 18a2 2 0 001.71 2.57h16.94A2 2 0 0022.18 18L13.71 3.86a2 2 0 00-3.42 0z"/>

                    </svg>

                    <div>

                        <p class="font-semibold text-red-800 dark:text-red-300">
                            Impossible de modifier cet utilisateur
                        </p>

                        <ul class="mt-2 list-disc list-inside text-sm
                                   text-red-700 dark:text-red-400">

                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach

                        </ul>

                    </div>

                </div>

            </div>

        @endif


        <!-- CARD -->
        <div class="rounded-3xl border
                    border-slate-200 dark:border-slate-800
                    bg-white dark:bg-slate-900
                    shadow-sm overflow-hidden">


            <!-- PROFILE HEADER -->
            <div class="p-6 sm:p-8
                        border-b border-slate-200 dark:border-slate-800">

                <div class="flex items-center gap-4">

                    <div class="h-16 w-16 rounded-2xl
                                bg-green-100 dark:bg-green-950/40
                                flex items-center justify-center
                                text-green-700 dark:text-green-400
                                text-xl font-bold">

                        {{ strtoupper(substr($user->prenom, 0, 1)) }}{{ strtoupper(substr($user->nom, 0, 1)) }}

                    </div>

                    <div>

                        <h2 class="text-xl font-bold text-slate-900 dark:text-white">

                            {{ $user->prenom }} {{ $user->nom }}

                        </h2>

                        <p class="text-sm text-slate-500 dark:text-slate-400">
                            {{ $user->email }}
                        </p>

                        <div class="mt-2">

                            @if($user->actif)

                                <span class="inline-flex items-center gap-2 rounded-full
                                             bg-green-100 dark:bg-green-950/40
                                             px-3 py-1 text-xs font-semibold
                                             text-green-700 dark:text-green-400">

                                    <span class="h-2 w-2 rounded-full bg-green-500"></span>

                                    Compte actif

                                </span>

                            @else

                                <span class="inline-flex items-center gap-2 rounded-full
                                             bg-red-100 dark:bg-red-950/40
                                             px-3 py-1 text-xs font-semibold
                                             text-red-700 dark:text-red-400">

                                    <span class="h-2 w-2 rounded-full bg-red-500"></span>

                                    Compte bloqué

                                </span>

                            @endif

                        </div>

                    </div>

                </div>

            </div>


            <!-- FORM -->
            <form
                action="{{ route('admin.users.update', $user) }}"
                method="POST"
            >

                @csrf
                @method('PUT')


                <!-- Personal -->
                <div class="p-6 sm:p-8">

                    <div class="mb-6">

                        <h3 class="text-lg font-semibold text-slate-900 dark:text-white">
                            Informations personnelles
                        </h3>

                        <p class="text-sm text-slate-500 dark:text-slate-400 mt-1">
                            Modifiez les informations générales du compte.
                        </p>

                    </div>


                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                        <!-- Nom -->
                        <div>

                            <label class="block text-sm font-medium
                                          text-slate-700 dark:text-slate-300 mb-2">
                                Nom
                            </label>

                            <input
                                type="text"
                                name="nom"
                                value="{{ old('nom', $user->nom) }}"
                                required
                                class="w-full rounded-xl border
                                       border-slate-200 dark:border-slate-700
                                       bg-slate-50 dark:bg-slate-800
                                       px-4 py-3
                                       text-slate-900 dark:text-white
                                       focus:border-green-500
                                       focus:ring-2 focus:ring-green-500/20
                                       outline-none"
                            >

                        </div>


                        <!-- Prénom -->
                        <div>

                            <label class="block text-sm font-medium
                                          text-slate-700 dark:text-slate-300 mb-2">
                                Prénom
                            </label>

                            <input
                                type="text"
                                name="prenom"
                                value="{{ old('prenom', $user->prenom) }}"
                                required
                                class="w-full rounded-xl border
                                       border-slate-200 dark:border-slate-700
                                       bg-slate-50 dark:bg-slate-800
                                       px-4 py-3
                                       text-slate-900 dark:text-white
                                       focus:border-green-500
                                       focus:ring-2 focus:ring-green-500/20
                                       outline-none"
                            >

                        </div>


                        <!-- Email -->
                        <div>

                            <label class="block text-sm font-medium
                                          text-slate-700 dark:text-slate-300 mb-2">
                                Adresse email
                            </label>

                            <input
                                type="email"
                                name="email"
                                value="{{ old('email', $user->email) }}"
                                required
                                class="w-full rounded-xl border
                                       border-slate-200 dark:border-slate-700
                                       bg-slate-50 dark:bg-slate-800
                                       px-4 py-3
                                       text-slate-900 dark:text-white
                                       focus:border-green-500
                                       focus:ring-2 focus:ring-green-500/20
                                       outline-none"
                            >

                        </div>


                        <!-- Téléphone -->
                        <div>

                            <label class="block text-sm font-medium
                                          text-slate-700 dark:text-slate-300 mb-2">
                                Téléphone
                            </label>

                            <input
                                type="text"
                                name="telephone"
                                value="{{ old('telephone', $user->telephone) }}"
                                class="w-full rounded-xl border
                                       border-slate-200 dark:border-slate-700
                                       bg-slate-50 dark:bg-slate-800
                                       px-4 py-3
                                       text-slate-900 dark:text-white
                                       focus:border-green-500
                                       focus:ring-2 focus:ring-green-500/20
                                       outline-none"
                            >

                        </div>


                        <!-- Sexe -->
                        <div>

                            <label class="block text-sm font-medium
                                          text-slate-700 dark:text-slate-300 mb-2">
                                Sexe
                            </label>

                            <select
                                name="sexe"
                                required
                                class="w-full rounded-xl border
                                       border-slate-200 dark:border-slate-700
                                       bg-slate-50 dark:bg-slate-800
                                       px-4 py-3
                                       text-slate-900 dark:text-white
                                       focus:border-green-500
                                       focus:ring-2 focus:ring-green-500/20
                                       outline-none"
                            >

                                <option value="homme"
                                    @selected(old('sexe', $user->sexe) === 'homme')}>
                                    Homme
                                </option>

                                <option value="femme"
                                    @selected(old('sexe', $user->sexe) === 'femme')}>
                                    Femme
                                </option>

                            </select>

                        </div>


                        <!-- Date naissance -->
                        <div>

                            <label class="block text-sm font-medium
                                          text-slate-700 dark:text-slate-300 mb-2">
                                Date de naissance
                            </label>

                            <input
                                type="date"
                                name="date_naissance"
                                value="{{ old('date_naissance', optional($user->date_naissance)->format('Y-m-d')) }}"
                                required
                                class="w-full rounded-xl border
                                       border-slate-200 dark:border-slate-700
                                       bg-slate-50 dark:bg-slate-800
                                       px-4 py-3
                                       text-slate-900 dark:text-white
                                       focus:border-green-500
                                       focus:ring-2 focus:ring-green-500/20
                                       outline-none"
                            >

                        </div>

                    </div>

                </div>


                <!-- ROLE -->
                <div class="border-t border-slate-200 dark:border-slate-800 p-6 sm:p-8">

                    <div class="mb-6">

                        <h3 class="text-lg font-semibold text-slate-900 dark:text-white">
                            Rôle et affectation
                        </h3>

                        <p class="text-sm text-slate-500 dark:text-slate-400 mt-1">
                            Définissez les responsabilités et le service de l'utilisateur.
                        </p>

                    </div>


                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                        <!-- Role -->
                        <div>

                            <label class="block text-sm font-medium
                                          text-slate-700 dark:text-slate-300 mb-2">
                                Rôle
                            </label>

                            <select
                                id="role"
                                name="role"
                                required
                                class="w-full rounded-xl border
                                       border-slate-200 dark:border-slate-700
                                       bg-slate-50 dark:bg-slate-800
                                       px-4 py-3
                                       text-slate-900 dark:text-white
                                       focus:border-green-500
                                       focus:ring-2 focus:ring-green-500/20
                                       outline-none"
                            >

                                <option value="externe"
                                    @selected(old('role', $user->role) === 'externe')}>
                                    Externe
                                </option>

                                <option value="personnel"
                                    @selected(old('role', $user->role) === 'personnel')}>
                                    Personnel
                                </option>

                                <option value="chef_service"
                                    @selected(old('role', $user->role) === 'chef_service')}>
                                    Chef de service
                                </option>

                                <option value="secretaire"
                                    @selected(old('role', $user->role) === 'secretaire')}>
                                    Secrétaire
                                </option>

                                <option value="directeur"
                                    @selected(old('role', $user->role) === 'directeur')}>
                                    Directeur
                                </option>

                                <option value="administrateur"
                                    @selected(old('role', $user->role) === 'administrateur')}>
                                    Administrateur
                                </option>

                            </select>

                        </div>


                        <!-- Service -->
                        <div
                            id="service-container"
                            class="hidden"
                        >

                            <label class="block text-sm font-medium
                                          text-slate-700 dark:text-slate-300 mb-2">
                                Service
                            </label>

                            <select
                                id="service_id"
                                name="service_id"
                                class="w-full rounded-xl border
                                       border-slate-200 dark:border-slate-700
                                       bg-slate-50 dark:bg-slate-800
                                       px-4 py-3
                                       text-slate-900 dark:text-white
                                       focus:border-green-500
                                       focus:ring-2 focus:ring-green-500/20
                                       outline-none"
                            >

                                <option value="">
                                    Sélectionner un service
                                </option>

                                @foreach($services as $service)

                                    <option
                                        value="{{ $service->id }}"
                                        @selected((string) old('service_id', $user->service_id) === (string) $service->id)
                                    >
                                        {{ $service->nom }}
                                    </option>

                                @endforeach

                            </select>

                        </div>

                    </div>

                </div>


                <!-- PASSWORD -->
                <div class="border-t border-slate-200 dark:border-slate-800 p-6 sm:p-8">

                    <div class="mb-6">

                        <h3 class="text-lg font-semibold text-slate-900 dark:text-white">
                            Sécurité
                        </h3>

                        <p class="text-sm text-slate-500 dark:text-slate-400 mt-1">
                            Laissez les champs vides si vous ne souhaitez pas modifier le mot de passe.
                        </p>

                    </div>


                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                        <div>

                            <label class="block text-sm font-medium
                                          text-slate-700 dark:text-slate-300 mb-2">
                                Nouveau mot de passe
                            </label>

                            <input
                                type="password"
                                name="password"
                                autocomplete="new-password"
                                class="w-full rounded-xl border
                                       border-slate-200 dark:border-slate-700
                                       bg-slate-50 dark:bg-slate-800
                                       px-4 py-3
                                       text-slate-900 dark:text-white
                                       focus:border-green-500
                                       focus:ring-2 focus:ring-green-500/20
                                       outline-none"
                            >

                        </div>


                        <div>

                            <label class="block text-sm font-medium
                                          text-slate-700 dark:text-slate-300 mb-2">
                                Confirmation
                            </label>

                            <input
                                type="password"
                                name="password_confirmation"
                                autocomplete="new-password"
                                class="w-full rounded-xl border
                                       border-slate-200 dark:border-slate-700
                                       bg-slate-50 dark:bg-slate-800
                                       px-4 py-3
                                       text-slate-900 dark:text-white
                                       focus:border-green-500
                                       focus:ring-2 focus:ring-green-500/20
                                       outline-none"
                            >

                        </div>

                    </div>

                </div>


                <!-- ACTIONS -->
                <div class="border-t border-slate-200 dark:border-slate-800
                            p-6 sm:p-8
                            flex flex-col-reverse sm:flex-row
                            sm:justify-end gap-3">

                    <a
                        href="{{ route('admin.users.list') }}"
                        class="inline-flex justify-center items-center
                               rounded-xl
                               border border-slate-200 dark:border-slate-700
                               px-5 py-3
                               text-sm font-semibold
                               text-slate-700 dark:text-slate-300
                               hover:bg-slate-50 dark:hover:bg-slate-800
                               transition"
                    >
                        Annuler
                    </a>

                    <button
                        type="submit"
                        class="inline-flex justify-center items-center gap-2
                               rounded-xl
                               bg-green-600
                               px-5 py-3
                               text-sm font-semibold text-white
                               hover:bg-green-700
                               transition"
                    >

                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M5 13l4 4L19 7"/>
                        </svg>

                        Enregistrer les modifications

                    </button>

                </div>

            </form>

        </div>

    </main>

</div>


<script>
document.addEventListener('DOMContentLoaded', function () {

    const role = document.getElementById('role');
    const serviceContainer = document.getElementById('service-container');
    const service = document.getElementById('service_id');
    const themeToggle = document.getElementById('admin-theme-toggle');

    function updateServiceField() {

        const rolesWithService = [
            'personnel',
            'chef_service'
        ];

        if (rolesWithService.includes(role.value)) {

            serviceContainer.classList.remove('hidden');
            service.required = true;

        } else {

            serviceContainer.classList.add('hidden');
            service.required = false;
            service.value = '';

        }

    }

    role.addEventListener('change', updateServiceField);

    updateServiceField();


    if (themeToggle) {

        themeToggle.addEventListener('click', function () {

            document.documentElement.classList.toggle('dark');

            localStorage.setItem(
                'theme',
                document.documentElement.classList.contains('dark')
                    ? 'dark'
                    : 'light'
            );

        });

    }

});
</script>

@endsection