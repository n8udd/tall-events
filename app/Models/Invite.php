<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class Invite extends Pivot
{
    public $incrementing = true;
    public $table = 'invites';

    protected $guarded = [];

    public $dates = [
        'accepted_on',
        'declined_on'
    ];

    public function fromUser()
    {
        return $this->belongsTo(User::class);
    }
}
