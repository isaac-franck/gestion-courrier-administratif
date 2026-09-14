<?php


use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Courrier\CourrierController;
use App\Http\Controllers\External\DashboardExternalController;
use App\Http\Controllers\Personnel\DashboardPersonnelController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Secretaire\DashboardController as SecretaireDashboardController;
use App\Http\Controllers\Secretaire\CourrierController as SecretaireCourrierController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\CommentaireController;
use App\Http\Controllers\Directeur\DashboardController as DirecteurDashboardController;

Route::get('/', function () {
    return view('welcome');
})->name('home');


Route::get('/login', [
    LoginController::class,
    'showLoginForm'
])->name('login');

Route::post('/login', [
    LoginController::class,
    'login'
])->name('login.authenticate');




/*
|--------------------------------------------------------------------------
| INSCRIPTION
|--------------------------------------------------------------------------
*/

Route::get('/register', [
    RegisteredUserController::class,
    'create'
])->name('register');

Route::post('/register', [
    RegisteredUserController::class,
    'store'
]);


/*
|--------------------------------------------------------------------------
| DASHBOARD
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () 
{ 
    /* * Formulaire commun à tous les utilisateurs. */ 
    Route::get('/courriers/create', 
    [ 
        CourrierController::class, 'create' 
        ])->name('courriers.create'); 
    /* 
    * Traitement du dépôt. 
    */ 
    Route::post('/courriers', [ CourrierController::class, 'store' ])->name('courriers.store'); });


Route::get('/admin/dashboard', [
    DashboardController::class,
    'index'
])->middleware(['auth', 'admin'])->name('admin.dashboard');

Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/users', [
    UserController::class,
    'index'
])->name('users.index');

Route::get('/users/list', [
    UserController::class,
    'list'
])->name('users.list');

Route::get('/users/create', [
    UserController::class,
    'create'
])->name('users.create');

Route::post('/users', [
    UserController::class,
    'store'
])->name('users.store');

Route::get('/users/{user}/edit', [
    UserController::class,
    'edit'
])->name('users.edit');

Route::put('/users/{user}', [
    UserController::class,
    'update'
])->name('users.update');

Route::delete('/users/{user}', [
    UserController::class,
    'destroy'
])->name('users.destroy');

Route::patch('/users/{user}/block', [
    UserController::class,
    'block'
])->name('users.block');

Route::patch('/users/{user}/unblock', [
    UserController::class,
    'unblock'
])->name('users.unblock');

// Gestion des services
 Route::get('/services', [ ServiceController::class, 'index' ])->name('services.index'); 
 Route::get('/services/create', [ ServiceController::class, 'create' ])->name('services.create'); 
 Route::post('/services', [ ServiceController::class, 'store' ])->name('services.store'); 
 Route::get('/services/{service}/edit', [ ServiceController::class, 'edit' ])->name('services.edit'); 
 Route::put('/services/{service}', [ ServiceController::class, 'update' ])->name('services.update'); 
 Route::delete('/services/{service}', [ ServiceController::class, 'destroy' ])->name('services.destroy');
    });

    


Route::middleware(['auth', 'secretaire'])
    ->prefix('espace-secretaire')
    ->name('secretaire.')
    ->group(function () {

        Route::get('/dashboard', [
            SecretaireDashboardController::class,
            'index'
        ])->name('dashboard');

        Route::get('/courriers', [
            CourrierController::class,
            'index'
        ])->name('courriers.index');

        // Courriers à enregistrer
        Route::get('/courriers/a-enregistrer', [
            SecretaireCourrierController::class,
            'aEnregistrer'
        ])->name('courriers.a-enregistrer');

        // Formulaire d'enregistrement
        Route::get('/courriers/{courrier}/enregistrer', [
            SecretaireCourrierController::class,
            'editEnregistrement'
        ])->name('courriers.enregistrer');

        // Validation de l'enregistrement
        Route::put('/courriers/{courrier}/enregistrer', [
            SecretaireCourrierController::class,
            'enregistrer'
        ])->name('courriers.enregistrer.store');

        Route::get('/courriers/{courrier}/modifier-demande', [
            SecretaireCourrierController::class,
            'formDemandeModification'
        ])->name('courriers.modification.form');

        Route::post('/courriers/{courrier}/modifier-demande', [
            SecretaireCourrierController::class,
            'demanderModification'
        ])->name('courriers.modification.store');

        Route::get(
            '/courriers/{courrier}/transmettre-directeur',
            [
                SecretaireCourrierController::class,
                'formTransmission'
            ]
        )->name('courriers.transmission.form');

        Route::post(
            '/courriers/{courrier}/transmettre-directeur',
            [
                SecretaireCourrierController::class,
                'transmettreAuDirecteur'
            ]
        )->name('courriers.transmission.store');


    });

