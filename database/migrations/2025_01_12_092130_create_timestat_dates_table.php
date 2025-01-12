<?php

use App\Models\Timestat;
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
        Schema::create('timestat_dates', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->dateTime('date')->required();
            $table->string('text')->nullable();
            $table->foreignIdFor(Timestat::class)->required();
        });
    }

    /**
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('timestat_dates');
    }
};
