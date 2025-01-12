<?php

namespace Database\Seeders;

use App\Models\CalendarUsage;
use Illuminate\Database\Seeder;

class CalendarUsageSeeder extends Seeder
{
    public function run(): void
    {
        CalendarUsage::factory()->create();
    }
}
