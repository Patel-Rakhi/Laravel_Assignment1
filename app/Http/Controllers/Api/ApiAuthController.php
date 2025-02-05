<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Services\AuthService;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class ApiAuthController extends Controller
{
    use ApiResponseTrait;
    protected $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function login(LoginRequest $request): JsonResponse
    {
        $credentials = $request->only('email', 'password');

        if (!$token = Auth::guard('api')->attempt($credentials)) {
            return $this->errorResponse('Invalid credentials', 401);
        }

        return $this->successResponse('Login successful', [
            'user' => Auth::guard('api')->user(),
            'token' => $token
        ]);
    }
    public function register(RegisterRequest $request): JsonResponse
    {
        $user = $this->authService->registerUser($request->validated());
        if ($user) {
            return $this->successResponse('User registered successfully', [
                'user' => $user,
            ], 200);
        } else {
            return $this->errorResponse("Something went Wrong", 401);
        }
    }


    // public function logout(): JsonResponse
    // {
    //     auth()->logout();
    //     return $this->successResponse('Logged out successfully');
    // }

    // public function profile(): JsonResponse
    // {
    //     $userdata = auth()->user();
    //     return $this->successResponse('User Profile', $userdata);
    //}
}
