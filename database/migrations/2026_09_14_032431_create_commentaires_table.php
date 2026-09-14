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
        Schema::create('commentaires', function (Blueprint $table) {
            $table->id();

    $table->foreignId('auteur_id')
        ->constrained('users')
        ->restrictOnDelete();

    $table->foreignId('destinataire_id')
        ->constrained('users')
        ->restrictOnDelete();

    $table->foreignId('courrier_id')
        ->nullable()
        ->constrained('courriers')
        ->nullOnDelete();

    $table->text('contenu');

    $table->boolean('lu')->default(false);

    $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commentaires');
    }
};
