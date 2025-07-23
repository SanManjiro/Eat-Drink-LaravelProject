<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    protected $table = 'utilisateurs';
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'nom_entreprise',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
    protected $fillable = [
        'name', 'email', 'password', 'nom_entreprise', 'role', 'telephone', 'adresse',
    ];

// Relations
    public function stand()
    {
        return $this->hasOne(Stand::class, 'utilisateur_id');
    }

// Helper Methods
    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    public function isEntrepreneurApprouve()
    {
        return $this->role === 'entrepreneur_approuve';
    }

    public function isEntrepreneurEnAttente()
    {
        return $this->role === 'entrepreneur_en_attente';
    }

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
