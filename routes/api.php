<?php

use App\Http\Controllers\VolController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();    
});
Route::get("/vols",[VolController::class,"index"]);
Route::post("/vol",[VolController::class,"store"]);
Route::get("/vol/{id}",[VolController::class,"show"]);
Route::delete("/vol/{id}",[VolController::class,"destroy"]);
Route::put("/vol/{id}",[VolController::class,"update"]);
