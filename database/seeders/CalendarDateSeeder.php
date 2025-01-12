<?php

namespace Database\Seeders;

use App\Models\CalendarDate;
use Illuminate\Database\Seeder;

class CalendarDateSeeder extends Seeder
{
    public function run(): void
    {
        CalendarDate::factory()->create();
    }
}
