<a
    href="{{ match(auth()->user()->role) {
        'administrateur' => route('admin.dashboard'),
        'secretaire' => route('secretaire.dashboard'),
        'directeur' => route('directeur.dashboard'),
        'chef_service' => route('chef.dashboard'),
        'personnel' => route('personnel.dashboard'),
        'externe' => route('external.dashboard'),
        default => route('home'),
    } }}"
    class="inline-flex items-center gap-2
           px-4 py-2.5
           rounded-xl
           bg-white dark:bg-slate-800
           border border-slate-200 dark:border-slate-700
           text-slate-700 dark:text-slate-200
           font-semibold
           shadow-sm
           hover:bg-green-50
           dark:hover:bg-slate-700
           hover:text-green-700
           dark:hover:text-green-400
           transition"
>
    <svg
        class="w-5 h-5"
        fill="none"
        stroke="currentColor"
        viewBox="0 0 24 24"
    >
        <path
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M10 19l-7-7m0 0l7-7m-7 7h18"
        />
    </svg>

    <span>Retour au dashboard</span>
</a>