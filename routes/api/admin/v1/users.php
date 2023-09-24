<?php


use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth:sanctum','admin'])
    ->prefix('admin')
    ->group(function ()
    {
        Route::apiResource('/users',UserController::class);
    });
