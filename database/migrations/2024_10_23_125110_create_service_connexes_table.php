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
        Schema::create('service_connexes', function (Blueprint $table) {
            $table->id();         
            $table->foreignId('demande_id')->constrained();//cle etrangere  
            $table->string('libservice');
            $table->longText('description');
            $table->decimal('montant', 10, 2);
            $table->decimal('gainprestataire', 10, 2);  
            $table->decimal('gainagence', 10, 2);                       
            $table->timestamp('dateservice')->useCurrent(); 
            $table->timestamps();
           
            //cles etrangeres

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('service_connexes', function (Blueprint $table) {
            $table->dropForeign(['demande_id']); // Supprime la clé étrangère
            
        });

        Schema::dropIfExists('service_connexes');
    }
};
