<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use DateTime;
use Tests\TestCase;
use App\Http\Controllers\ExperimentalController;

class ExperimentalApiTest extends TestCase
{

    public function test_say_hello()
    {
        $response = $this->get('/api/experimental/say/hello')
            ->assertStatus(200)
            ->assertJson(
                [
                    'message' => 'hello'
                ]
            );
    }

    public function test_say_howareyou()
    {
        $response = $this->get('/api/experimental/say/howareyou')
            ->assertStatus(200)
            ->assertJson(
                [
                    'message' => 'I\'m fine'
                ]
            );
    }

    public function test_say_invalid()
    {
        $response = $this->get('/api/experimental/say/invalid')
            ->assertStatus(501)
            ->assertJson(
                [
                    'message' => 'Ah, nooooo'
                ]
            );
    }

    public function test_whattimeisit()
    {
        ExperimentalController::$time = '2010-01-28T15:00:00+02:00';

        $response = $this->get('/api/experimental/whattimeisit')
            ->assertStatus(200)
            ->assertJson(
                [
                    'message' => "It's 60 to 4 pm"
                ]
            );

        ExperimentalController::$time = 'now';
    }

    public function test_in()
    {
        $response = $this->get('/api/experimental/in')
            ->assertStatus(200)
            ->assertJson(
                [
                    'city' => (new DateTime())->getTimezone()->getName()
                ]
            );
    }

    public function test_in_post()
    {
        ExperimentalController::$time = '2010-01-28T15:10:00';

        $response = $this->post('/api/experimental/in', ['continent' => 'Europe', 'city' => 'Berlin'])
            ->assertStatus(200)
            ->assertJson(
                [
                    'message' => 'It\'s 50 to 4 pm'
                ]
            );

        ExperimentalController::$time = 'now';
    }
}
