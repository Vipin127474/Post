<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\LikeController;
Route::get('/', function () {
    return view('welcome');
});

// FOR USER LOGIN AND REGISTRATION
Route::view('register', 'register')->name('register');
Route::post('registerSave', [UserController::class, 'register'])->name('registerSave');

Route::view('login', 'login')->name('login');
// post method is used when we want to save data
Route::post('loginMatch', [UserController::class, 'login'])->name('loginMatch');

Route::get('dashboard', [UserController::class, 'dashboardPage'])->name('dashboard');
Route::get('logout', [UserController::class, 'logout'])->name('logout');
Route::get('dashboard/inner', [UserController::class, 'innerPage'])->name('inner');
Route::get('/delete/{id}', [UserController::class, 'delete'])->name('delete');


// FOR BLOG POST BY USER
Route::resource('/blogs', BlogController::class);
// Route::get('/my-blogs', [BlogController::class, 'myBlogs'])->name('my.blogs');



// FOR LIKES AND COMMENTS

Route::post('/posts/{post}/like', [LikeController::class, 'like'])->name('posts.like');
Route::delete('/posts/{post}/unlike', [LikeController::class, 'unlike'])->name('posts.unlike');
