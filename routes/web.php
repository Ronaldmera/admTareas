<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;
use App\Models\Task;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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
    Route::get('user/create','create')->name('user.create');//crea usuario
    Route::post('user/store', 'store')->name('user.store');//guarda el usuario el bd
    Route::get('user/{id}/edit','edit')->name('user.edit');//edita el usuario
    Route::put('user/{id}','update')->name('user.update');//actualiza el usuario y guarda en bd
    Route::delete('user/{id}','destroy')->name('user.destroy');//elimina el usuario
});

Route::controller(TaskController::class)->group(function(){
    Route::get('tasks', 'index')->name('task.index');
    Route::get('task/create', 'create')->name('task.create');
    Route::post('task/store', 'store')->name('task.store');
    Route::delete('task/{id}', 'destroy')->name('task.destroy');
    Route::get('/task/{id}', 'show')->name('task.show');
    Route::get('task/{id}/edit','edit')->name('task.edit');
    Route::put('task/{id}','update')->name('task.update');
});








