<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function show()
    {
        return inertia('Profile/Show', ['user' => Auth::user()]);
    }

    public function edit()
    {
        return inertia('Profile/Edit', ['user' => Auth::user()]);
    }

    public function update(Request $request)
    {
        $attributes = $request->validate([
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['sometimes', 'nullable', 'min:8', 'confirmed']
        ]);

        if ($attributes['password'] === null) {
            unset($attributes['password']);
        }

        /** @var \App\Models\User $user */
        $user = Auth::user();

        $user->update($attributes);

        return redirect('/');
    }
}
