<?php

namespace App\Providers;

use App\Models\CoachingSession;
use App\Models\Message;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::define('view-profile', function (User $authUser, User $currUser) {

            return $authUser->is($currUser);
        });

        Gate::define('showMessage', function ($user, Message $message) {
            return $user->id === $message->receiver_id || $user->id === $message->sender_id;
        });

        Gate::define('isCoach', function ($user) {
            return $user->is_booster;
        });

        Gate::define('editSession', function ($user, CoachingSession $coachingSession) {
            return $coachingSession->coach->user->is($user);
        });
    }
}
