<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $table = 'service';

    protected $fillable = [
        'nomService',
        'pwdService',
        'idInstance',
        'codeService'
    ];

    public function instance()
    {
        return $this->belongsTo(Instance::class, 'idInstance', 'idInstance');
    }
}
