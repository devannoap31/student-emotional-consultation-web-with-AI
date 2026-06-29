<?php

use Illuminate\Support\Facades\Route;

// ── Public Pages ──
Route::get('/', function () {
    return view('welcome');
})->name('home');

// ── Auth Pages (GET) ──
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

// ── Auth Actions (POST) - stub routes pointing to existing AuthController ──
// These are handled via API (api.php), but we register named routes for form action attributes.
// In production, wire these to your AuthController or middleware-protected routes.
Route::post('/login',    [\App\Http\Controllers\AuthController::class, 'webLogin'])->name('login.post');
Route::post('/register', [\App\Http\Controllers\AuthController::class, 'webRegister'])->name('register.post');
Route::post('/logout',   [\App\Http\Controllers\AuthController::class, 'webLogout'])->name('logout');

// ── Protected App Pages ──
Route::get('/chat', function () {
    return view('chat.index');
})->name('chat');
Route::post('/chat/analyze', [\App\Http\Controllers\ChatController::class, 'analyze'])->name('chat.analyze');

Route::get('/mood', function () {
    return view('mood.index');
})->name('mood');
