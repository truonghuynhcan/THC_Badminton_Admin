<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Mail;
use App\Mail\GuiEmail;

Route::get('/', [UserController::class, 'login']);
Route::post('/', [UserController::class, 'postLogin']);

Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/login', [UserController::class, 'postLogin']);

Route::get('/register', [UserController::class, 'register'])->name('register');
Route::post('/register', [UserController::class, 'postRegister']);

Route::get('/mail', function () {
    Mail::to('canbame13@gmail.com')->send(new GuiEmail());
});
Route::group(['middleware' => 'auth'], function () {

    Route::get('/dashboard', [PageController::class, 'dashboard'])->name('dashboard');

    Route::get('/procategory', [ProductController::class, 'procategory'])->name('procategory');

    Route::get('/profile', [UserController::class, 'profile'])->name('profile');
    Route::get('/logout', [UserController::class, 'logout'])->name('logout');
    

    Route::get('/all-post', [PostController::class, 'allPost'])->name('allPost');

    Route::get('/add-new-post', [PostController::class, 'addNewPost'])->name('addNewPost');
    Route::post('/add-new-post', [PostController::class, 'addNewPost_insert'])->name('addNewPost_insert');

    Route::get('/update-post/{slug}', [PostController::class, 'updatePost'])->name('updatePost');
    Route::put('/update-post/{id}', [PostController::class, 'updatePost_'])->name('updatePost_');

    Route::delete('/deletePost-post/{id}', [PostController::class, 'deletePost'])->name('deletePost');
    // Route::post('/update-post/{slug}', [PostController::class,'update_']);

});
