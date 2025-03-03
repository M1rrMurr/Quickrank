<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SessionApply extends Model
{
    /** @use HasFactory<\Database\Factories\SessionApplyFactory> */
    use HasFactory;

    protected $fillable = ['user_id', 'price_per_hour', 'game_id', 'coaching_session_id', 'status'];

    public function game()
    {
        return $this->belongsTo(Game::class);
    }

    public function customer()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function coachingSession()
    {
        return $this->belongsTo(CoachingSession::class);
    }
}
