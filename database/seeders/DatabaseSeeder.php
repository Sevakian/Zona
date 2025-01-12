<?php

namespace Database\Seeders;

use App\Models\Calendar;
use App\Models\CalendarDate;
use App\Models\CalendarUsage;
use App\Models\Timestat;
use App\Models\TimestatDate;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        CalendarUsage::factory(5)->create();
        Calendar::factory()
            ->has(CalendarDate::factory(10))
            ->create();

        Timestat::factory()
            ->has(TimestatDate::factory(10))
            ->create();
    }
}
