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
        Schema::table('courriers', function (Blueprint $table) {
            // Directeur auquel le courrier est transmis
            $table->foreignId('directeur_id')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            // Date de transmission au directeur
            $table->timestamp('date_transmission_directeur')
                ->nullable()
                ->after('directeur_id');

            // Date de validation par le directeur
            $table->timestamp('date_validation')
                ->nullable()
                ->after('date_transmission_directeur');

            // Date de rejet éventuel
            $table->timestamp('date_rejet')
                ->nullable()
                ->after('date_validation');

            // Motif du rejet
            $table->text('motif_rejet')
                ->nullable()
                ->after('date_rejet');

            // Service choisi par le directeur
            $table->foreignId('service_id')
                ->nullable()
                ->after('motif_rejet')
                ->constrained('services')
                ->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('courriers', function (Blueprint $table) {

            $table->dropForeign(['directeur_id']);
            $table->dropForeign(['service_id']);

            $table->dropColumn([
                'directeur_id',
                'date_transmission_directeur',
                'date_validation',
                'date_rejet',
                'motif_rejet',
                'service_id',
            ]);
        });
    }
};
