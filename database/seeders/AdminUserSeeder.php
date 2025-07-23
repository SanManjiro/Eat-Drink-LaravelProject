<?php
// database/seeders/AdminUserSeeder.php
//le seeder sers a pre remplir la base de donnE pour effectuer des test
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Stand;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        // Créer l'administrateur
        User::create([
            'nom_entreprise' => 'Eat&Drink Administration',
            'email' => 'admin@eatdrink.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
            'telephone' => '01 23 45 67 89',
            'adresse' => 'Centre événementiel Eat&Drink',

        ]);

        // Créer un entrepreneur en attente
        $entrepreneur = User::create([
            'nom_entreprise' => 'Marie Martin',
            'email' => 'marie@restaurant.com',
            'password' => Hash::make('password'),
            'role' => 'entrepreneur_en_attente',
            'nom_entreprise' => 'Restaurant Marie',
            'telephone' => '01 22 22 22 22',
            'adresse' => '123 Rue de la Gastronomie',

        ]);

        // Créer un stand en attente
        Stand::create([
            'nom_stand' => 'Restaurant Marie',
            'description' => 'Cuisine française traditionnelle avec des produits du terroir',
            'utilisateur_id' => $entrepreneur->id,
            'localisation' => 'Allée A - Stand 12',
            'telephone' => '01 22 22 22 22',
            'horaires' => '10h00 - 22h00',
            'statut' => 'en_attente',
        ]);
    }
}
