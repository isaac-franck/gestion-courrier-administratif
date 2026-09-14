<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transmission extends Model
{
    protected $fillable = [
        'courrier_id',
        'expediteur_id',
        'destinataire_id',
        'commentaire',
        'date_transmission',
        'statut',
    ];

    protected function casts(): array
    {
        return [
            'date_transmission' => 'datetime',
        ];
    }

    public function courrier(): BelongsTo
    {
        return $this->belongsTo(Courrier::class);
    }

    public function expediteur(): BelongsTo
    {
        return $this->belongsTo(User::class, 'expediteur_id');
    }

    public function destinataire(): BelongsTo
    {
        return $this->belongsTo(User::class, 'destinataire_id');
    }
}