<?php

namespace App\Models;

use App\Models\Event;
use Illuminate\Database\Eloquent\Model;
use IndefiniteArticle\IndefiniteArticle;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Type extends Model
{
    use HasFactory;

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function interestedUsers()
    {
        return $this->hasManyThrough(
            User::class,
            Interest::class,
            'type_id',
            'id',
            'id',
            'user_id'
        );
    }

    public function article()
    {
        return IndefiniteArticle::A($this);
    }
}
