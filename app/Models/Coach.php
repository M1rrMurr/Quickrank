<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coach extends Model
{
    /** @use HasFactory<\Database\Factories\BoosterFactory> */
    use HasFactory;
    protected $fillable = [
        'description',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function languages()
    {
        return $this->belongsToMany(Language::class, 'coach_language');
    }
    public function coachingSessions()
    {
        return $this->hasMany(CoachingSession::class);
    }
}
