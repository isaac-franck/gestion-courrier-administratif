<?php

namespace App\Notifications;

use App\Models\Courrier;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class CourrierAModifierNotification extends Notification
{
    use Queueable;

    public function __construct(
        public Courrier $courrier
    ) {}

    public function via(object $notifiable): array
    {
        return ['database'];
    }

    public function toArray(object $notifiable): array
    {
        return [
            'type' => 'courrier_a_modifier',
            'titre' => 'Modification demandée',
            'courrier_id' => $this->courrier->id,
            'numero' => $this->courrier->numero,
            'nom' => $this->courrier->nom,
            'message' => 'Le secrétariat demande une modification de votre courrier.',
        ];
    }
}