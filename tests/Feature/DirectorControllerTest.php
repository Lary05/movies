<?php

namespace Tests\Feature;

use App\Models\Director;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DirectorControllerTest extends TestCase
{
    use RefreshDatabase;

    /** GET /directors - lekérés teszt */
    public function test_index_returns_all_directors()
    {
        Director::factory()->count(2)->create();

        $response = $this->getJson('/api/directors');

        $response->assertStatus(200)
            ->assertJsonCount(2, 'directors');
    }

    /** POST /directors - új director létrehozása */
    public function test_store_creates_new_director()
    {
        $user = User::factory()->create();
        $token = $user->createToken('TestToken')->plainTextToken;

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->postJson('/api/directors', [
            'name' => 'Christopher Nolan',
            'bio' => 'Famous director',
            'birth_date' => '1970-07-30',
            'gender' => 'férfi',
        ]);

        $response->assertStatus(201)
            ->assertJsonFragment(['name' => 'Christopher Nolan']);

        $this->assertDatabaseHas('directors', ['name' => 'Christopher Nolan']);
    }

    /** PUT /directors/:id - meglévő director módosítása */
    public function test_update_modifies_existing_director()
    {
        $director = Director::factory()->create();
        $user = User::factory()->create();
        $token = $user->createToken('TestToken')->plainTextToken;

        $newName = 'Updated Director';

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->putJson("/api/directors/{$director->id}", [
            'name' => $newName,
        ]);

        $response->assertStatus(200)
            ->assertJsonFragment(['name' => $newName]);

        $this->assertDatabaseHas('directors', ['id' => $director->id, 'name' => $newName]);
    }

    /** DELETE /directors/:id - director törlése */
    public function test_delete_removes_director()
    {
        $director = Director::factory()->create();
        $user = User::factory()->create();
        $token = $user->createToken('TestToken')->plainTextToken;

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->deleteJson("/api/directors/{$director->id}");

        $response->assertStatus(200)
            ->assertJsonFragment(['message' => 'Director deleted successfully.']);

        $this->assertDatabaseMissing('directors', ['id' => $director->id]);
    }
}
