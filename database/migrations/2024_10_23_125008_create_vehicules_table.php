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
        Schema::create('vehicules', function (Blueprint $table) {
            $table->id();  
            $table->foreignId('type_vehicule_id')->constrained()->onDelete('cascade');//cle etrangere
            $table->foreignId('chauffeur_id')->constrained()->onDelete('cascade');//cle etrangere            
            $table->string('libvehicule'); 
            $table->string('immatr')->unique(); 
            $table->string('imagevehicule'); 
            $table->decimal('prixparkilometre', 10, 2); 
            $table->enum('statut', ['disponible', 'indisponible']); 
            $table->timestamps();

            //cles etrangeres

            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('vehicules', function (Blueprint $table) {
            $table->dropForeign(['type_vehicule_id']); // Supprime la clé étrangère
            $table->dropForeign(['chauffeur_id']); // Supprime la clé étrangère 2
        });

        Schema::dropIfExists('vehicules');
    }
};
