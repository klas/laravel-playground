<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class InxaliApiTest extends TestCase
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
        $response = $this->get('/api/hello')
            ->assertStatus(200)
            ->assertJsonStructure(
                [
                    'message' => 'hello'
                ]
            );
    }

    public function test_say_howareyou()
    {
        $response = $this->get('/api/howareyou')
            ->assertStatus(200)
            ->assertJsonStructure(
                [
                    'message' => 'I\'m fine'
                ]
            );
    }

    public function test_say_invalid()
    {
        $response = $this->get('/api/invalid')
            ->assertStatus(501)
            ->assertJsonStructure(
                [
                    'message' => 'Ah, nooooo'
                ]
            );
    }
}
