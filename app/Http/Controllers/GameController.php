<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function index()
    {
        return inertia('Home', ['games' => Game::with('tags')->get()]);
    }

    public function show($name)
    {
        $lang = 'ro';
        $game = Game::query()->where('name', '=', $name)->with([
            'coaches' => function ($query) use ($lang) {
                $query->select('users.id', 'users.avatar', 'users.username')->when($lang, function (Builder $query, $lang) {
                    $query->whereHas('coach.languages', function (Builder $query,) use ($lang) {
                        $query->where('iso_code', '=', $lang);
                    });
                });
            },
            'coaches.coach.languages'
        ])->firstOrFail();
        return inertia('Game/Show', ['game' => $game]);
    }
}
