<?php

use App\Http\Controllers\InxaliController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/

// Fetch particular hotel data

Route::get('whattimeisit', [InxaliController::class,'datetime']);
Route::post('in/', [InxaliController::class,'datetime']);
Route::get('in/', [InxaliController::class,'timezone']);

Route::get('/{message}', [InxaliController::class,'say']);
