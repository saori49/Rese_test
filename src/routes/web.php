<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\FavoriteController;


//AuthController
Route::get('/login', [AuthController::class, 'getLogin'])->name("getLogin");
Route::post('/login', [AuthController::class, 'postLogin']);
Route::get('/register', [AuthController::class, 'getRegister']);
Route::post('/register', [AuthController::class, 'postRegister']);
Route::middleware('auth')->group(function () {
    Route::get('/logout', [AuthController::class,'logout']);
});
Route::get('/thanks', [AuthController::class, 'showThanks']);

// ShopController
Route::get('/', [ShopController::class, 'getIndex'])->name("getIndex");
Route::get('/detail/{id}', [ShopController::class, 'getDetail'])->name("getDetail");
Route::get('/shops/search', [ShopController::class, 'search'])->name('shops.search');

// UserController
Route::middleware(['auth'])->group(function () {
    Route::get('/mypage', [UserController::class, 'getMypage'])->name('getMypage');
});
Route::get('/user/favorites', [UserController::class, 'showFavorites']);
Route::delete('/user/favorites/delete/{id}', [UserController::class, 'destroyFavorite'])->name('favorite.delete');
Route::get('/user/reservations', [UserController::class, 'showReservations']);
Route::delete('/user/reservations/delete/{id}', [UserController::class, 'destroyReservation'])->name('reservation.delete');

//ReservationController
Route::post('/reserve/{shop_id}', [ReservationController::class, 'reserve'])->name('reserve');
Route::get('/done',[ReservationController::class, 'getDone']);

//FavoriteController
Route::middleware(['auth'])->group(function () {
    Route::post('/favorite/{shop_id}', [FavoriteController::class, 'getFavorite'])->name('getFavorite');
});