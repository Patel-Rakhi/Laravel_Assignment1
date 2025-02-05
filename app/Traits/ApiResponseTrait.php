<?php

namespace App\Traits;

trait ApiResponseTrait
{
    public function successResponse($message, $data = [], $status = 200)
    {
        return response()->json([
            'status' => true,
            'message' => $message,
            'data' => $data,
            
        ], $status);
    }

    public function errorResponse($message, $status = 400)
    {
        return response()->json([
            'status' => false,
            'message' => $message
        ], $status);
    }
}
