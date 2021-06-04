<?php

namespace App\Models;

use App\Models\Event;
use App\Models\Interest;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    const SEED_COUNT = 10;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function interestTypes()
    {
        return $this->hasManyThrough(
            Type::class,
            Interest::class,
            'user_id', // Foreign key on the interests table...
            'id', // Foreign key on the types table...
            'id', // Local key on the user table...
            'type_id' // Local key on the interests table...
        );
    }


    public function openInvites()
    {
        $invites = $this->invites;
        $events = $this->events;

        return $invites->diff($events)->sortBy('start_date');
    }


    public function events()
    {
        return $this->belongsToMany(Event::class, 'event_user', 'user_id', 'event_id')->withTimestamps();
    }

    public function hostedEvents()
    {
        return $this->belongsToMany(Event::class, 'event_user', 'user_id', 'event_id')->wherePivot('is_host', TRUE)->withTimestamps();
    }

    public function invites()
    {
        return $this->belongsToMany(Event::class, 'invites', 'to_user_id', 'event_id')->withPivot(['accepted_on', 'declined_on'])->withTimestamps();
    }

    public function attendedEvents()
    {
        return $this->belongsToMany(Event::class, 'event_user', 'user_id', 'event_id')->wherePivot('attended', TRUE)->withTimestamps();
    }

    public function createdEvents()
    {
        return $this->hasMany(Event::class, 'creator_id');
    }

    public function getGravatarUrl()
    {
        $hash = md5(strtolower(trim($this->email)));
        return "http://www.gravatar.com/avatar/$hash";
    }

    public function isSuperAdmin(): bool
    {
        return $this->email === 'buddn07@gmail.com';
    }
}
