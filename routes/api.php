<?php

use App\Http\Controllers\CityController;
use App\Http\Controllers\GroupController;
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

Route::apiResource('/group', \App\Http\Controllers\GroupController::class);

Route::apiResource('group.city', \App\Http\Controllers\CityController::class)->only('store');
Route::apiResource('city', \App\Http\Controllers\CityController::class)->except('store');
