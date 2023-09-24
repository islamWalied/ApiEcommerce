<?php

use App\Http\Controllers\Frontend\ProductController;
use Illuminate\Support\Facades\Route;


Route::get('/products',[ProductController::class,'index']);
Route::get('/product/{product}',[ProductController::class,'show']);
Route::get('/product',[ProductController::class,'filterByCategory']);


