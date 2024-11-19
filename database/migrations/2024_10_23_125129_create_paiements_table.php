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
        Schema::create('paiements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('demande_id')->constrained();//cle etrangere
            $table->dateTime('dateheurepaiement');           
            $table->timestamps();

            //cles etrangeres
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('paiements', function (Blueprint $table) {
            $table->dropForeign(['demande_id']); // Supprime la clé étrangère
            
        });

        Schema::dropIfExists('paiements');
    }
};
