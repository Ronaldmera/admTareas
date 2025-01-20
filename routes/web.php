<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });


Route::controller(AuthController::class)->group(function(){
    Route::get('/','showLogin')->name('user.login');

});


Route::controller(UserController::class)->group(function(){
    Route::get('user/create','create')->name('user.create');
    Route::post('user/store', 'store')->name('user.store');
});
