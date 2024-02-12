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
        $user_id = auth()->id();

        $isFavorite = Favorite::where('user_id', $user_id)
                                ->where('shop_id', $shop_id)
                                ->exists();
        if ($isFavorite) {
            Favorite::where('user_id', $user_id)
                    ->where('shop_id', $shop_id)
                    ->delete();
        } else {
            Favorite::create([
                'user_id' => $user_id,
                'shop_id' => $shop_id,
            ]);
        }

        return redirect()->back()->with('update', 'お気に入り登録が更新されました');
    }
}
