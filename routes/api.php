<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\QrController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


//Public Routes
Route::post("/login",[AuthController::class,"login"]);
Route::post("/register",[AuthController::class,"register"]);

//Protected Routes
Route::group(["middleware"=>["auth:sanctum"]],function(){
    Route::get("/qr",[QrController::class,"view"]);
    Route::post("/logout",[AuthController::class,"logout"]);
});