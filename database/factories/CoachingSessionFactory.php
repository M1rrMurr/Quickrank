<?php

namespace Database\Factories;

use App\Models\Game;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CoachingSession>
 */
class CoachingSessionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $start = Carbon::instance(fake()->dateTimeThisMonth())->setMinutes(0);
        $end = Carbon::instance($start)->addHours(1);
        $gameIds = Game::pluck('id')->toArray();
        $userIds = User::pluck('id')->toArray();
        return [
            'start' => $start,
            'end' => $end,
            'coach_id' => 1,
            'user_id' => fake()->randomElement($userIds),
            'game_id' => fake()->randomElement($gameIds)
        ];
    }
}
