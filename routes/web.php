<?php

use App\Http\Controllers\userController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\clientController;
use App\Http\Controllers\projectController;
use App\Http\Controllers\tasktController;

Route::get('/', function () {
    return view('welcome');
});



Auth::routes(['verify' => true]);

Route::group(['middleware'=>['auth','verified'],'as'=>'admin.'],function(){
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::resource('user',userController::class);
    Route::resource('clients',clientController::class);
    Route::resource('projects',projectController::class);
    Route::resource('tasks',tasktController::class);
});


