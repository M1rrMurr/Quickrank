<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SessionApply extends Model
{
    /** @use HasFactory<\Database\Factories\SessionApplyFactory> */
    use HasFactory;

    protected $fillable = ['user_id', 'game_id', 'coaching_session_id'];

    public function game()
    {
        return $this->belongsTo(Game::class);
    }

    public function customer()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
