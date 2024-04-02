<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;

trait ApiResponseTrait
{
    public function successResponse(string $message = "success", array $data = [], int $status = 200): JsonResponse
    {
        return response()->json([
            "status" => true,
            "message" => $message,
            "data" => $data
        ], $status);
    }

    public function errorResponse(string $message = "error", array $data = [], int $status = 406): JsonResponse
    {
        return response()->json([
            "status" => false,
            "message" => $message,
            "data" => $data
        ], $status);
    }
}
