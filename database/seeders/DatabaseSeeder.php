<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Ajoute un utilisateur, un stand et des produits de test
        $this->call(\Database\Seeders\UtilisateurTestSeeder::class);
        $this->call(\Database\Seeders\DemoDataSeeder::class);
    }
}
