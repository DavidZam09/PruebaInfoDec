<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\weatherController;
use App\Http\Controllers\ExchangeRateController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RequestController;

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

Route::get('/weather/{city}', [weatherController::class, 'getWeather']);

Route::get('/exchange-rate', [ExchangeRateController::class, 'getRate']);

Route::get('/countries', [CountryController::class, 'index']);

Route::get('/countries/{id}', [CountryController::class, 'show']);

Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout']);

Route::post('/requests', [RequestController::class, 'store']);
