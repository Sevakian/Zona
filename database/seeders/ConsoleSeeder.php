<?php

namespace Database\Seeders;

use App\Models\Console;
use Illuminate\Database\Seeder;

class ConsoleSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run()
    {
        Console::factory()->create();
    }
}
