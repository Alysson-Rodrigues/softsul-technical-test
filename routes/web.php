<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\OrdersController;

Route::resource('/orders', OrdersController::class);

Route::get('/', function () {
    return redirect()->route('orders.index');
});
