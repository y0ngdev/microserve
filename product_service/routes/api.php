<?php

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
use App\Http\Controllers\ProductController;

Route::prefix('/v1')->group(function () {
    Route::get('/items', [ProductController::class, 'index']);
    Route::post('/items', [ProductController::class, 'store']);
    Route::get('/items/{product:id}', [ProductController::class, 'show']);
    Route::put('/items/{product:id}', [ProductController::class, 'update']);
    Route::delete('/items/{product:id}', [ProductController::class, 'destroy']);
});
