<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

//Controla el inicio de sesion
Route::controller(AuthController::class)->group(function(){
    Route::get('/','showLogin')->name('user.login');
    Route::post('/login','login')->name('login');
    Route::post('logout', 'logout')->name('logout');


});
//solo los usuarios logeados pueden ver la pagina principal o dashboard'
Route::middleware('auth')->get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');



//controla los usuarios
Route::controller(UserController::class)->group(function(){
    Route::get('user/create','create')->name('user.create');
    Route::post('user/store', 'store')->name('user.store');
});
