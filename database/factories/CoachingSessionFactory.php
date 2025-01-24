<?php

namespace Database\Factories;

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
        return [
            'start' => '2025-01-30 10:00:00',
            'end' => '2025-01-30 11:00:00',
            'coach_id' => 1,
            'user_id' => 1,
            'game_id' => 1
        ];
    }
}
