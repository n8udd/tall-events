<?php

namespace App\Models;

use App\Models\Type;
use App\Models\User;
use App\Models\Level;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use IndefiniteArticle\IndefiniteArticle;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Event extends Model
{
    use HasFactory;

    protected $dates = ['start_dt'];

    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function respondees()
    {
        return $this->belongsToMany(User::class, 'event_user', 'event_id', 'user_id');
    }

    public function hosts()
    {
        return $this->respondees()->where('is_host', true);
    }

    public function attendees()
    {
        return $this->respondees()->where('attended', true);
    }

    public function creator()
    {
        return $this->belongsTo(User::class);
    }

    public function addResponder()
    {
        $this->respondees()->attach(Auth::id());
    }

    public function removeResponder()
    {
        $this->respondees()->detach(Auth::id());
    }

    public function getStartDateAttribute()
    {
        return $this->start_dt->format('D jS M');
    }

    public function getStartTimeAttribute()
    {
        return $this->start_dt->format('H:i');
    }

    public function isBeingAttended(?User $user): bool
    {
        if (!$user) {
            return false;
        }

        return $this->respondees()->where('user_id', $user->id)->exists();
    }
}
