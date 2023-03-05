<?php

use App\Http\Controllers\ItemApiController;
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

Route::apiResource('/v1/items', ItemApiController::class);

// Маршрут для получения токена
Route::post('/oauth/token', function (Request $request) {
    $response = \Laravel\Passport\Http\Controllers\AccessTokenController::issueToken($request);
    return $response;
});

// Маршрут для проверки токена
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
