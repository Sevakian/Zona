<?php

namespace Database\Factories;

use App\Models\Console;
use App\Models\Game;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Game>
 */
class GameFactory extends Factory
{
    /**
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->words(3, true),
            'series' => $this->faker->words(1, true),
            'genre' => $this->faker->words(1, true),
            'release_date' => $this->faker->date('Y-m-d'),
            'developer' => $this->faker->words(1, true),
            'dimension' => $this->faker->words(1, true),
            'image' => $this->faker->words(1, true),
            'status' => $this->faker->words(1, true),
            'size' => $this->faker->words(1, true),
            'sold_amount' => $this->faker->numberBetween(1000, 500000),
            'text' => $this->faker->text(),
        ];
    }

    public function withRandomConsoles(int $count = 3): GameFactory
    {
        return $this->afterCreating(function (Game $game) use ($count) {
            $consoles = Console::inRandomOrder()->take($count)->get();
            $game->consoles()->attach($consoles);
        });
    }
}
