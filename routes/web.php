<?php

use App\Http\Controllers\HomeController;
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

// use Illuminate\Support\Facades\Cache;

// Route::get('/cache', function () {
//     return Cache::get('key');
// });


Route::get('/', [HomeController::class, 'home'])->name('home');
