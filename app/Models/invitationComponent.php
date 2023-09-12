<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class invitationComponent extends Model
{
    use HasFactory;

    protected $table = 'invitations_components';

    protected $fillable = [
        'invitation_id',
        'component_id',
        'order',
    ];

    public function invitation()
    {
        return $this->belongsTo(invitation::class);
    }

    public function component()
    {
        return $this->belongsTo(Component::class);
    }
}
