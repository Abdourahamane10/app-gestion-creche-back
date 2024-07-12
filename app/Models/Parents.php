<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parents extends Model
{
    use HasFactory;

    protected $table = 'parent';

    protected $fillable = [
        'nomParent',
        'prenomParent',
        'telephoneParent',
        'emailParent',
        'adresseParent',
        'codeParent',
        'nationalityParent',
        'dateNaissanceParent',
        'professionParent',
        'sexeParent',
        'photoParent'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'codeParent'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'dateNaissanceParent' => 'dateTime',
        'codeParent' => 'hashed'
    ];
}
