<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Favorite;

class UserController extends Controller
{
    public function getMypage()
    {
        $user = Auth::user(); // ログインしているユーザー情報の取得
        return view('mypage', compact('user'));
    }

    public function toggle($shop_id)
    {
        $user = auth()->user();
        $favorite = Favorite::where('user_id', $user->id)->where('shop_id', $shop_id)->first();

        if ($favorite) {
            // お気に入りが既に存在する場合は削除
            $favorite->delete();
        } else {
            // お気に入りが存在しない場合は追加
            $user->favorites()->create(['shop_id' => $shop_id]);
        }

        return redirect()->back();
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
