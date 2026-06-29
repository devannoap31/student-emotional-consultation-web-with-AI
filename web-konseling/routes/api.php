<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChatController;
use Illuminate\Support\Facades\Route;

// Public routes (no auth required)
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login',    [AuthController::class, 'login']);
Route::post('/demo-login', [AuthController::class, 'demoLogin']);

// Protected routes (requires Sanctum token)
Route::middleware('auth:sanctum')->group(function () {
    // User
    Route::get('/user',    [AuthController::class, 'user']);
    Route::post('/logout', [AuthController::class, 'logout']);

    // Chat
    Route::get('/chat/history',  [ChatController::class, 'history']);
});
