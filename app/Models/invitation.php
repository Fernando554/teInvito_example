<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class invitation extends Model
{
    use HasFactory;

    protected $table = 'invitation';

    protected $fillable = [
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function invitationComponent()
    {
        return $this->hasMany(invitationComponent::class);
    }

    public function componetData()
    {
        return $this->hasMany(componentData::class);
    }
}
