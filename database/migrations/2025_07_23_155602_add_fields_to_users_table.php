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

        Schema::table('users', function (Blueprint $table) {
            $table->string('nom_entreprise')->nullable();
            $table->enum('role', ['admin', 'entrepreneur_en_attente', 'entrepreneur_approuve', 'client'])
                ->default('client');
            $table->string('telephone')->nullable();
            $table->text('adresse')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
