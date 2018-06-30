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

        $response = $this->json('POST', '/api/incidence-type', ['type' => 'Sally y Molly']);
        $response
        ->assertStatus(201)
        ->assertJson([
           'type' => 'Sally y Molly',
        ]);

    }
}
