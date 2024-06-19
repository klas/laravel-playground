<?php

use App\Http\Controllers\Api\ActivityController;
use App\Http\Controllers\ExperimentalController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Activity

Route::apiResource('activities', ActivityController::class);
