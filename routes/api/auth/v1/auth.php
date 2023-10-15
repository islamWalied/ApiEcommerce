<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\ProfileController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\VerificationController;
use Illuminate\Support\Facades\Route;


Route::post('/register', [AuthController::class,'register'])->name('register');
Route::post('/login', [AuthController::class,'login'])->name('login');
Route::get('/login/google', [AuthController::class,'redirectToProvider']);
Route::get('/login/google/callback', [AuthController::class,'handleProviderCallback']);


Route::middleware('auth:sanctum')
    ->group(function (){
        Route::get('/profile',[ProfileController::class,'index'])->name('profile.index');
        Route::patch('/profile/update',[ProfileController::class,'update'])->name('profile.update');
//        Route::patch('/profile',[ProfileController::class,'destroy'])->name('profile.destroy');
        Route::get('/logout',[AuthController::class,'logout'])->name('logout');
    });




Route::post('password/email', [ResetPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.reset');
Route::post('email/verify', [VerificationController::class, 'verify'])->name('verification.verify');

