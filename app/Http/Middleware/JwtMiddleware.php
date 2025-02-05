<?php

namespace App\Http\Middleware;

use Closure;
use Tymon\JWTAuth\Facades\JWTAuth;
use Exception;
use App\Traits\ApiResponseTrait;

class JwtMiddleware
{
    use ApiResponseTrait;

    public function handle($request, Closure $next)
    {
        try {
            if (!$user = JWTAuth::parseToken()->authenticate()) {
                return $this->errorResponse('User not found', 404);
            }
        } catch (Exception $e) {
            return $this->errorResponse('Unauthorized', 401);
        }

        return $next($request);
    }
}
