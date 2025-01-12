<?php

use App\Models\Console;
use App\Models\Game;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * @return void
     */
    public function up()
    {
        Schema::create('console_game', function (Blueprint $table) {
            $table->foreignIdFor(Console::class);
            $table->foreignIdFor(Game::class);

            $table->unique(['console_id', 'game_id']);
        });
    }

    /**
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('console_game');
    }
};
