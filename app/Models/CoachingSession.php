<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class CoachingSession extends Model
{
    /** @use HasFactory<\Database\Factories\CoachingSessionFactory> */
    use HasFactory;

    protected $fillable = ['user_id', 'game_id', 'status', 'price'];
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

    public function scopeForCoaches(Builder $query)
    {
        return $query->whereHas('coach', fn($q) => $q->where('user_id', Auth::id()))->with(['game', 'customer', 'sessionApplies.game', 'sessionApplies.customer'])->orderBy('start');
    }
}
