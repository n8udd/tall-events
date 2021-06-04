<?php

namespace App\Models;

use App\Models\Type;
use App\Models\User;
use App\Models\Level;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Interest extends Model
{
    use HasFactory;

    const SEED_COUNT = 50;

    protected $table = 'interests';

    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
