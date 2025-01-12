<?php

namespace Tests\Feature;

use App\Models\CalendarUsage;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CalendarUsageTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_show_all_calendar_usages(): void
    {
        $calendarUsages = CalendarUsage::factory(3)->create();

        $user = User::factory()->create();

        $response = $this->actingAs($user)->getJson(route('calendarUsage.index'));

        $response->assertOk()
            ->assertJson(['data' => $calendarUsages->toArray()]);
    }

    public function test_can_create_calendar_usage(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->postJson(route('calendarUsage.store'), [
            'name' => 'example',
            'color' => 'red-500',
        ]);

        $response->assertCreated()
            ->assertJson(['data' => [
                'name' => 'example',
                'color' => 'red-500',
            ]]);

        $this->assertDatabaseHas('calendar_usages', [
            'name' => 'example',
            'color' => 'red-500',
        ]);
    }

    public function test_can_update_calendar_usage(): void
    {
        $calendarUsage = CalendarUsage::factory()->create([
            'name' => 'old name',
        ]);

        $user = User::factory()->create();

        $response = $this->actingAs($user)->patchJson(route('calendarUsage.update', [
            'calendarUsage' => $calendarUsage,
        ]), [
            'name' => 'new name',
            'color' => 'red-600',
        ]);

        $response->assertOk()
            ->assertJson(['data' => [
                'name' => 'new name',
                'color' => 'red-600',
            ]]);

        $this->assertDatabaseHas('calendar_usages', [
            'name' => 'new name',
            'color' => 'red-600',
        ]);
    }

    public function test_can_delete_calendar_usage(): void
    {
        $calendarUsage = CalendarUsage::factory()->create();

        $user = User::factory()->create();

        $response = $this->actingAs($user)->deleteJson(route('calendarUsage.destroy', $calendarUsage));

        $response->assertOk();

        $this->assertDatabaseMissing('calendar_usages', $calendarUsage->toArray());
    }
}
