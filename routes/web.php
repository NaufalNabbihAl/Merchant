<?php

use App\Http\Controllers\MerchantController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/merchant/register', [MerchantController::class, 'registerForm'])->name('merchant.register');
Route::post('/merchant/register', [MerchantController::class, 'register'])->name('merchant.register');
Route::get('/merchant/login', [MerchantController::class, 'loginForm'])->name('merchant.login');
Route::post('/merchant/login', [MerchantController::class, 'login'])->name('merchant.login');

Route::middleware('auth.merchant')->group(function () {
    Route::get('/merchant/dashboard', [MerchantController::class, 'dashboard'])->name('merchant.dashboard');
    Route::post('/merchant/logout', [MerchantController::class, 'logout'])->name('merchant.logout');
});
