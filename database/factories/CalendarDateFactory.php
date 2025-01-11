<?php

namespace Database\Factories;

use App\Models\Calendar;
use App\Models\CalendarUsage;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CalendarDate>
 */
class CalendarDateFactory extends Factory
{
    /**
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'date' => $this->faker->dateTimeThisYear(),
            'title' => $this->faker->words(1, true),
            'text' => $this->faker->text(),
            'calendar_id' => Calendar::all()->count() > 0 ? Calendar::first() : Calendar::factory()->create()->id,
            'calendar_usage_id' => CalendarUsage::all()->count() !== 0 ? CalendarUsage::all()->random()->id : CalendarUsage::factory()->create()->id,
        ];
    }
}
