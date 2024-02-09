<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\FavoriteController;


//AuthController
Route::get('/login', [AuthController::class, 'getLogin'])->name("getLogin");;
Route::post('/login', [AuthController::class, 'postLogin'])->name("postLogin");
Route::get('/register', [AuthController::class, 'getRegister']);
Route::post('/register', [AuthController::class, 'postRegister']);
Route::middleware('auth')->group(function () {
    Route::get('/logout', [AuthController::class,'getLogout']);
});
Route::get('/thanks', [AuthController::class, 'getThanks']);
Route::post('/thanks', [AuthController::class, 'postThanks']);

// ShopController
Route::get('/', [ShopController::class, 'getIndex'])->name("getIndex");
Route::get('/detail/{id}', [ShopController::class, 'getDetail'])->name("getDetail");


// UserController
Route::middleware(['auth'])->group(function () {
    Route::get('/mypage', [UserController::class, 'getMyPage'])->name('getMypage');
});
Route::get('/user/favorites', [UserController::class, 'showFavorites']);
Route::get('/user/reservations', [UserController::class, 'showReservations']);


//ReservationController
Route::get('/reserve', [ReservationController::class, 'getReservation'])->name('getReserve');

Route::post('/reserve/{shop_id}', [ReservationController::class, 'reserve'])->name('reserve');

Route::get('/done',[ReservationController::class, 'getDone']);
Route::post('/done',[ReservationController::class, 'postDone']);

//FavoriteController
Route::middleware(['auth'])->group(function () {
    Route::post('/favorite/{shopId}', [FavoriteController::class, 'toggleFavorite'])->name('favorite.toggle');
});