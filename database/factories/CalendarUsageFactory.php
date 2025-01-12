<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CalendarUsage>
 */
class CalendarUsageFactory extends Factory
{
    /**
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->words(1, true),
            'color' => 'red-500',
        ];
    }
}
