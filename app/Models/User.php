<?php

namespace App\Models;

use App\Models\Event;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

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

    public function events()
    {
        return $this->belongsToMany(Event::class, 'event_user', 'user_id', 'event_id')->withTimestamps();
    }

    public function hostedEvents()
    {
        return $this->belongsToMany(Event::class, 'event_user', 'user_id', 'event_id')->wherePivot('is_host', TRUE)->withTimestamps();
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
