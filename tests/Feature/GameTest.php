<?php

namespace Tests\Feature;

use App\Models\Game;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GameTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_show_all_games(): void
    {
        $games = Game::factory(3)->create();

        $response = $this->actingAs(
            User::factory()->create()
        )->getJson(route('game.index'));

        $response->assertOk()
            ->assertJson(['data' => $games->toArray()]);
    }

    public function test_can_create_a_game(): void
    {
        $response = $this->actingAs(
            User::factory()->create()
        )->postJson(route('game.store'), [
            'name' => 'test game',
        ]);

        $response->assertCreated()
            ->assertJson(['data' => [
                'name' => 'test game',
            ]]);

        $this->assertDatabaseHas('games', [
            'name' => 'test game',
        ]);
    }

    public function test_can_update_a_game(): void
    {
        $game = Game::factory()->create([
            'name' => 'game old',
        ]);

        $response = $this->actingAs(
            User::factory()->create()
        )->patchJson(route('game.update', [
            'game' => $game->id,
        ]), [
            'name' => 'new game',
        ]);

        $response->assertOk()
            ->assertJson(['data' => [
                'name' => 'new game',
            ]]);

        $this->assertDatabaseHas('games', [
            'name' => 'new game',
        ]);
    }
}
