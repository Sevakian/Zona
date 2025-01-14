<?php

use App\Http\Controllers\CalendarController;
use App\Http\Controllers\CalendarDateController;
use App\Http\Controllers\CalendarUsageController;
use App\Http\Controllers\ConsoleController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\TimestatController;
use App\Http\Controllers\TimestatDateController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::group([], function () {
    Route::apiResources([
        'calendar' => CalendarController::class,
        'calendarDate' => CalendarDateController::class,
        'calendarUsage' => CalendarUsageController::class,
        'timestat' => TimestatController::class,
        'timestatDate' => TimestatDateController::class,
        'game' => GameController::class,
        'console' => ConsoleController::class,
    ]);
});
