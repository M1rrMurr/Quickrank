<?php

namespace App\Http\Controllers;

use App\Models\CoachingSession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $sessions = Auth::user()->coach->coachingSessions()->with(['game', 'sessionApplies.game', 'sessionApplies.customer'])->orderBy('start')->get();

        return inertia('Dashboard/DashboardIndex', ['sessions' => $sessions]);
    }
}
