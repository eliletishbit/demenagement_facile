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
        Schema::create('chauffeurs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();//cle etrangere
            $table->string('adresse')->nullable();
            $table->string('numeropermis')->nullable();
            $table->timestamps();

            //cles etrangeres
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('chauffeurs', function (Blueprint $table) {
            $table->dropForeign(['user_id']); // Supprime la clé étrangère
        });

        Schema::dropIfExists('chauffeurs');
    }
};
