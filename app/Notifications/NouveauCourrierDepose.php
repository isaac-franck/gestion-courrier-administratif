<?php 
namespace App\Notifications; 
use App\Models\Courrier; 
use Illuminate\Bus\Queueable; 
use Illuminate\Notifications\Notification; 
class NouveauCourrierDepose extends Notification 
{ 
    use Queueable; 
    public function __construct( public Courrier $courrier ) 
    { 

    } 
    public function via(object $notifiable): array 
    { 
        return ['database']; 
    } 
    public function toArray(object $notifiable): array 
    { 
        return [ 'type' => 'nouveau_courrier', 'courrier_id' => $this->courrier->id, 'nom' => $this->courrier->nom, 'message' => 'Un nouveau courrier a été déposé et doit être enregistré.', 'date_depot' => $this->courrier->date_depot ->format('d/m/Y H:i'), ]; 
    } 
}