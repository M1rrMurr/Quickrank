<?php

namespace App\Http\Controllers;

use App\Models\CoachingSession;
use App\Models\SessionApply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Exceptions;
use Illuminate\Validation\ValidationException;

class DashboardController extends Controller
{
    public function index()
    {

        $sessions = CoachingSession::forCoaches()->get();
        return inertia('Dashboard/DashboardIndex', ['sessions' => $sessions]);
    }
    public function updateSessionApply(Request $request)
    {
        $sessionApply = SessionApply::find($request->id);

        $params = $request->only('status');

        $sessionApply->update($params);

        //also update the coresponidng session
        $sessionApply->coachingSession->update(['user_id' => $sessionApply->user_id, 'game_id' => $sessionApply->game_id, 'price' => $sessionApply->price_per_hour]);
        return redirect()->back();
    }

    public function updateCoachingSessionStatus(Request $request)
    {
        //dd($request->all());
        $coachingSession = CoachingSession::find($request->coachingSessionId);
        $activeSession = $coachingSession->coach->coachingSessions->where('status', 'in_progress')->count();

        if ($request->status === "in_progress" && $activeSession > 0) {

            throw ValidationException::withMessages(['startSession' => 'You have already a session in progress']);
        }

        $coachingSession->update($request->all());
        return redirect()->back();
    }

    public function destroySession(Request $request)
    {
        $coachingSession = CoachingSession::find($request->coachingSessionId);
        $coachingSession->delete();

        return redirect()->back();
    }
}
