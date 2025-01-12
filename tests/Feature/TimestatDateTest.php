<?php

namespace Tests\Feature;

use App\Models\Timestat;
use App\Models\TimestatDate;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TimestatDateTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_create_a_timestat_date(): void
    {
        $timestat = Timestat::factory()->create();

        $user = User::factory()->create();

        $response = $this->actingAs($user)->postJson(route('timestatDate.store'), [
            'date' => '2024-06-20 20:10:10',
            'timestat_id' => $timestat->id,
        ]);

        $response->assertCreated()
            ->assertJson(['data' => [
                'date' => '2024-06-20 20:10:10',
                'timestat_id' => $timestat->id,
            ]]);

        $this->assertDatabaseHas('timestat_dates', [
            'date' => '2024-06-20 20:10:10',
            'timestat_id' => $timestat->id,
        ]);
    }

    public function test_can_update_a_timestat_date(): void
    {
        $timestat = Timestat::factory()->create();

        $timestatDate = TimestatDate::factory()->create([
            'date' => '2024-05-20 20:10:10',
        ]);

        $user = User::factory()->create();

        $response = $this->actingAs($user)->patchJson(route('timestatDate.update', [
            'timestatDate' => $timestatDate,
        ]), [
            'date' => '2024-06-20 22:20:20',
            'timestat_id' => $timestat->id,
        ]);

        $response->assertOk()
            ->assertJson(['data' => [
                'date' => '2024-06-20 22:20:20',
                'timestat_id' => $timestat->id,
            ]]);

        $this->assertDatabaseHas('timestat_dates', [
            'date' => '2024-06-20 22:20:20',
            'timestat_id' => $timestat->id,
        ]);
    }

    public function test_can_delete_a_timestat_date(): void
    {
        $timestatDate = TimestatDate::factory()->create();

        $user = User::factory()->create();

        $response = $this->actingAs($user)->deleteJson(route('timestatDate.destroy', $timestatDate));

        $response->assertOk();

        $this->assertDatabaseMissing('timestat_dates', $timestatDate->toArray());
    }
}
