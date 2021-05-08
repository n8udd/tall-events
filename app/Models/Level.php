<?php

namespace App\Models;

use App\Models\Event;
use Illuminate\Database\Eloquent\Model;
use IndefiniteArticle\IndefiniteArticle;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Level extends Model
{
    use HasFactory;

    public function event()
    {
        return $this->belongsToMany(Event::class);
    }
}
