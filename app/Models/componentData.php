<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class componentData extends Model
{
    use HasFactory;

    protected $table = 'data_components';

    protected $fillable = [
        'key',
        'value',
        'component_id',
        'invitation_id'
    ];

    public function component()
    {
        return $this->belongsTo(component::class);
    }

    public function invitation()
    {
        return $this->belongsTo(invitation::class);
    }
}
