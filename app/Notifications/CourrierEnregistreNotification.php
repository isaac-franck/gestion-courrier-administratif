<?php

namespace App\Notifications;

use App\Models\Courrier;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class CourrierEnregistreNotification extends Notification
{
    use Queueable;

    public function __construct(
        public Courrier $courrier
    ) {
    }

    public function via(object $notifiable): array
    {
        return ['database'];
    }

    public function toArray(object $notifiable): array
    {
        return [
            'type' => 'accuse_reception',
            'courrier_id' => $this->courrier->id,
            'numero' => $this->courrier->numero,
            'nom' => $this->courrier->nom,
            'message' => 'Votre courrier a été enregistré avec succès.',
        ];
    }
}