<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Stand extends Model
{
//    HasFactory permet de creer des fausse donne pour remplir la base de donnee seeding et les testing
    use HasFactory;
    protected $table = 'stands';
    protected $fillable = [
        'nom_stand', 'description', 'utilisateur_id', 'localisation',
        'telephone', 'horaires', 'statut', 'motif_rejet',
    ];

    // Relations
    public function utilisateur()
    {
        return $this->belongsTo(User::class, 'utilisateur_id');
    }

    // Scopes
    public function scopeEnAttente($query)
    {
        return $query->where('statut', 'en_attente');
    }

    public function scopeApprouves($query)
    {
        return $query->where('statut', 'approuve');
    }

    // Helper Methods
    public function isApprouve()
    {
        return $this->statut === 'approuve';
    }
}
