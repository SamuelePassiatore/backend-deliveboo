<?php

use App\Http\Controllers\Api\CartController;
use App\Http\Controllers\Api\RestaurantController;
use App\Http\Controllers\Api\TypeController;
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

Route::apiResource('types', TypeController::class);
Route::apiResource('restaurants', RestaurantController::class);

Route::get('orders/generate', [CartController::class, 'generate']);
Route::post('orders/make/payment', [CartController::class, 'makePayment']);
