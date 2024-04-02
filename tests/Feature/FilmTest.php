<?php

namespace Tests\Feature;

use App\Models\Film;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class FilmTest extends TestCase
{
    use RefreshDatabase;

    public function test_film_index_endpoint(): void
    {
        $filmCnt = 10;
        Film::factory()->count($filmCnt)->create();
        $response = $this->getJson('api/films/');
        $response
            ->assertStatus(200)
            ->assertJsonCount($filmCnt);
    }

    public function test_film_show_endpoint(): void
    {
        $testFilm = Film::factory()->create();
        $testFilmId = $testFilm->id;
        $invalidId = $testFilmId + 1;

        //test wrong id
        $invalidResponse = $this->getJson('api/films/' . $invalidId);
        $this->assertNotEquals(200, $invalidResponse->status());

        //test show
        $response = $this->getJson('api/films/' . $testFilmId);
        $response
            ->assertStatus(200)
            ->assertJson(
                fn (AssertableJson $json) =>
                $json->where('id', $testFilmId)
                    ->etc()
            );
    }

    public function test_film_store_endpoint(): void
    {
        $validTitle = 'Test film';
        $validRequestData = [
            'title' => $validTitle,
        ];
        $invalidRequestData = [
            'title' => '123',
        ];

        //test wrong data
        $invalidResponse = $this->postJson('api/films/', $invalidRequestData);
        $this->assertNotEquals(201, $invalidResponse->status());

        //test store
        $response = $this->postJson('api/films/', $validRequestData);
        $response
            ->assertStatus(201)
            ->assertJson(
                fn (AssertableJson $json) =>
                $json->where('title', $validTitle)
                    ->etc()
            );
    }

    public function test_film_update_endpoint(): void
    {
        $originalFilm = Film::factory()->create();
        $originalFilmId = $originalFilm->id;
        $invalidId = $originalFilm->id + 1;
        $newTitle = 'New title';
        $newFilmData = [
            'title' => $newTitle,
        ];
        $invalidData = [
            'title' => '13',
        ];

        //test wrong id
        $invalidResponse = $this->putJson('api/films/' . $invalidId, $newFilmData);
        $this->assertNotEquals(201, $invalidResponse->status());

        //test wrong data
        $invalidResponse = $this->putJson('api/films/' . $originalFilmId, $invalidData);
        $this->assertNotEquals(201, $invalidResponse->status());

        //test update
        $response = $this->putJson('api/films/' . $originalFilmId, $newFilmData);
        $response
            ->assertStatus(201)
            ->assertJson(
                fn (AssertableJson $json) =>
                $json->where('id', $originalFilmId)
                    ->where('title', $newTitle)
                    ->etc()
            );
    }

    public function test_film_destroy_endpoint(): void
    {
        $film = Film::factory()->create();
        $filmId = $film->id;

        //test wrong id
        $invalidResponse = $this->deleteJson('api/films/' . $filmId + 1);
        $this->assertNotEquals(204, $invalidResponse->status());

        //test delete
        $response = $this->deleteJson('api/films/' . $filmId);
        $response->assertStatus(204);
    }
}
