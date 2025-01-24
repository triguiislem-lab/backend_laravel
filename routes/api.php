<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\VolController;
use App\Http\Controllers\ReservationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClasseVolController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\CartController;

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout']);
Route::post('/refresh-token', [AuthController::class, 'refreshToken']);

Route::middleware('auth:api')->group(function () {
    Route::get('/me', [AuthController::class, 'me']);
    Route::resource('vol', VolController::class);
    Route::resource('location', LocationController::class);
    Route::resource('classVol', ClasseVolController::class);
    Route::resource('cart', CartController::class);
    Route::resource('reservation', ReservationController::class);
    Route::resource('service', ServiceController::class);
});
