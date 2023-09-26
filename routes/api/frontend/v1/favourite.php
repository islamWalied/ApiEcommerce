<?php

use App\Http\Controllers\Frontend\FavouriteController;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth:sanctum'])
    ->group(function () {
        Route::get('/favourite/user/{user}',[FavouriteController::class,'index']);
//        Route::get('/favourite/{favourite}',[FavouriteController::class,'show']);
        Route::post('/favourite',[FavouriteController::class,'store']);
        Route::delete('/favourite/{favourite}',[FavouriteController::class,'destroy']);
    });

