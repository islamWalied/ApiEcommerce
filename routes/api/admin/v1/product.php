<?php


use App\Http\Controllers\Admin\ProductController;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth:sanctum','admin'])
    ->prefix('admin')
    ->group(function ()
    {
        Route::apiResource('/product',ProductController::class);
    });
