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
        Schema::create('gain_admins', function (Blueprint $table) {
            $table->id();
            $table->foreignId('paiement_id')->constrained();//cle etrangere
            $table->foreignId('admin_id')->constrained();//cle etrangere
            $table->dateTime('date');            
            $table->decimal('montant', 10, 2); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('gain_admins', function (Blueprint $table) {
            $table->dropForeign(['paiement_id']); // Supprime la clé étrangère
            $table->dropForeign(['admin_id']); // Supprime la clé étrangère
            
        });

        Schema::dropIfExists('gain_admins');
    }
};
