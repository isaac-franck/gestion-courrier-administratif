<?php 
namespace App\Models; 
use Illuminate\Database\Eloquent\Model; 
use Illuminate\Database\Eloquent\Relations\BelongsTo; 
use Illuminate\Database\Eloquent\Relations\HasMany; 
use App\Models\User;
class Courrier extends Model 
{ 
    protected $fillable = [ 
        'numero', 
        'nom', 
        'description', 
        'expediteur_id', 
        'statut', 
        'date_depot',
        'directeur_id',
'date_transmission_directeur',
'date_validation',
'date_rejet',
'motif_rejet', 
    ]; 
    protected function casts(): array 
    { 
        return [
        'date_depot' => 'datetime',
        'date_transmission_directeur' => 'datetime',
        'date_validation' => 'datetime',
        'date_rejet' => 'datetime', ]; 
    } 
    public function expediteur(): BelongsTo 
    { 
        return $this->belongsTo( User::class, 'expediteur_id' ); 
    } 
    public function piecesJointes(): HasMany 
    { return $this->hasMany( CourrierPieceJointe::class ); 
    } 

    public function destinataire(): BelongsTo
{
    return $this->belongsTo(User::class, 'destinataire_id');
}

public function transmissions(): HasMany
{
    return $this->hasMany(Transmission::class);
}

public function directeur(): BelongsTo
{
    return $this->belongsTo(User::class, 'directeur_id');
}

public function service(): BelongsTo
{
    return $this->belongsTo(Service::class);
}
}