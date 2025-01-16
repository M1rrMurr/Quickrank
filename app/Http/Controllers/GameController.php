<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\User;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function index()
    {
        return inertia('Home', ['games' => Game::with('tags')->get()]);
    }

    public function show($name)
    {

        $game = Game::query()->where('name', '=', $name)->with(['coaches.coach.languages'])->firstOrFail();


        return inertia('Game/Show', ['game' => $game]);
    }
}
