<?php

use App\Http\Controllers\API\BlogController;
use App\Http\Controllers\API\AuthController;
use Illuminate\Support\Facades\Route;

// Public Routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/posts', [BlogController::class, 'index']);
Route::get('/posts/{id}', [BlogController::class, 'show']);

// Protected Routes (Require Authentication)
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/posts', [BlogController::class, 'store']);
    Route::put('/posts/{id}', [BlogController::class, 'update']);
    Route::delete('/posts/{id}', [BlogController::class, 'destroy']);
    Route::post('/logout', [AuthController::class, 'logout']);
});
