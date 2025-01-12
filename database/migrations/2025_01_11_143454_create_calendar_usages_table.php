<?php

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
        Schema::create('calendar_usages', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name')->unique()->required();
            $table->string('color', 15);
        });
    }

    /**
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('calendar_usages');
    }
};
