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
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->nullable()->constrained('clients'); 
            $table->foreignId('chauffeur_id')->nullable()->constrained('chauffeurs'); 
            $table->foreignId('admin_id')->nullable()->constrained('admins'); 
            $table->foreignId('demande_id')->nullable()->constrained('demandes');

            $table->string('libnotif');
            $table->longText('message');
            $table->dateTime('dateheurenotif');             
            $table->boolean('is_read')->default(false); 
            $table->timestamps();

            

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('notifications', function (Blueprint $table) {
            $table->dropForeign(['client_id']); // Supprime la clé étrangère
            $table->dropForeign(['chauffeur_id']); // Supprime la clé étrangère
            $table->dropForeign(['admin_id']); // Supprime la clé étrangère
            $table->dropForeign(['demande_id']); // Supprime la clé étrangère
            
            
        });

        Schema::dropIfExists('notifications');
    }
};
