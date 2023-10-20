<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
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



// *******Categories
Route::group([
    'middleware' => 'api',
], function () {
    Route::resource('/category', CategoryController::class);
});



// ******** Products
Route::group([
    'middleware' => 'api',
], function () {
    Route::resource('/product', ProductController::class);
});
