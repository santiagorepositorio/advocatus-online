<?php

use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;

Route::get('{course}/checkout', [PaymentController::class, 'checkout'])->name('checkout');
Route::get('{course}/pay', [PaymentController::class, 'pay'])->name('pay');