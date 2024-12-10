<?php

namespace App\Services;

class ProfileUpdateService
{
    public function updateUser($user, $attributes): void
    {
        if ($attributes['password'] === null) {
            unset($attributes['password']);
        }
        $user->update($attributes);
    }
}