// Route pour le simple utilisateur
        Route::middleware(['auth', 'external'])
    ->prefix('espace')
    ->name('external.')
    ->group(function () {

        // Tableau de bord
        Route::get('/dashboard', [
            DashboardExternalController::class,
            'index'
        ])->name('dashboard');

        // Courriers
        Route::get('/courriers', [
            //CourrierController::class,
            'index'
        ])->name('courriers.index');

        Route::get('/courriers/create', [
            //CourrierController::class,
            'create'
        ])->name('courriers.create');

        Route::post('/courriers', [
            //CourrierController::class,
            'store'
        ])->name('courriers.store');

        Route::get('/courriers/{courrier}', [
            //CourrierController::class,
            'show'
        ])->name('courriers.show');

        // Réponses
        Route::get('/reponses', [
            //ReponseController::class,
            'index'
        ])->name('reponses.index');

        Route::get('/courriers/{courrier}/reponse', [
            //ReponseController::class,
            'create'
        ])->name('reponses.create');

        Route::post('/courriers/{courrier}/reponse', [
            //ReponseController::class,
            'store'
        ])->name('reponses.store');

        // Profil
        Route::get('/profil', [
            DashboardController::class,
            'profile'
        ])->name('profile');
    });

    /*
    ----------------------------------------------------------------------
    Personnel
    --------------------------------------------------------------------------
    */

    
Route::middleware(['auth', 'personnel'])
    ->prefix('espace-personnel')
    ->name('personnel.')
    ->group(function () {

        Route::get('/dashboard', [
            DashboardPersonnelController::class,
            'index'
        ])->name('dashboard');

    });


    Route::middleware('auth')->group(function () {

    Route::get('/courriers/{courrier}', [
        CourrierController::class,
        'show'
    ])->name('courriers.show');

    // Consulter une pièce jointe
    Route::get('/courriers/{courrier}/pieces/{piece}', [
        \App\Http\Controllers\Courrier\CourrierController::class,
        'showPiece'
    ])->name('courriers.pieces.show');

    // Télécharger une pièce jointe
    Route::get('/courriers/{courrier}/pieces/{piece}/download', [
        \App\Http\Controllers\Courrier\CourrierController::class,
        'downloadPiece'
    ])->name('courriers.pieces.download');

    Route::get('/commentaires', [
        CommentaireController::class,
        'index'
    ])->name('commentaires.index');

    Route::get('/commentaires/nouveau', [
        CommentaireController::class,
        'create'
    ])->name('commentaires.create');

    Route::post('/commentaires', [
        CommentaireController::class,
        'store'
    ])->name('commentaires.store');

    Route::get('/commentaires/{commentaire}', [
        CommentaireController::class,
        'show'
    ])->name('commentaires.show');

    Route::get('/notifications', [
        NotificationController::class,
        'index'
    ])->name('notifications.index');

    Route::get('/notifications/{notification}', [
        NotificationController::class,
        'show'
    ])->name('notifications.show');


});


Route::middleware(['auth', 'directeur'])
    ->prefix('espace-directeur')
    ->name('directeur.')
    ->group(function () {

        Route::get('/dashboard', [
            DirecteurDashboardController::class,
            'index'
        ])->name('dashboard');

    });

/*
|--------------------------------------------------------------------------
| DÉCONNEXION
|--------------------------------------------------------------------------
*/

Route::post('/logout', [
    LoginController::class,
    'logout'
])->middleware('auth')->name('logout');
