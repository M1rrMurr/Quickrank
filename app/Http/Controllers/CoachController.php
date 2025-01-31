<?php

namespace App\Http\Controllers;

use App\Models\Coach;
use App\Models\User;
use Illuminate\Http\Request;

class CoachController extends Controller
{
    public function index()
    {
        return inertia('Coach/Index');
    }

    public function show(Coach $coach)
    {
        $coach->load(['coachingSessions', 'user:id,avatar,username,email', 'user.games']);

        return inertia('Coach/CoachShow', ['coach' => $coach]);
    }
}
