<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;

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

Route::get('/', function () {
    return view('welcome');
});
Route::group(['prefix'=> 'admin', 'as' => 'admin.'], function () {
    Route::get('/', [LoginController::class,'loginAdmin'])->name('login');
    Route::post('/cekAdmin', [LoginController::class,'cekLoginAdmin'])->name('cekLogin');
    Route::get('/home', [AdminController::class,'home'])->name('home')->middleware('admin');

    //Film
    Route::get('/films', [AdminController::class,'showAllFilm'])->name('showAllFilm')->middleware('admin');
    Route::get('/film/store', [AdminController::class,'storeFilm'])->name('storeFilm')->middleware('admin');
    Route::post('/film/create', [AdminController::class,'createFilm'])->name('createFilm')->middleware('admin');
    Route::get('/films/edit/{film}', [AdminController::class,'editFilm'])->name('editFilm')->middleware('admin');
    Route::post('/film/update', [AdminController::class,'updateFilm'])->name('updateFilm')->middleware('admin');
});

Route::group(['prefix'=> 'user', 'as' => 'user.'], function () {
    Route::get('/', [LoginController::class,'loginUser'])->name('login');
    Route::post('/cek', [LoginController::class,'cekLoginUser'])->name('cekLogin');
    Route::get('/home', [UserController::class,'home'])->name('home')->middleware('user');
    Route::get('/signup', [UserController::class,'signup'])->name('signup');
    Route::post('/signup/create', [UserController::class,'create'])->name('store');
});

