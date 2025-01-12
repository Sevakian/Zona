<?php

namespace Tests\Feature;

use App\Models\Calendar;
use App\Models\CalendarDate;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CalendarDateTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_create_a_calendar_date(): void
    {
        $calendar = Calendar::factory()->create();

        $user = User::factory()->create();

        $response = $this->actingAs($user)->postJson(route('calendarDate.store'), [
            'date' => '2024-06-20',
            'calendar_id' => $calendar->id,
        ]);

        $response->assertCreated()
            ->assertJson(['data' => [
                'date' => '2024-06-20',
                'calendar_id' => $calendar->id,
            ]]);

        $this->assertDatabaseHas('calendar_dates', [
            'date' => '2024-06-20',
            'calendar_id' => $calendar->id,
        ]);
    }

    public function test_can_update_a_calendar_date(): void
    {
        $calendar = Calendar::factory()->create();

        $calendarDate = CalendarDate::factory()->create([
            'date' => '2024-05-20',
        ]);

        $user = User::factory()->create();

        $response = $this->actingAs($user)->patchJson(route('calendarDate.update', [
            'calendarDate' => $calendarDate,
        ]), [
            'date' => '2024-06-20',
            'calendar_id' => $calendar->id,
        ]);

        $response->assertOk()
            ->assertJson(['data' => [
                'date' => '2024-06-20',
                'calendar_id' => $calendar->id,
            ]]);

        $this->assertDatabaseHas('calendar_dates', [
            'date' => '2024-06-20',
            'calendar_id' => $calendar->id,
        ]);
    }

    public function test_can_delete_a_calendar_date(): void
    {
        $calendarDate = CalendarDate::factory()->create();

        $user = User::factory()->create();

        $response = $this->actingAs($user)->deleteJson(route('calendarDate.destroy', $calendarDate));

        $response->assertOk();

        $this->assertDatabaseMissing('calendar_dates', $calendarDate->toArray());
    }
}
