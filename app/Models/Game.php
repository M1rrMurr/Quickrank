<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    /** @use HasFactory<\Database\Factories\GameFactory> */
    use HasFactory;



    public function coaches()
    {
        return $this->belongsToMany(User::class, 'games_coaches');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'games_tags');
    }
}
