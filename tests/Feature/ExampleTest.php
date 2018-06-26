<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->get('/');

        $response->assertStatus(200);

        
        $response = $this->json('POST', '/api/incidence-type', ['type' => 'Sally y Molly']);
        print_r($response->content());
        $response
        ->assertStatus(201)
        ->assertJson([
           'type' => 'Sally y Molly',
        ]);

    }
}
