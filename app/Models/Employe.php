<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employe extends Model
{
    use HasFactory;

    protected $table = 'employe';

    protected $fillable = [
        'nomEmploye',
        'prenomEmploye',
        'telephoneEmploye',
        'emailEmploye',
        'adresseEmploye',
        'codeEmploye',
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
        'codeEmploye'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'dateEmbaucheEmploye' => 'datetime',
        'dateNaissanceEmploye' => 'date',
        'codeEmploye' => 'hashed',
    ];

    public function fonction()
    {
        return $this->belongsTo(Fonction::class, 'idFonction', 'idFonction');
    }

    public function section()
    {
        return $this->belongsTo(Section::class, 'idSection', 'idSection');
    }
}
