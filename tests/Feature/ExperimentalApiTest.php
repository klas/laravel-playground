<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use DateTime;
use Tests\TestCase;
use App\Http\Controllers\ExperimentalController;

class ExperimentalApiTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }


    public function test_say_hello()
    {
        $response = $this->get('/api/say/hello')
            ->assertStatus(200)
            ->assertJson(
                [
                    'message' => 'hello'
                ]
            );
    }

    public function test_say_howareyou()
    {
        $response = $this->get('/api/say/howareyou')
            ->assertStatus(200)
            ->assertJson(
                [
                    'message' => 'I\'m fine'
                ]
            );
    }

    public function test_say_invalid()
    {
        $response = $this->get('/api/say/invalid')
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

        $response = $this->get('/api/whattimeisit')
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
        $response = $this->get('/api/in')
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

        $response = $this->post('/api/in', ['continent' => 'Europe', 'city' => 'Berlin'])
            ->assertStatus(200)
            ->assertJson(
                [
                    'message' => 'It\'s 50 to 4 pm'
                ]
            );

        ExperimentalController::$time = 'now';
    }
}
