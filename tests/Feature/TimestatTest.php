<?php

namespace Tests\Feature;

use App\Models\Timestat;
use App\Models\TimestatDate;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TimestatTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_show_all_timestats(): void
    {
        $timestats = Timestat::factory(3)->create();

        $user = User::factory()->create();

        $response = $this->actingAs($user)->getJson(route('timestat.index'));

        $response->assertOk()
            ->assertJson(['data' => $timestats->toArray()]);
    }

    public function test_can_create_a_timestat(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->postJson(route('timestat.store'), [
            'name' => 'test timestat',
        ]);

        $response->assertCreated()
            ->assertJson(['data' => [
                'name' => 'test timestat',
            ]]);

        $this->assertDatabaseHas('timestats', [
            'name' => 'test timestat',
        ]);
    }

    public function test_can_show_a_timestat_with_dates(): void
    {
        $timestat = Timestat::factory()->create();
        TimestatDate::factory(10)->create([
            'timestat_id' => $timestat->id,
        ]);

        $user = User::factory()->create();

        $response = $this->actingAs($user)->getJson(route('timestat.show', $timestat).'?include=timestatDates');

        $response->assertOk()
            ->assertJsonCount(10, 'data.timestat_dates')
            ->assertJson(['data' => $timestat->toArray()]);
    }

    public function test_can_update_a_timestat(): void
    {
        $timestat = Timestat::factory()->create([
            'name' => 'timestat old',
        ]);

        $user = User::factory()->create();

        $response = $this->actingAs($user)->patchJson(route('timestat.update', [
            'timestat' => $timestat,
        ]), [
            'name' => 'new timestat',
        ]);

        $response->assertOk()
            ->assertJson(['data' => [
                'name' => 'new timestat',
            ]]);

        $this->assertDatabaseHas('timestats', [
            'name' => 'new timestat',
        ]);
    }
}
