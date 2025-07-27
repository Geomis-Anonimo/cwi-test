<?php

namespace App\Http\Controllers;

use App\Services\NodeMicroserviceService;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function health()
    {
        return response()->json(['status' => 'ok']);
    }

    public function externas(NodeMicroserviceService $microservice)
    {
        $response = $microservice->getData();
        return response()->json($response);
    }
}