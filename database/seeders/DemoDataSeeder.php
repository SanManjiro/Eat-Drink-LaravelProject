<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DemoDataSeeder extends Seeder
{
    public function run(): void
    {
        // Exposant 1
        $id1 = DB::table('utilisateurs')->insertGetId([
            'nom_entreprise' => 'Pizza Palace',
            'email' => 'pizza@palace.com',
            'mot_de_passe' => Hash::make('pizza123'),
            'role' => 'entrepreneur_approuve',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $stand1 = DB::table('stands')->insertGetId([
            'nom_stand' => 'Pizza Palace Stand',
            'description' => 'Le meilleur de la pizza artisanale.',
            'utilisateur_id' => $id1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('produits')->insert([
            [
                'nom' => 'Pizza Margherita',
                'description' => 'Classique tomate mozzarella',
                'prix' => 10,
                'image_url' => null,
                'stand_id' => $stand1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Pizza 4 Fromages',
                'description' => 'Un mélange de fromages fondants',
                'prix' => 12,
                'image_url' => null,
                'stand_id' => $stand1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // Exposant 2
        $id2 = DB::table('utilisateurs')->insertGetId([
            'nom_entreprise' => 'Boulangerie du Coin',
            'email' => 'boulangerie@coin.com',
            'mot_de_passe' => Hash::make('pain123'),
            'role' => 'entrepreneur_approuve',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $stand2 = DB::table('stands')->insertGetId([
            'nom_stand' => 'Boulangerie Stand',
            'description' => 'Pains, viennoiseries et douceurs.',
            'utilisateur_id' => $id2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('produits')->insert([
            [
                'nom' => 'Baguette Tradition',
                'description' => 'Baguette croustillante',
                'prix' => 1,
                'image_url' => null,
                'stand_id' => $stand2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Croissant',
                'description' => 'Pur beurre',
                'prix' => 1.2,
                'image_url' => null,
                'stand_id' => $stand2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
