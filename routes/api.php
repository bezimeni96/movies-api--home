<?php

use App\Http\Controllers\MoviesController;
use App\Http\Controllers\AuthController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return auth('api')->user();
});

Route::get('/movies', [MoviesController::class, 'index']);
Route::get('/movies/{id}', [MoviesController::class, 'show']);
Route::post('/movies', [MoviesController::class, 'store']);
Route::put('/movies/{id}', [MoviesController::class, 'update']);
Route::delete('/movies/{id}', [MoviesController::class, 'destroy']);

Route::post('/login', [AuthController::class, 'login']);