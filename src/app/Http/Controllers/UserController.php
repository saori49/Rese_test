<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function getMypage()
    {
        $user = Auth::user(); // ログインしているユーザー情報の取得
        return view('mypage', compact('user'));
    }

    // お気に入り飲食店一覧表示
    public function getFavoriteShops()
    {
        $user = Auth::user();
        $favoriteShops = $user->favoriteShops; // リレーションによるお気に入りの飲食店一覧取得
        return view('favorites', compact('favoriteShops'));
    }

    // 飲食店をお気に入りに追加
    public function addFavoriteShop($shop_id)
    {
        $user = Auth::user();
        $user->favoriteShops()->attach($shop_id);
        return redirect()->back()->with('success', 'お気に入りに追加しました');
    }

    // 飲食店のお気に入りから削除
    public function removeFavoriteShop($shop_id)
    {
        $user = Auth::user();
        $user->favoriteShops()->detach($shop_id);
        return redirect()->back()->with('success', 'お気に入りから削除しました');
    }
}
