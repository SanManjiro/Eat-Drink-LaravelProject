<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Utilisateur extends Model
{
    use HasFactory;
    protected $table = 'utilisateurs';
    protected $fillable = [
        'nom_entreprise', 'email', 'mot_de_passe', 'role'
    ];
    public function stands() {
        return $this->hasMany(Stand::class, 'utilisateur_id');
    }
}
