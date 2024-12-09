<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function create()
    {
        return inertia('Auth/Login/Create');
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'email' => ['email', 'required'],
            'password' => ['required']
        ]);
        if (!Auth::attempt($attributes)) {
            throw  ValidationException::withMessages(['validationError' => 'Invalid credentials']);
        }

        $request->session()->regenerate();

        return redirect()->intended();
    }

    public function destroy(Request $request)
    {

        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        redirect('/');
    }
}
