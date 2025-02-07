<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoachingSession extends Model
{
    /** @use HasFactory<\Database\Factories\CoachingSessionFactory> */
    use HasFactory;

    public function game()
    {
        return $this->belongsTo(Game::class);
    }

    public function coach()
    {
        return $this->belongsTo(Coach::class);
    }

    public function customer()

    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function sessionApplies()
    {
        return $this->hasMany(SessionApply::class,);
    }
}
