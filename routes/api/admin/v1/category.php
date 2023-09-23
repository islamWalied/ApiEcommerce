<?php

use App\Http\Controllers\Admin\CategoryController;
use Illuminate\Support\Facades\Route;


//Route::apiResource('/category',CategoryController::class);
Route::middleware(['auth:sanctum','admin'])
    ->prefix('admin')
    ->group(function ()
{
    Route::apiResource('/category',CategoryController::class);
});

