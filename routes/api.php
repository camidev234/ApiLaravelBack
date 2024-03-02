<?php

use App\Http\Controllers\OccupationController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// user routes


Route::get('/user/index', [UserController::class, 'index']);
Route::post('/user/store', [UserController::class, 'store']);
Route::get('/user/show/{user}', [UserController::class, 'show']);
Route::delete('/user/destroy/{user}', [UserController::class, 'destroy']);

//occupation routes

Route::get('/occupation/index', [OccupationController::class, 'index']);
Route::post('/occupation/store', [OccupationController::class, 'store']);
Route::get('/occupation/show/{occupation}', [OccupationController::class, 'show']);
Route::delete('/occupation/destroy/{occupation}', [OccupationController::class, 'destroy']);