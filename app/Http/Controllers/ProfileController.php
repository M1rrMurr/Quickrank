<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\ProfileUpdateService;


class ProfileController extends Controller
{
    protected $profileUpdateService;
    public function __construct(ProfileUpdateService $profileUpdateService)
    {
        $this->profileUpdateService = $profileUpdateService;
    }

    public function show()
    {
        return inertia('Profile/Show', ['user' => Auth::user()]);
    }

    public function edit()
    {
        return inertia('Profile/Edit', ['user' => Auth::user()]);
    }

    public function update(ProfileUpdateRequest $request)
    {
        $attributes = $request->validated();

        $this->profileUpdateService->updateUser(Auth::user(), $attributes);

        return redirect('/');
    }
}
