<?php

namespace Tests\Feature;

use App\Models\Actor;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ActorControllerTest extends TestCase
{
    use RefreshDatabase;

    /** 
     * GET /actors - lekérés teszt
     */
    public function test_index_returns_all_actors()
    {
        Actor::factory()->create(['name' => 'Tom Cruise']);
        Actor::factory()->create(['name' => 'Brad Pitt']);

        $response = $this->getJson('/api/actors');

        $response->assertStatus(200)
            ->assertJsonFragment(['name' => 'Tom Cruise'])
            ->assertJsonFragment(['name' => 'Brad Pitt']);
    }

    /**
     * POST /actors - új actor létrehozása
     */
    public function test_store_creates_new_actor()
    {
        $user = User::factory()->create();
        $token = $user->createToken('TestToken')->plainTextToken;

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->postJson('/api/actors', [
            'name' => 'Leonardo DiCaprio'
        ]);

        $response->assertStatus(201)
            ->assertJsonFragment(['name' => 'Leonardo DiCaprio']);

        $this->assertDatabaseHas('actors', ['name' => 'Leonardo DiCaprio']);
    }

    /**
     * PUT /actors/:id - meglévő actor módosítása
     */
    public function test_update_modifies_existing_actor()
    {
        $actor = Actor::factory()->create(['name' => 'Johnny Depp']);
        $user = User::factory()->create();
        $token = $user->createToken('TestToken')->plainTextToken;

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->putJson("/api/actors/{$actor->id}", [
            'name' => 'Johnny Depp Updated'
        ]);

        $response->assertStatus(200)
            ->assertJsonFragment(['name' => 'Johnny Depp Updated']);

        $this->assertDatabaseHas('actors', ['id' => $actor->id, 'name' => 'Johnny Depp Updated']);
    }

    /**
     * DELETE /actors/:id - actor törlése
     */
    public function test_delete_removes_actor()
    {
        $actor = Actor::factory()->create(['name' => 'Morgan Freeman']);
        $user = User::factory()->create();
        $token = $user->createToken('TestToken')->plainTextToken;

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->deleteJson("/api/actors/{$actor->id}");

        $response->assertStatus(200)
            ->assertJsonFragment(['message' => 'Actor deleted successfully.']);

        $this->assertDatabaseMissing('actors', ['id' => $actor->id]);
    }
}
