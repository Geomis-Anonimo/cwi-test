<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class NodeMicroserviceIntegrationTest extends TestCase
{
    /** @test */
    public function can_fetch_data_from_node_microservice()
    {
        Http::fake([
            'node-microservice:3000/api/microservice' => Http::response([
                'message' => 'Login successful!',
                'data' => [
                    'service' => 'Node Microservice',
                    'version' => '1.0.0',
                    'status' => 'running'
                ]
            ], 200)
        ]);

        $response = $this->getJson('/api/external');

        $response->assertStatus(200)
            ->assertJsonStructure([
                'message',
                'data' => [
                    'service',
                    'version',
                    'status'
                ]
            ]);
    }

    /** @test */
    public function handles_node_microservice_failure_gracefully()
    {
        Http::fake([
            'node-microservice:3000/api/microservice' => Http::response([], 500)
        ]);

        $response = $this->getJson('/api/external');

        $response->assertStatus(502)
            ->assertJson([
                'error' => 'Microservice unavailable'
            ]);
    }

    /** @test */
    public function handles_node_microservice_timeout()
    {
        Http::fake([
            'node-microservice:3000/api/microservice' => Http::response([], 408)
        ]);

        $response = $this->getJson('/api/external');

        $response->assertStatus(504)
            ->assertJson([
                'error' => 'Microservice timeout'
            ]);
    }
}