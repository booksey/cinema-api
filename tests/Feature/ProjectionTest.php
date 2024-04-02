<?php

namespace Tests\Feature;

use App\Models\Film;
use App\Models\Projection;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class ProjectionTest extends TestCase
{
    use RefreshDatabase;

    public function test_projection_index_endpoint(): void
    {
        $projectionCnt = 10;
        $testFilm = Film::factory()->create();
        Projection::factory()->count($projectionCnt)->create([
            'film_id' => $testFilm->id,
        ]);
        $response = $this->getJson('api/projections/');
        $response
            ->assertStatus(200)
            ->assertJsonCount($projectionCnt);
    }

    public function test_projection_show_endpoint(): void
    {
        $testFilm = Film::factory()->create();
        $testProjection = Projection::factory()->create([
            'film_id' => $testFilm->id,
        ]);
        $testProjectionId = $testProjection->id;
        $invalidId = $testProjectionId + 1;

        //test wrong id
        $invalidResponse = $this->getJson('api/projections/' . $invalidId);
        $this->assertNotEquals(200, $invalidResponse->status());

        //test show
        $response = $this->getJson('api/projections/' . $testProjectionId);
        $response
            ->assertStatus(200)
            ->assertJson(
                fn (AssertableJson $json) =>
                $json->where('id', $testProjectionId)
                    ->etc()
            );
    }

    public function test_projection_store_endpoint(): void
    {
        $testFilm = Film::factory()->create();
        $validProjectionTime = Carbon::now()->format('Y-m-d H:i:s');
        $validRequestData = [
            'projection_time' => $validProjectionTime,
            'capacity' => 10,
            'film_id' => $testFilm->id,
        ];
        $invalidRequestData = [
            'projection_time' => 123,
        ];

        //test wrong data
        $invalidResponse = $this->postJson('api/projections/', $invalidRequestData);
        $this->assertNotEquals(201, $invalidResponse->status());

        //test store
        $response = $this->postJson('api/projections/', $validRequestData);
        $response
            ->assertStatus(201)
            ->assertJson(
                fn (AssertableJson $json) =>
                $json->where('projection_time', $validProjectionTime)
                    ->etc()
            );
    }

    public function test_projection_update_endpoint(): void
    {
        $testFilm = Film::factory()->create();
        $validProjectionTime = Carbon::now()->format('Y-m-d H:i:s');
        $originalProjection = Projection::factory()->create([
            'projection_time' => $validProjectionTime,
            'capacity' => 10,
            'film_id' => $testFilm->id,
        ]);
        $originalProjectionId = $originalProjection->id;
        $invalidId = $originalProjection->id + 1;
        $newProjectionTime = Carbon::now()->format('Y-m-d H:i:s');
        $newProjectionData = [
            'projection_time' => $newProjectionTime,
            'capacity' => 10,
            'film_id' => $testFilm->id,
        ];
        $invalidData = [
            'projection_time' => 1213,
        ];

        //test wrong id
        $invalidResponse = $this->putJson('api/projections/' . $invalidId, $newProjectionData);
        $this->assertNotEquals(201, $invalidResponse->status());

        //test wrong data
        $invalidResponse = $this->putJson('api/projections/' . $originalProjectionId, $invalidData);
        $this->assertNotEquals(201, $invalidResponse->status());

        //test update
        $response = $this->putJson('api/projections/' . $originalProjectionId, $newProjectionData);
        $response
            ->assertStatus(201)
            ->assertJson(
                fn (AssertableJson $json) =>
                $json->where('id', $originalProjectionId)
                    ->where('projection_time', $newProjectionTime)
                    ->etc()
            );
    }

    public function test_projection_destroy_endpoint(): void
    {
        $testFilm = Film::factory()->create();
        $projection = Projection::factory()->create([
            'film_id' => $testFilm->id
        ]);
        $projectionId = $projection->id;

        //test wrong id
        $invalidResponse = $this->deleteJson('api/projections/' . $projectionId + 1);
        $this->assertNotEquals(201, $invalidResponse->status());

        //test delete
        $response = $this->deleteJson('api/projections/' . $projectionId);
        $response->assertStatus(204);
    }
}
