<?php

namespace App\Http\Controllers;

use App\Services\NodeMicroserviceService;

/**
 * @OA\Info(
 *     title="API Users",
 *     version="1.0.0"
 * )
 *
 * @OA\Tag(
 *     name="API",
 *     description="Endpoints gerais da aplicação"
 * )
 */
class ApiController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/health",
     *     tags={"API"},
     *     summary="Verifica se a API está ativa",
     *     @OA\Response(
     *         response=200,
     *         description="Status OK"
     *     )
     * )
     */
    public function health()
    {
        return response()->json(['status' => 'ok']);
    }

    /**
     * @OA\Get(
     *     path="/api/externas",
     *     tags={"API"},
     *     summary="Consulta dados do microserviço Node",
     *     @OA\Response(
     *         response=200,
     *         description="Dados do microserviço retornados com sucesso"
     *     )
     * )
     */
    public function externas(NodeMicroserviceService $microservice)
    {
        $response = $microservice->getData();
        return response()->json($response);
    }
}
