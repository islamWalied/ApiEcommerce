<?php

use App\Http\Controllers\Frontend\CartController;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth:sanctum'])
    ->group(function () {
        Route::apiResource('/cart',CartController::class);
    });

