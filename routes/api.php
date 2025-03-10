<?php

use App\Http\Controllers\Api\ApiAuthController;
use App\Http\Controllers\Api\MovieController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post("register", [ApiAuthController::class, "register"]);
Route::post("login", [ApiAuthController::class, "login"]);

Route::group([
    "middleware" => ["auth:api"]
], function () {

    //Route::get("profile", [ApiAuthController::class, "profile"]);
    Route::get("logout", [ApiAuthController::class, "logout"]);
    Route::get('/movie/{id}', [MovieController::class, 'show']);
});
