<?php


use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;





//Route::apiResource('/category',CategoryController::class);
Route::middleware(['auth:sanctum','admin'])->group(function (){
    Route::post('/category',[CategoryController::class,'store']);
    Route::patch('/category/',[CategoryController::class,'update']);
    Route::delete('/category/',[CategoryController::class,'destroy']);
});

Route::get('/category',[CategoryController::class,'index']);
Route::get('/category/{category}',[CategoryController::class,'show']);
