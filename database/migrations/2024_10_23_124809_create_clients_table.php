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
        Schema::create('clients', function (Blueprint $table) {
            
            $table->id();           
            $table->foreignId('user_id')->constrained()->onDelete('cascade');//cle etrangere
            $table->string('adresse')->nullable();
            $table->timestamps();

            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('clients', function (Blueprint $table) {
            $table->dropForeign(['user_id']); // Supprime la clé étrangère
        });

        Schema::dropIfExists('clients');
    }
};
