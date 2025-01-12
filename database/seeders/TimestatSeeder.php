<?php

namespace Database\Seeders;

use App\Models\Timestat;
use Illuminate\Database\Seeder;

class TimestatSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run()
    {
        Timestat::factory()->create();
    }
}
