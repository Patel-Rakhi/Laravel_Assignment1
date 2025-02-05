<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use Illuminate\Http\Request;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\JsonResponse;

class MovieController extends Controller
{
    use ApiResponseTrait;

    public function show($id): JsonResponse
    {
        $movie = Movie::find($id);

        if (!$movie) {
            return $this->errorResponse('Movie not found', 404);
        }

        return $this->successResponse('Movie details retrieved successfully', $movie);
    }
}
