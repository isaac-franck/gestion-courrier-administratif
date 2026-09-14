<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transmissions', function (Blueprint $table) {
            $table->id();

            $table->foreignId('courrier_id')
                ->constrained('courriers')
                ->cascadeOnDelete();

            // Secrétaire qui effectue la transmission
            $table->foreignId('expediteur_id')
                ->constrained('users')
                ->restrictOnDelete();

            // Directeur qui reçoit la transmission
            $table->foreignId('destinataire_id')
                ->constrained('users')
                ->restrictOnDelete();

            // Commentaire du secrétaire
            $table->text('commentaire')->nullable();

            // Date réelle de transmission
            $table->timestamp('date_transmission')
                ->useCurrent();

            // État de la transmission
            $table->string('statut')
                ->default('en_attente');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transmissions');
    }
};
