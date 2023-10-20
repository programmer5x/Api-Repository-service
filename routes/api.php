<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

//--------------------------------------//


// ********* Jwt-Auth
Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function () {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/register', [AuthController::class, 'register']);
});

Route::group([
    'middleware' => 'api',
], function () {
    Route::resource('/category', CategoryController::class);
    Route::resource('/product', ProductController::class);
    Route::apiResource('/card', CardController::class);
});
