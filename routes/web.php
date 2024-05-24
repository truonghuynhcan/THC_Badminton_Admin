<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [UserController::class,'login'])->name('login');
Route::post('/', [UserController::class,'postLogin']);

Route::get('/register', [UserController::class,'register'])->name('register');
Route::post('/register', [UserController::class,'postRegister']);

Route::get('/logout', [UserController::class,'logout'])->name('logout');


Route::get('/dashboard', [PageController::class,'dashboard'])->name('dashboard');
