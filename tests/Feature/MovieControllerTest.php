<?php

namespace Tests\Feature;

use App\Models\Movie;
use App\Models\Director;
use App\Models\Category;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MovieControllerTest extends TestCase
{
    use RefreshDatabase;

    /** GET /movies - lekérés teszt */
    public function test_index_returns_all_movies()
    {
        Movie::factory()->count(2)->create();

        $response = $this->getJson('/api/movies');

        $response->assertStatus(200)
            ->assertJsonCount(2, 'movies'); // feltételezzük, hogy a response 'movies'-t ad vissza
    }

    /** POST /movies - új movie létrehozása */
    public function test_store_creates_new_movie()
    {
        $user = User::factory()->create();
        $token = $user->createToken('TestToken')->plainTextToken;

        $director = Director::factory()->create();
        $category = Category::factory()->create();

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->postJson('/api/movies', [
            'title' => 'Inception',
            'description' => 'A mind-bending thriller',
            'director_id' => $director->id,
            'category_id' => $category->id,
        ]);

        $response->assertStatus(201)
            ->assertJsonFragment(['title' => 'Inception']);

        $this->assertDatabaseHas('movies', ['title' => 'Inception']);
    }

    /** PUT /movies/:id - meglévő movie módosítása */
    public function test_update_modifies_existing_movie()
    {
        $movie = Movie::factory()->create();
        $user = User::factory()->create();
        $token = $user->createToken('TestToken')->plainTextToken;

        $newTitle = 'Updated Movie Title';

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->putJson("/api/movies/{$movie->id}", [
            'title' => $newTitle,
        ]);

        $response->assertStatus(200)
            ->assertJsonFragment(['title' => $newTitle]);

        $this->assertDatabaseHas('movies', ['id' => $movie->id, 'title' => $newTitle]);
    }

    /** DELETE /movies/:id - movie törlése */
    public function test_delete_removes_movie()
    {
        $movie = Movie::factory()->create();
        $user = User::factory()->create();
        $token = $user->createToken('TestToken')->plainTextToken;

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->deleteJson("/api/movies/{$movie->id}");

        $response->assertStatus(200)
            ->assertJsonFragment(['message' => 'Movie deleted successfully.']);

        $this->assertDatabaseMissing('movies', ['id' => $movie->id]);
    }
}
