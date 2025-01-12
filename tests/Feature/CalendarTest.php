<?php

namespace Tests\Feature;

use App\Models\Calendar;
use App\Models\CalendarDate;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CalendarTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_show_all_calendars(): void
    {
        $calendars = Calendar::factory(3)->create();

        $user = User::factory()->create();

        $response = $this->actingAs($user)->getJson(route('calendar.index'));

        $response->assertOk()
            ->assertJson(['data' => $calendars->toArray()]);
    }

    public function test_can_create_a_calendar(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->postJson(route('calendar.store'), [
            'name' => 'test calendar',
        ]);

        $response->assertCreated()
            ->assertJson(['data' => [
                'name' => 'test calendar',
            ]]);

        $this->assertDatabaseHas('calendars', [
            'name' => 'test calendar',
        ]);
    }

    public function test_can_show_a_calendar_with_dates(): void
    {
        $calendar = Calendar::factory()->create();

        CalendarDate::factory(10)->create([
            'calendar_id' => $calendar->id,
        ]);

        $user = User::factory()->create();

        $response = $this->actingAs($user)
            ->getJson(route('calendar.show', $calendar).'?include=calendarDates');

        $response->assertOk()
            ->assertJsonCount(10, 'data.calendar_dates')
            ->assertJson(['data' => $calendar->toArray()]);
    }

    public function test_can_update_a_calendar(): void
    {
        $calendar = Calendar::factory()->create([
            'name' => 'calendar old',
        ]);

        $user = User::factory()->create();

        $response = $this->actingAs($user)->patchJson(route('calendar.update', [
            'calendar' => $calendar,
        ]), [
            'name' => 'new calendar',
        ]);

        $response->assertOk()
            ->assertJson(['data' => [
                'name' => 'new calendar',
            ]]);

        $this->assertDatabaseHas('calendars', [
            'name' => 'new calendar',
        ]);
    }
}
