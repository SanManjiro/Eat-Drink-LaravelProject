<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stand extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom_stand', 'description', 'utilisateur_id'
    ];
    public function user() {
        return $this->belongsTo(Utilisateur::class, 'utilisateur_id');
    }
    public function produits() {
        return $this->hasMany(Produit::class);
    }
    public function commandes() {
        return $this->hasMany(Commande::class);
    }
}
