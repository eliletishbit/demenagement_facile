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
        Schema::create('demandes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->constrained();//cle etrangere
            $table->foreignId('vehicule_id')->constrained();//cle etrangere 2
            $table->dateTime('dateheuresouhaite');
            $table->string('pointdepart');
            $table->string('pointarrive'); 
            $table->enum('statut', ['en_etude','en_attente', 'en_cours', 'termine', 'annule']); 
            $table->decimal('montant', 10, 2); 
            $table->timestamp('datedemande')->useCurrent(); 
            $table->timestamps();

            //cles etrangeres
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('demandes', function (Blueprint $table) {
            $table->dropForeign(['client_id']); // Supprime la clé étrangère
            $table->dropForeign(['vehicule_id']); // Supprime la clé étrangère
        });

        Schema::dropIfExists('demandes');
    }
};
