<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;

Route::get('/', [UserController::class,'login']);

Route::get('/login', [UserController::class,'login'])->name('login');
Route::post('/', [UserController::class,'postLogin']);

Route::get('/register', [UserController::class,'register'])->name('register');
Route::post('/register', [UserController::class,'postRegister']);


Route::group(['middleware' => 'auth'], function () {

    Route::get('/logout', [UserController::class,'logout'])->name('logout');
       
    Route::get('/dashboard', [PageController::class,'dashboard'])->name('dashboard');
});
