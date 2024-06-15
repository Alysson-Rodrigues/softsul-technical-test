<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiOrdersController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/orders', ApiOrdersController::class . '@index');
Route::post('/orders', ApiOrdersController::class . '@store');
Route::patch('/orders/{id}', ApiOrdersController::class . '@update');
Route::delete('/orders/{id}', ApiOrdersController::class . '@destroy');
