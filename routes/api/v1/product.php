<?php


use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;





//Route::apiResource('/category',CategoryController::class);
Route::middleware(['auth:sanctum','admin'])->group(function (){
    Route::post('/product',[ProductController::class,'store']);
    Route::patch('/product/',[ProductController::class,'update']);
    Route::delete('/product/',[ProductController::class,'destroy']);
});

Route::get('/product',[ProductController::class,'index']);
Route::get('/product/{product}',[ProductController::class,'show']);
