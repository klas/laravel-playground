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

Route::get('whattimeisit', [InxaliController::class,'datetime'])->defaults('time','now')
    ->defaults('timezone','EUROPE/BERLIN');
Route::get('in/', [InxaliController::class,'timezone']);
Route::post('in/{timezone}', [InxaliController::class,'datetime'])->defaults('time','now');
Route::get('/{message}', [InxaliController::class,'say']);
