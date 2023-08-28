<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class component extends Model
{
    use HasFactory;

    protected $table = 'componets';

    protected $fillable = [
        'nombre',
        'model_type',
    ];

    public function componentData()
    {
        return $this->hasMany(componentData::class);
    }

}
