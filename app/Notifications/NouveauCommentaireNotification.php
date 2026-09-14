<?php

namespace App\Notifications;

use App\Models\Commentaire;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class NouveauCommentaireNotification extends Notification
{
    use Queueable;

    public function __construct(
        public Commentaire $commentaire
    ) {}

    public function via(object $notifiable): array
    {
        return ['database'];
    }

    public function toArray(object $notifiable): array
    {
        return [
            'type' => 'nouveau_commentaire',
            'titre' => 'Nouveau commentaire',
            'commentaire_id' => $this->commentaire->id,
            'auteur_id' => $this->commentaire->auteur_id,
            'auteur' => $this->commentaire->auteur->prenom
                . ' '
                . $this->commentaire->auteur->nom,
            'courrier_id' => $this->commentaire->courrier_id,
            'message' => 'Vous avez reçu un nouveau commentaire.',
        ];
    }
}