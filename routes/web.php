<?php

use App\Http\Controllers\PaymentController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\InstallmentController;

use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', function () {
    return response('$content')
        ->header('Content-Type', '$type')
        ->header('X-Header-One', 'Header Value')
        ->header('X-Header-Two', 'Header Value');
});

Route::get('/user/{user}', function (User $user) {
    return $user;
});

Route::prefix('customer')->group(function () {
    Route::get('/register', [CustomerController::class, 'registerCustomer'])->name('register.customer');
    Route::post('/store', [CustomerController::class, 'storeCustomer'])->name('store.customer');
    Route::get('/login', [CustomerController::class, 'loginCustomer'])->name('login.customer');
});

Route::prefix('service')->group(function () {
    Route::get('/all', [ServiceController::class, 'allServices'])->name('all.services');
});

Route::prefix('order')->group(function () {
    Route::post('/add/{id}', [OrderController::class, 'addOrder'])->name('add.Order');
});

Route::prefix('installment')->group(function (){
    Route::get('/add',[InstallmentController::class,'viewInstallments']);

});
Route::put('/store/{id}',[PaymentController::class,'storePayment'])->name('store.payment');







