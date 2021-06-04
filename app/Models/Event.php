<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\Type;
use App\Models\User;
use App\Models\Level;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use HasFactory, SoftDeletes;

    const SEED_COUNT = 50;

    protected $dates = [
        'start_date',
        'end_date',
        'cancelled_at',
        'deleted_at'
    ];

    protected $guarded = [];

    public function interestedUsers()
    {
        return $this->hasManyThrough(
            User::class,
            Interest::class,
            'type_id',
            'id',
            'type_id',
            'user_id'
        );
    }

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
        return $this->belongsToMany(User::class, 'event_user', 'event_id', 'user_id')->withPivot('is_host');
    }

    public function invitees()
    {
        return $this->belongsToMany(User::class, 'invites', 'event_id', 'to_user_id',)->withPivot(['accepted_on', 'declined_on'])->withTimestamps();
    }

    public function scopeHosts($query)
    {
        // return $this->respondees()->where('is_host', true);
        return $query->where('is_host', true);
    }

    public function schopeAttended($query)
    {
        // return $this->respondees()->where('attended', true);
        return $query->where('attended', true);
    }

    public function creator()
    {
        return $this->belongsTo(User::class);
    }

    public function toggleResponse($user_id)
    {
        $response = $this->respondees()->toggle($user_id);

        return in_array($user_id, $response["attached"]);
    }

    public function toggleCancelled()
    {
        $this->cancelled_at = $this->cancelled_at ? NULL : now();
        $this->save();
    }

    public function toggleDeleted()
    {
        $this->delete();
        return redirect(route('events.index'));
    }

    public function isBeingAttended(?User $user): bool
    {
        if (!$user) {
            return false;
        }

        return $this->respondees()->where('user_id', $user->id)->exists();
    }

    public function getFormattedStartTime()
    {
        return Carbon::parse($this->start_time)->format('H:i');
    }

    public function getFormattedStartDate()
    {
        return Carbon::parse($this->start_date)->format('D jS M');
    }
}
