<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    //
    public function coaches()
    {
        return $this->belongsToMany(Coach::class, 'coach_language');
    }
}
