<?php

namespace App\Http\Controllers;

use App\Models\CoachingSession;
use App\Models\SessionApply;
use Illuminate\Http\Request;

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

    public function closeCoachingSession(Request $request)
    {
        CoachingSession::find($request->coachingSessionId)->update(['status' => 'closed']);
        return redirect()->back();
    }

    public function destroySession(Request $request)
    {
        $coachingSession = CoachingSession::find($request->coachingSessionId);
        $coachingSession->delete();

        return redirect()->back();
    }
}
