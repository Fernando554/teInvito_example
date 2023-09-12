<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Component extends Model
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

    /**
     * @return array
     */
    public function componentDataOrder()
    {
        $componentDataOrder = [];
        foreach ($this->componentData as  $value) {
            $componentDataOrder[$value->key] = $value->value;
        }
        return $componentDataOrder;
    }
}
