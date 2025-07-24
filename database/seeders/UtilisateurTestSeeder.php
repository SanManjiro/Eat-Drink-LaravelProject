<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UtilisateurTestSeeder extends Seeder
{
    public function run(): void
    {
        // Ajoute un utilisateur entrepreneur approuvé
        $utilisateurId = DB::table('utilisateurs')->insertGetId([
            'nom_entreprise' => 'Test Food',
            'email' => 'entrepreneur@test.com',
            'mot_de_passe' => Hash::make('password'),
            'role' => 'entrepreneur_approuve',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Ajoute un stand lié à cet utilisateur
        $standId = DB::table('stands')->insertGetId([
            'nom_stand' => 'Stand Test',
            'description' => 'Un stand de test pour Eat&Drink',
            'utilisateur_id' => $utilisateurId,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Ajoute quelques produits
        DB::table('produits')->insert([
            [
                'nom' => 'Burger Test',
                'description' => 'Un burger fictif',
                'prix' => 8.5,
                'image_url' => null,
                'stand_id' => $standId,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Frites Test',
                'description' => 'Des frites fictives',
                'prix' => 3.0,
                'image_url' => null,
                'stand_id' => $standId,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
