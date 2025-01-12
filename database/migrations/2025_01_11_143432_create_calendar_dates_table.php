<?php

use App\Models\Calendar;
use App\Models\CalendarUsage;
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
        Schema::create('calendar_dates', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->date('date')->required();
            $table->string('title')->nullable();
            $table->string('text')->nullable();
            $table->foreignIdFor(Calendar::class)->required();
            $table->foreignIdFor(CalendarUsage::class)->nullable();
        });
    }

    /**
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('calendar_dates');
    }
};
