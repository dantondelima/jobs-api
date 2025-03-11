<?php

declare(strict_types=1);

namespace App\Traits;

trait ApiResponses
{
    public function ok(string $message, array $data)
    {
        return $this->successResponse($message, $data, 200);
    }

    public function successResponse(string $message, array $data, int $statusCode = 200)
    {
        return response()->json([
            'data' => $data,
            'message' => $message,
            'status' => $statusCode,
        ], $statusCode);
    }

    public function errorResponse(string $message, int $statusCode)
    {
        return response()->json([
            'message' => $message,
            'status' => $statusCode,
        ], $statusCode);
    }
}
