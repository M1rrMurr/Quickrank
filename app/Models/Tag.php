<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function games()
    {
        return $this->belongsToMany(Game::class, 'games_tags');
    }
}
