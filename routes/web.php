<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;

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

//Route::get('/', [HomeController::class, 'home'])->name('home');

Route::prefix('customer')->group(function () {
    Route::get('/register', [CustomerController::class, 'registerCustomer'])->name('register.customer');
    Route::post('/store', [CustomerController::class, 'storeCustomer'])->name('store.customer');
    Route::get('/login', [CustomerController::class, 'loginCustomer'])->name('login.customer');
//    Route::post();
});

Route::prefix('service')->group(function () {
    Route::get('/all', [ServiceController::class, 'allServices'])->name('all.services');
});

Route::prefix('order')->group(function () {
    Route::post('/add/{id}', [OrderController::class, 'addOrder'])->name('add.Order');
});

Route::prefix('payment')->group(function (){
    Route::get('/add',[PaymentController::class,'viewPayment']);
    Route::put('/store/{id}',[PaymentController::class,'storePayment'])->name('store.payment');
});







