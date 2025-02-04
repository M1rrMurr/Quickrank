<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionApplyController extends Controller
{
    public function store(Request $request)
    {
        dd($request->game_id);
    }
}
