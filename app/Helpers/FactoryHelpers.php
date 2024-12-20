<?php

namespace App\Helpers;

use App\Models\User;

class FactoryHelpers
{
    public static function getDistinctIds(): array
    {
        $userIds = User::pluck('id')->toArray();

        if (empty($userIds)) {
            throw new \Exception('No Users found to generate ids');
        }

        $firstId = fake()->randomElement($userIds);
        $secondId = fake()->randomElement($userIds);

        while ($firstId === $secondId) {
            $secondId = fake()->randomElement($userIds);
        }

        return [
            $firstId,
            $secondId
        ];
    }
}
