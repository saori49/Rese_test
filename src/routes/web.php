<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ReservationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/login', [AuthController::class, "getLogin"]);
Route::post('/login', [AuthController::class, "postLogin"])->name("postLogin");

Route::get('/register', [AuthController::class, "getRegister"])->name("getLogin");
Route::post('/register', [AuthController::class, "postRegister"])->name("postLogin");

Route::middleware('auth')->group(function () {
    Route::get('/logout', [AuthController::class,'getLogout']);
});

// 飲食店一覧ページ
Route::get('/', [ShopController::class, "getIndex"])->name("getIndex");
// 飲食店詳細ページ
Route::get('/detail/{id}', [ShopController::class, "getDetail"])->name("getDetail");


// マイページ
Route::middleware(['auth'])->group(function () {
    Route::get('/mypage', [UserController::class, 'getMyPage'])->name('getMypage');
    // 他のユーザー情報取得も可能であれば、ここに追加
});

// お気に入り関連
Route::middleware(['auth'])->group(function () {
    Route::get('/favorites', [UserController::class, 'getFavoriteShops'])->name('user.favorites');
    //Route::post('/favorites/add/{shop_id}', [UserController::class, 'addFavoriteShop'])->name('user.favorites.add');
    //Route::post('/favorites/remove/{shop_id}', [UserController::class, 'removeFavoriteShop'])->name('user.favorites.remove');
});

// 予約関連
// 予約フォームを表示するルート
Route::get('/reserve', [ReservationController::class, 'getReservation'])->name('getReserve');

// 予約を処理するルート
Route::post('/reserve/{shop_id}', [ReservationController::class, 'reserve'])->name('reserve');

Route::get('/done',[ReservationController::class, 'getDone']);