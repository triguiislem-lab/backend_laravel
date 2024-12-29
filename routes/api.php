<?php

use App\Http\Controllers\VolController;
use App\Http\Controllers\ReservationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredUserController;

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
Route::post('/register', [RegisteredUserController::class, 'store']);
