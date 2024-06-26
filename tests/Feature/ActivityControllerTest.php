<?php


use App\Http\Resources\ActivityResource;
use App\Models\Activity;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Response;
use Tests\TestCase;

class ActivityControllerTest extends TestCase
{
    public function testIndexContainsActivities()
    {
        $this->get('/activities')
            ->assertStatus(200)
            ->assertSee('Activities');
    }

}
