<?php

use App\Http\Controllers\Frontend\ReviewController;
use Illuminate\Support\Facades\Route;

Route::get('/product/{product}/review',[ReviewController::class,'show']);

