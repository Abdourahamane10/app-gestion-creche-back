<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instance extends Model
{
    use HasFactory;

    protected $table = 'instance';

    protected $fillable = [
        'codeInstance',
        'nomInstance',
    ];

    public function services()
    {
        return $this->hasMany(Service::class, 'idInstance', 'idInstance');
    }
}
