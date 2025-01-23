<?php

use App\Http\Controllers\VolController;
use App\Http\Controllers\ReservationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ClasseVolController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\CartController;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();    
});
Route::get("/vols",[VolController::class,"index"]);
Route::post("/vol",[VolController::class,"store"]);
Route::get("/vol/{id}",[VolController::class,"show"]);
Route::delete("/vol/{id}",[VolController::class,"destroy"]);
Route::put("/vol/{id}",[VolController::class,"update"]);


Route::get("/reservations",[ReservationController::class,"index"]);
Route::post("/reservation",[ReservationController::class,"store"]);
Route::get("/reservation/{id}",[ReservationController::class,"show"]);
Route::delete("/reservation/{id}",[ReservationController::class,"destroy"]);
Route::put("/reservation/{id}",[ReservationController::class,"update"]);
Route::middleware('api')->group(function () {
    Route::resource('service', ServiceController::class);
    });
    Route::middleware('api')->group(function () {
        Route::resource('Vol', VolController::class);
        });
        Route::middleware('api')->group(function () {
            Route::resource('location', LocationController::class);
            });
            Route::middleware('api')->group(function () {
                Route::resource('classVol', ClasseVolController::class);
                });
                Route::middleware('api')->group(function () {
                    Route::resource('cart', CartController::class);
                    });



Route::post('/register', [RegisteredUserController::class, 'store']);

Route::middleware(['web'])->group(function () {
    Route::post('/login', [AuthenticatedSessionController::class, 'store']);
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy']);
});