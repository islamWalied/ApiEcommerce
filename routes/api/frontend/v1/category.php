<?php

use App\Http\Controllers\Frontend\CategoryController;
use Illuminate\Support\Facades\Route;



Route::get('/category',[CategoryController::class,'index']);
Route::get('/category/{category}',[CategoryController::class,'show']);

