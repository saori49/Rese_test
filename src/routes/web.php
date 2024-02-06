<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ReservationController;


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
    // 他のユーザー情報取得も可能であれば、ここに追加
});

Route::post('/favorite/toggle/{shop_id}', [FavoriteController::class, 'toggle'])->name('favorite.toggle');

// お気に入り関連
Route::middleware(['auth'])->group(function () {
    Route::get('/favorites', [UserController::class, 'getFavoriteShops'])->name('user.favorites');
    //Route::post('/favorites/add/{shop_id}', [UserController::class, 'addFavoriteShop'])->name('user.favorites.add');
    //Route::post('/favorites/remove/{shop_id}', [UserController::class, 'removeFavoriteShop'])->name('user.favorites.remove');
});


//ReservationController
Route::get('/reserve', [ReservationController::class, 'getReservation'])->name('getReserve');

Route::post('/reserve/{shop_id}', [ReservationController::class, 'reserve'])->name('reserve');

Route::get('/done',[ReservationController::class, 'getDone']);
Route::post('/done',[ReservationController::class, 'postDone']);