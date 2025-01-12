<?php

namespace Database\Seeders;

use App\Models\Game;
use Illuminate\Database\Seeder;

class GameSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run()
    {
        Game::factory()->create();
    }
}
