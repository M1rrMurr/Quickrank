<?php

namespace Database\Seeders;

use App\Models\Coach;
use App\Models\CoachingSession;
use App\Models\Game;
use App\Models\Language;
use App\Models\Message;
use App\Models\SessionApply;
use App\Models\Tag;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;



class DatabaseSeeder extends Seeder
{
    public $langsArray = [
        ['name' => 'English', 'iso_code' => 'en',],
        ['name' => 'Hungarian', 'iso_code' => 'hu',],
        ['name' => 'Russian', 'iso_code' => 'ru',],
        ['name' => 'Romanian', 'iso_code' => 'ro',],

    ];

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
        $games = collect($this->gamesArray)->map(fn($game) => Game::create($game));
        $languages = collect($this->langsArray)->map(fn($lang) => Language::create($lang));

        //my dummy users
        $zsoli = User::create(['email' => 'zsoli@citromail.hu', 'password' => 'password', 'username' => 'zsoli', 'is_booster' => true]);
        $zsoli2 = User::create(['email' => 'zsoli2@citromail.hu', 'password' => 'password', 'username' => 'zsoli2', 'is_booster' => true]);

        User::factory(50)->create();
        Message::factory(200)->create();

        $coaches = User::factory(20)->coach()->create();
        $coaches->push($zsoli, $zsoli2);

        foreach ($coaches as $coach) {
            $coachInfo = Coach::factory()->create(['user_id' => $coach->id]);
            $coachInfo->languages()->attach($languages->random(rand(2, 3))->pluck('id')->toArray());
        };

        foreach ($games as $game) {
            $game->tags()->attach($tags->random(rand(1, 3))->pluck('id')->toArray());
        }

        foreach ($coaches as $coach) {
            $gameIds = $games->random(rand(1, 3))->pluck('id')->toArray();
            foreach ($gameIds as $id) {
                $coach->games()->attach($id, ['price_per_hour' => rand(10, 35)]);
            }
            // create OPEN sessions based on existing coaches and their games
            $openSessions = CoachingSession::factory(30)->create(['coach_id' => $coach->coach->id, 'user_id' => null, 'game_id' => null, 'status' => 'open']);

            foreach ($openSessions as $session) {
                SessionApply::factory(rand(2, 5))->forSession($session)->create();
            }
            CoachingSession::factory(100)->create(['game_id' => fn() => $coach->games->random()->id]);
        }
    }
}
