<?php

namespace App\Http\Controllers;
use App\Models\Favorite;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function toggleFavorite($shopId)
    {
        // ログインユーザーのIDを取得
        $userId = auth()->id();

        // お気に入り登録済みか確認
        $isFavorite = Favorite::where('user_id', $userId)
                                ->where('shop_id', $shopId)
                                ->exists();

        // お気に入り登録のトグル
        if ($isFavorite) {
            // お気に入り登録解除
            Favorite::where('user_id', $userId)
                    ->where('shop_id', $shopId)
                    ->delete();
        } else {
            // お気に入り登録
            Favorite::create([
                'user_id' => $userId,
                'shop_id' => $shopId,
            ]);
        }

        return redirect()->back()->with('message', 'お気に入り登録が更新されました');
    }
}
