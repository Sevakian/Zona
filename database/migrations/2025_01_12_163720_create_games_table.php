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
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name')->unique()->required();
            $table->string('series')->nullable();
            $table->string('genre')->nullable();
            $table->date('release_date')->nullable();
            $table->string('developer')->nullable();
            $table->string('dimension')->nullable();
            $table->string('image')->nullable();
            $table->string('status')->nullable();
            $table->string('size')->nullable();
            $table->bigInteger('sold_amount')->nullable();
            $table->string('text')->nullable();
        });
    }

    /**
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('games');
    }
};
