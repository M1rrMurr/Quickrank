<?php

namespace Database\Factories;

use App\Helpers\FactoryHelpers;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Message>
 */
class MessageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        [$firstId, $secondId] = FactoryHelpers::getDistinctIds();

        return [
            'receiver_id' => $firstId,
            'sender_id' => $secondId,
            'message' => fake()->realText(),
        ];
    }
}
