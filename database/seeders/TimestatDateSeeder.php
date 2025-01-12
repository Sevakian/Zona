<?php

namespace Database\Seeders;

use App\Models\TimestatDate;
use Illuminate\Database\Seeder;

class TimestatDateSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run()
    {
        TimestatDate::factory()->create();
    }
}
