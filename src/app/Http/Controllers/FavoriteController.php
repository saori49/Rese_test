<?php

namespace App\Http\Controllers;
use App\Models\Favorite;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function getFavorite($shop_id)
    {
        // ログインユーザーのIDを取得
        $user_id = auth()->id();
        
        // お気に入り登録済みか確認
        $isFavorite = Favorite::where('user_id', $user_id)
                                ->where('shop_id', $shop_id)
                                ->exists();

        // お気に入り登録のトグル
        if ($isFavorite) {
            // お気に入り登録解除
            Favorite::where('user_id', $user_id)
                    ->where('shop_id', $shop_id)
                    ->delete();
        } else {
            // お気に入り登録
            Favorite::create([
                'user_id' => $user_id,
                'shop_id' => $shop_id,
            ]);
        }

        return redirect()->back()->with('message', 'お気に入り登録が更新されました');
    }
}
