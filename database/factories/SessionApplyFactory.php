<?php

namespace Database\Factories;

use App\Models\CoachingSession;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SessionApply>
 */
class SessionApplyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [];
    }

    public function forSession($session)
    {
        return $this->state(function (array $attributes) use ($session) {
            $sessionCoach = $session->coach->user;
            $users = User::all();
            $game = fake()->randomElement($sessionCoach->games);
            $price = $game->pivot->price_per_hour;
            $customerIds = $users->except([$sessionCoach->id])->pluck('id');
            return [
                'coaching_session_id' => $session->id,
                'user_id' => fake()->randomElement($customerIds),
                'game_id' => $game->id,
                'status' => 'pending',
                'price_per_hour' => $price,
            ];
        });
    }
}
