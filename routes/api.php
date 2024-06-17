<?php

use App\Http\Controllers\Api\ActivityController;
use App\Http\Controllers\ExperimentalController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


// Experimental

Route::get('whattimeisit', [ExperimentalController::class,'datetime']);
Route::post('in/', [ExperimentalController::class,'datetime']);
Route::get('in/', [ExperimentalController::class,'timezone']);
Route::get('/{message}', [ExperimentalController::class,'say']);

// Activity

Route::apiResource('activities', ActivityController::class);
