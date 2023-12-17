<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ReviewController;

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
    return view('welcome', ['title' => 'Rotten Banana']);
});

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/', [LoginController::class, 'loginAdmin'])->name('login');
    Route::post('/cekAdmin', [LoginController::class, 'cekLoginAdmin'])->name('cekLogin');
    Route::get('/home', [AdminController::class, 'home'])->name('home')->middleware('admin');
    Route::post('/logout', [AdminController::class, 'logout'])->name('logout')->middleware('admin');

    //Film
    Route::get('/film/store', [AdminController::class, 'storeFilm'])->name('storeFilm')->middleware('admin');
    Route::post('/film/create', [FilmController::class, 'createFilm'])->name('createFilm')->middleware('admin');
    Route::get('/films/edit/{film}', [AdminController::class, 'editFilm'])->name('editFilm')->middleware('admin');
    Route::post('/film/update', [FilmController::class, 'updateFilm'])->name('updateFilm')->middleware('admin');

    //Go to User
    Route::get('/homeUser', [AdminController::class, 'homeUser'])->name('homeUser')->middleware('admin');

});

Route::group(['prefix' => 'user', 'as' => 'user.'], function () {
    Route::get('/', [LoginController::class, 'loginUser'])->name('login');
    Route::post('/cekUser', [LoginController::class, 'cekLoginUser'])->name('cekLogin');
    Route::get('/home', [UserController::class, 'home'])->name('home')->middleware('user');
    Route::get('/signup', [UserController::class, 'signup'])->name('signup');
    Route::post('/signup/create', [UserController::class, 'create'])->name('store');
    Route::post('/logout', [UserController::class, 'logout'])->name('logout')->middleware('user');

    //Profile
    Route::get('/profile/{user}', [UserController::class, 'profile'])->name('profile')->middleware('user');
    Route::post('/profile/edit/{user}', [UserController::class, 'editProfile'])->name('editProfile')->middleware('user');

    //Film
    Route::get('/films', [UserController::class, 'showAllFilm'])->name('showAllFilm')->middleware('user');
    Route::get('/films/{button}', [UserController::class, 'showAllFilmButton'])->name('showAllFilmButton')->middleware('user');
    Route::post('/getFilm', [FilmController::class, 'getAllFilm'])->name('getAllFilm')->middleware('user');
    Route::get('/filmMain/{film}', [UserController::class, 'filmMain'])->name('filmMain')->middleware('user');
    Route::post('/like/{film}', [FilmController::class, 'likeFilm'])->name('likeFilm')->middleware('user');
    Route::post('/unlike/{film}', [FilmController::class, 'unlikeFilm'])->name('unlikeFilm')->middleware('user');

    // Review
    Route::post('/review/store', [ReviewController::class, 'storeReview'])->name('storeReview')->middleware('user');
    Route::post('/review/update', [ReviewController::class, 'updateReview'])->name('updateReview')->middleware('user');
    Route::post('/review/delete', [ReviewController::class, 'deleteReview'])->name('deleteReview')->middleware('user');
});

