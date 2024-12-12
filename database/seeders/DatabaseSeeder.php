<?php

namespace Database\Seeders;

use App\Models\Game;
use App\Models\Tag;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;



class DatabaseSeeder extends Seeder
{
    public $gamesArray = [
        [
            'name' => 'League of Legends',
            'image' => 'https://static-cdn.jtvnw.net/ttv-boxart/21779-272x380.jpg'
        ],
        [
            'name' => 'World of Warcraft',
            'image' => 'https://upload.wikimedia.org/wikipedia/en/6/65/World_of_Warcraft.png'
        ],
        [
            'name' => 'Valorant',
            'image' => 'https://upload.wikimedia.org/wikipedia/en/b/ba/Valorant_cover.jpg'
        ],
        [
            'name' => 'World of Tanks',
            'image' => 'https://upload.wikimedia.org/wikipedia/en/thumb/b/b8/World_of_Tanks.jpg/220px-World_of_Tanks.jpg'
        ],
        [
            'name' => "PlayerUnknown's Battlegrounds",
            'image' => 'https://m.media-amazon.com/images/M/MV5BMTU0NTE2NzgxOV5BMl5BanBnXkFtZTgwNjU0NDMyNjM@._V1_FMjpg_UX1000_.jpg'
        ],
    ];

    public $tagsArray = [
        ['name' => 'mmo'],
        ['name' => 'fps'],
        ['name' => 'rpg'],
        ['name' => 'sport'],
        ['name' => 'rts'],
    ];
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $tags = collect($this->tagsArray)->map(fn($tag) => Tag::create($tag));

        $users = User::factory(50)->create();

        $games = collect($this->gamesArray)->map(fn($game) => Game::create($game));

        foreach ($games as $game) {
            $game->tags()->attach($tags->random(rand(1, 3))->pluck('id')->toArray());
        }



        $boosters = $users->filter(fn($user) => $user->isBooster);

        foreach ($boosters as $booster) {
            $booster->games()->attach($games->random(rand(1, 3))->pluck('id')->toArray());
        }

        /* User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]); */
    }
}
