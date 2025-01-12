<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Console>
 */
class ConsoleFactory extends Factory
{
    /**
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->words(1, true),
            'image' => null,
            'developer' => $this->faker->words(1, true),
            'release_date' => $this->faker->date('Y-m-d'),
            'generation' => $this->faker->words(1, true),
            'status' => $this->faker->words(1, true),
            'type' => $this->faker->words(1, true),
            'sold_amount' => $this->faker->numberBetween(1000, 500000),
            'text' => $this->faker->text(),
        ];
    }
}
