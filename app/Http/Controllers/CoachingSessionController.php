<?php

namespace App\Http\Controllers;

use App\Models\CoachingSession;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class CoachingSessionController extends Controller
{
    public function index(Request $request)
    {
        // should use local time of the user
        $now = Carbon::now()->addHour();
        $sessions = CoachingSession::query()->where('coach_id', '=', $request->coachId)->whereDate('start', $request->date)->where('start', '>', $now)->where('status', 'open')->orderBy('start')->get();
        return response()->json($sessions);
    }
}
