<?php 
namespace App\Models; 
use Illuminate\Database\Eloquent\Model; 
use Illuminate\Database\Eloquent\Relations\BelongsTo; 
class CourrierPieceJointe extends Model 
{ 
    protected $fillable = 
    [ 
        'courrier_id', 
        'nom_original', 
        'chemin', 
        'mime_type', 
        'taille', 
    ]; 
    public function courrier(): BelongsTo 
    { 
        return $this->belongsTo( Courrier::class ); 
    } 
}