<?php

namespace Database\Factories;

use App\Models\Timestat;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TimestatDate>
 */
class TimestatDateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'date' => $this->faker->dateTimeThisYear(),
            'text' => $this->faker->words(1, true),
            'timestat_id' => Timestat::all()->count() > 0 ? Timestat::first() : Timestat::factory()->create()->id,
        ];
    }
}
