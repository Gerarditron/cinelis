<?php

use App\Http\Controllers\CineController;
use App\Http\Controllers\HorarioController;
use App\Http\Controllers\PeliculaController;
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
Route::get('cines-info', CineController::class . '@getCinesInfo');
Route::apiResource('cines', CineController::class);

Route::apiResource('peliculas', PeliculaController::class);

Route::apiResource('horarios', HorarioController::class);
