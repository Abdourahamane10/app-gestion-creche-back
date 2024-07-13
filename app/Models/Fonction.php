<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fonction extends Model
{
    use HasFactory;

    protected $table = 'fonction';

    protected $fillable = [
        'codeFonction',
        'nomFonction'
    ];

    public function employes()
    {
        return $this->hasMany(Employe::class, 'idFonction', 'idFonction');
    }
}
