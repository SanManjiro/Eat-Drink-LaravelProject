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
        Schema::table('stands', function (Blueprint $table) {
              $table->string('localisation')->nullable();
                    $table->string('telephone')->nullable();
                    $table->string('horaires')->nullable();
                    $table->enum('statut', ['en_attente', 'approuve', 'rejete'])->default('en_attente');
                    $table->text('motif_rejet')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('stands', function (Blueprint $table) {
            //
        });
    }
};
