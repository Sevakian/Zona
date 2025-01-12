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
        Schema::create('consoles', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name')->unique()->required();
            $table->string('image')->nullable();
            $table->string('developer')->nullable();
            $table->date('release_date')->nullable();
            $table->string('generation')->nullable();
            $table->string('status')->nullable();
            $table->string('type')->nullable();
            $table->bigInteger('sold_amount')->nullable();
            $table->string('text')->nullable();
        });
    }

    /**
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('consoles');
    }
};
