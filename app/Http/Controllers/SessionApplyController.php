<?php

namespace App\Http\Controllers;

use App\Events\SessionApplySent;
use App\Models\SessionApply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class SessionApplyController extends Controller
{
    public function store(Request $request)
    {
        $params = $request->validate(['game_id' => ['required'], 'user_id' => ['required'], 'coaching_session_id' => ['required']]);
        $apply =        SessionApply::create($params);
        event(new SessionApplySent($apply->load(['customer', 'game'])));
        return redirect()->back();
    }

    public function update(Request $request)
    {
        $sessionApply = SessionApply::find($request->id);
        $params = $request->only('status');
        $sessionApply->update($params);
        $sessions = Auth::user()->coach->coachingSessions()->with(['game', 'sessionApplies.game', 'sessionApplies.customer'])->orderBy('start')->get();

        return Inertia::render('Dashboard/DashboardIndex', ['sessions' => $sessions]);
    }
}
