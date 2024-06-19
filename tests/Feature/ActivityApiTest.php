<?php

namespace Tests\Feature;

use App\Http\Resources\ActivityResource;
use App\Models\Activity;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Response;
use Tests\TestCase;

class ActivityApiTest extends TestCase
{
    public function testIndexReturnsDataInValidFormat()
    {
        $this->get('/api/activities')
            ->assertStatus(200)
            ->assertJsonStructure(
                [
                    'data' => [
                        '*' => [
                            'id',
                            'created_at',
                            'updated_at',
                            'name',
                            'description',
                            'activity_type',
                            'distance',
                            'distance_unit',
                            'start',
                            'finish',
                            'status',
                            'user'
                        ]
                    ]
                ]
            );
    }

    public function testStoreReturnsValidData()
    {
        $data = Activity::factory()->makeOne();
        $responseData = (new ActivityResource($data))->resolve();
        unset($responseData['id'], $responseData['created_at'], $responseData['updated_at']);

        $response = $this->post('/api/activities', $data->toArray());
        //$response->dump();
        $response->assertStatus(201);
        $response->assertJson(
                [
                    'data' => $responseData
                ]
            );
    }

    public function testShowReturnsValidData()
    {
        $activity = Activity::factory()->createOne();
        $responseData = (new ActivityResource($activity))->resolve();

        $response = $this->get("/api/activities/$activity->id");

        $response->assertStatus(Response::HTTP_OK);
        $response->assertJson(
            [
                'data' => $responseData
            ]
        );
    }

    public function testDestroy()
    {
        $activity = Activity::factory()->createOne();
        $response = $this->delete("/api/activities/$activity->id");

        $response->assertStatus(204);
        $this->assertDatabaseMissing('activities', ['id' => $activity->id]);
    }
}
