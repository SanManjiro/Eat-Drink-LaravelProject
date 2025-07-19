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
        Schema::create('stands', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("nom_stand");
            $table->string("description");
            //en laravel pour declarer mentionner qu'une column est une cle etrangere on utilise la methode foreignId pour le nom de la cle etranger constained pour mentionner la table dont la cle provient et onDelete pour definir l'action si un utilisateur est supprime avec son id
            $table->foreignId('utilisateur_id')->constrained('utilisateurs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('_stands');
    }
};
