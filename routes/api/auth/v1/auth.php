<?php

use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\ResetPasswordController;
use Illuminate\Support\Facades\Route;


Route::post('/register', [AuthController::class,'register']);
Route::post('/login', [AuthController::class,'login']);



Route::middleware('auth:sanctum')
    ->group(function (){
        Route::get('/logout',[AuthController::class,'logout']);
    });


Route::post('password/email', [ResetPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.reset');
Route::post('email/verify', [VerificationController::class, 'verify'])->name('verification.verify');

