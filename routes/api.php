<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\JwtMiddleware;
use App\Http\Controllers\SportController;
use App\Http\Controllers\TrainerController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\PlayerController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login',[AuthController::class,'login']);
Route::post('me', [AuthController::class, 'me']);


Route::group(['prefix' => 'sports', 'middleware' => ['auth','role:admin']], function($router){
    Route::post('',[SportController::class,'create']);
    Route::get('',[SportController::class,'index']);
    Route::get('/{id}',[SportController::class,'show']);
    Route::put('/{id}',[SportController::class,'update']);
    Route::delete('/{id}',[SportController::class,'destroy']);
});

Route::group(['prefix' => 'positions', 'middleware' => ['auth','role:admin']], function($router){
    Route::post('',[PositionController::class,'create']);
    Route::get('',[PositionController::class,'index']);
    Route::get('/{id}',[PositionController::class,'show']);
    Route::put('/{id}',[PositionController::class,'update']);
    Route::delete('/{id}',[PositionController::class,'destroy']);
});

Route::group(['prefix' => 'teams', 'middleware' => ['auth','role:admin']], function($router){
    Route::post('',[TeamController::class,'create']);
    Route::get('',[TeamController::class,'index']);
    Route::get('/{id}',[TeamController::class,'show']);
    Route::put('/{id}',[TeamController::class,'update']);
    Route::delete('/{id}',[TeamController::class,'destroy']);
});

Route::group(['prefix' => 'trainers', 'middleware' => ['auth','role:admin']], function($router){
    Route::post('',[TrainerController::class,'create']);
    Route::get('',[TrainerController::class,'index']);
    Route::get('/{id}',[TrainerController::class,'show']);
    Route::put('/{id}',[TrainerController::class,'update']);
    Route::delete('/{id}',[TrainerController::class,'destroy']);
});

Route::group(['prefix' => 'players', 'middleware' => ['auth','role:admin']], function($router){
    Route::post('',[PlayerController::class,'create']);
    Route::get('',[PlayerController::class,'index']);
    Route::get('/{id}',[PlayerController::class,'show']);
    Route::put('/{id}',[PlayerController::class,'update']);
    Route::delete('/{id}',[PlayerController::class,'destroy']);
});


Route::group(['prefix' => 'players', 'middleware' => ['auth','role:trainer']], function($router){
    Route::get('',[PlayerController::class,'index']);
});

Route::group(['prefix' => 'teams', 'middleware' => ['auth','role:trainer']], function($router){
    Route::get('',[TeamController::class,'index']);
});
