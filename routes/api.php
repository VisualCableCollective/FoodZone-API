<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('locations', \App\Http\Controllers\Locations\LocationController::class);
Route::prefix('locations/{locationId}/menu')->group(function() {
    Route::get('categories', [\App\Http\Controllers\Locations\Menu\CategoryController::class, 'index']);
});

Route::prefix('seller')->group(function() {
    Route::post('categories', [\App\Http\Controllers\Seller\CategoryController::class, 'store']);
});
