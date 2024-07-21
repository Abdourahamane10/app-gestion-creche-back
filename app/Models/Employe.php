<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable; // Import correct pour Authenticatable
use Illuminate\Database\Eloquent\Model;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employe extends Authenticatable implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'employe';
    protected $connection = 'mysql_instanceClient';
    protected $primaryKey = 'idEmploye';

    protected $fillable = [
        'nomEmploye',
        'prenomEmploye',
        'telephoneEmploye',
        'email',
        'adresseEmploye',
        'password',
        'nationalityEmploye',
        'dateNaissanceEmploye',
        'sexeEmploye',
        'dateEmbaucheEmploye',
        'photoEmploye',
        'idFonction',
        'idSection'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'dateEmbaucheEmploye' => 'datetime',
        'dateNaissanceEmploye' => 'date',
        'password' => 'hashed',
    ];

    public function fonction()
    {
        return $this->belongsTo(Fonction::class, 'idFonction', 'idFonction');
    }

    public function section()
    {
        return $this->belongsTo(Section::class, 'idSection', 'idSection');
    }

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
}
