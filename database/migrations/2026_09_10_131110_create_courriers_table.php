<?php 
use Illuminate\Database\Migrations\Migration; 
use Illuminate\Database\Schema\Blueprint; 
use Illuminate\Support\Facades\Schema; 
return new class extends Migration { 
    public function up(): void { 
        Schema::create('courriers', function (Blueprint $table) { 
            $table->id(); 
            /* * Le numéro est attribué par le secrétariat. 
            * Il est donc NULL lors du dépôt. */ 
            $table->string('numero') ->nullable() ->unique(); 
            $table->string('nom'); 
            $table->text('description'); 
            /* * Utilisateur qui dépose le courrier. */ 
            $table->foreignId('expediteur_id') 
            ->constrained('users') 
            ->restrictOnDelete();
             /* * État initial. */ 
             $table->string('statut') ->default('depose'); 
             /* * Date et heure exactes du dépôt. */ 
             $table->timestamp('date_depot')->useCurrent(); 
             $table->timestamps(); 
             }); 
             } 
             public function down(): void { 
                Schema::dropIfExists('courriers'); 
                }
                 };