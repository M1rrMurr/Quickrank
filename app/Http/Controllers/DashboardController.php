<?php

namespace App\Http\Controllers;

use App\Models\CoachingSession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function create()
    {
        $sessions = Auth::user()->coach->coachingSessions;

        dd($sessions);
        return inertia('Dashboard/DashboardCreate', ['sessions' => $sessions]);
    }
}
