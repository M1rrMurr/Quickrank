<?php

namespace App\Http\Controllers;

use App\Models\SessionApply;
use Illuminate\Http\Request;

class SessionApplyController extends Controller
{
    public function store(Request $request)
    {
        $params = $request->validate(['game_id' => ['required'], 'user_id' => ['required'], 'coaching_session_id' => ['required']]);
        SessionApply::create($params);
        return redirect()->back();
    }
}
