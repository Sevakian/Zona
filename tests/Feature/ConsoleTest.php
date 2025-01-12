<?php

namespace Tests\Feature;

use App\Models\Console;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ConsoleTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_show_all_consoles(): void
    {
        $consoles = Console::factory(3)->create();

        $response = $this->actingAs(
            User::factory()->create()
        )->getJson(route('console.index'));

        $response->assertOk()
            ->assertJson(['data' => $consoles->toArray()]);
    }

    public function test_can_create_a_console(): void
    {
        $response = $this->actingAs(
            User::factory()->create()
        )->postJson(route('console.store'), [
            'name' => 'test console',
        ]);

        $response->assertCreated()
            ->assertJson(['data' => [
                'name' => 'test console',
            ]]);

        $this->assertDatabaseHas('consoles', [
            'name' => 'test console',
        ]);
    }

    public function test_can_update_a_console(): void
    {
        $console = Console::factory()->create([
            'name' => 'console old',
        ]);

        $response = $this->actingAs(
            User::factory()->create()
        )->patchJson(route('console.update', [
            'console' => $console->id,
        ]), [
            'name' => 'new console',
        ]);

        $response->assertOk()
            ->assertJson(['data' => [
                'name' => 'new console',
            ]]);

        $this->assertDatabaseHas('consoles', [
            'name' => 'new console',
        ]);
    }
}
