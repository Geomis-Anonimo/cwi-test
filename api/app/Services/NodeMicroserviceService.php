<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class NodeMicroserviceService
{
    protected $baseUrl;

    public function __construct()
    {
        $this->baseUrl = config('services.node_microservice.url');
    }

    public function getData()
    {
        try {
            $response = Http::get("{$this->baseUrl}/api/microservice");

            if ($response->successful()) {
                return $response->json();
            }

            return ['error' => 'Microservice request failed'];
        } catch (\Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }
}