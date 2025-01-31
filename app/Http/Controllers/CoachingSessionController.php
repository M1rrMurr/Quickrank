<?php

namespace App\Http\Controllers;

use App\Models\CoachingSession;
use Illuminate\Http\Request;


class CoachingSessionController extends Controller
{
    public function index(Request $request)
    {

        $sessions = CoachingSession::query()->where('coach_id', '=', $request->coachId)->whereDate('start', $request->date)->orderBy('start')->get();
        return response()->json($sessions);
    }
}
