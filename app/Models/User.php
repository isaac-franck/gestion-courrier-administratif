<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Service;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * Les attributs pouvant être remplis en masse.
     */
    protected $fillable = [
        'nom',
        'prenom',
        'sexe',
        'email',
        'telephone',
        'date_naissance',
        'role',
        'service_id',
        'actif',
        'password',
    ];

    /**
     * Les attributs qui doivent être cachés.
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Les conversions de types.
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'date_naissance' => 'date',
            'actif' => 'boolean',
        ];
    }

    public function service()
{
    return $this->belongsTo(Service::class);
}

public function expediteur()
{
    return $this->belongsTo(User::class, 'expediteur_id');
}

public function destinataire()
{
    return $this->belongsTo(User::class, 'destinataire_id');
}

public function courriersDeposes(): HasMany
{
    return $this->hasMany(
        Courrier::class,
        'expediteur_id'
    );
}

public function commentairesEnvoyes(): HasMany
{
    return $this->hasMany(Commentaire::class, 'auteur_id');
}

public function commentairesRecus(): HasMany
{
    return $this->hasMany(Commentaire::class, 'destinataire_id');
}

public function transmissionsEnvoyees(): HasMany
{
    return $this->hasMany(
        Transmission::class,
        'expediteur_id'
    );
}

public function transmissionsRecues(): HasMany
{
    return $this->hasMany(
        Transmission::class,
        'destinataire_id'
    );
}

public function courriersTransmisCommeDirecteur(): HasMany
{
    return $this->hasMany(
        Courrier::class,
        'directeur_id'
    );
}


}