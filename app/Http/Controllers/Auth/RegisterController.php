<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function create()
    {
        return inertia('Auth/Register/Create');
    }

    public function store(Request $request, User $user)
    {
        $credentials = $request->validate([
            'email' => ['email', 'required', 'unique:users,email'],
            'username' => ['required', 'unique:users,username'],
            'password' => [
                //'regex:/[a-z]/',    // At least one lowercase letter
                //'regex:/[A-Z]/',    // At least one uppercase letter
                //'regex:/[0-9]/',    // At least one digit
                //'regex:/[@$!%*?&#]/', // At least one special character
                'required',
                'min:8',
                'max:64',
                'confirmed'
            ]
        ]);

        $credentials['is_booster'] = false;
        $credentials['avatar'] = null;


        $user = $user->create($credentials);

        $request->session()->regenerate();

        Auth::login($user);

        return redirect('/');
    }
}
