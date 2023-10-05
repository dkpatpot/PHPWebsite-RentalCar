<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/', function () {
    return [
        'version' => '1.0.0'
    ];
});


Route::get('/cars/search', [\App\Http\Controllers\Api\CarController::class], 'search');
Route::apiResource('/cars', \App\Http\Controllers\Api\CarController::class);
Route::apiResource('/articles', \App\Http\Controllers\Api\ArticleController::class);
Route::apiResource('/promotions', \App\Http\Controllers\Api\PromotionController::class);
Route::apiResource('/promotion_codes', \App\Http\Controllers\Api\PromotionCodeController::class);
Route::apiResource('/car_offers', \App\Http\Controllers\Api\CarOfferController::class);


Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);
    Route::post('register', [AuthController::class, 'register']);
    Route::post('update', [AuthController::class, 'update']);
    Route::get('allUser', [AuthController::class, 'allUser']);
    Route::post('delete', [AuthController::class, 'delete']);
});

