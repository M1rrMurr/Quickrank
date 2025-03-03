<?php

namespace App\Http\Controllers;

use App\Events\SessionApplySent;
use App\Models\CoachingSession;
use App\Models\Game;
use App\Models\SessionApply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class SessionApplyController extends Controller
{
    public function store(Request $request)
    {
        $params = $request->validate(['game_id' => ['required'], 'user_id' => ['required'], 'coaching_session_id' => ['required']]);
        $session = CoachingSession::find($params['coaching_session_id']);
        $price_per_hour = DB::table('games_coaches')->where('game_id', $params['game_id'])->where('user_id', $session->coach->user->id)->value('price_per_hour');
        $params['price_per_hour'] = $price_per_hour;
        $apply =        SessionApply::create($params);
        event(new SessionApplySent($apply->load(['customer', 'game'])));
        return redirect()->back();
    }
}
