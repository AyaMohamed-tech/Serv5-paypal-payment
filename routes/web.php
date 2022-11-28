<?php

use App\Http\Controllers\BackendController;
use App\Http\Controllers\PayPalController;
use Illuminate\Support\Facades\Route;


//Frontend
Route::get('/',[PayPalController::class,'welcome'])->name('welcome');

Route::get('payment',[PayPalController::class,'payment'])->name('payment');
Route::get('payment/success',[PayPalController::class,'success'])->name('payment.success');
Route::get('payment/cancel',[PayPalController::class,'cancel'])->name('payment.cancel');

//Backend
Route::get('backend/index',[BackendController::class,'index'])->name('backend.index');



