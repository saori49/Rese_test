<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;

class ShopController extends Controller
{
    public function getIndex()
    {
        $shops = Shop::all();
        return view('index',compact('shops'));
    }

    // 飲食店詳細表示
    public function getDetail($shop_id)
    {
        $shop = Shop::findOrFail($shop_id);
        $shop_name = $shop->shop_name;

        return view('detail', compact('shop','shop_name'));
    }

    //検索
    public function search(Request $request)
    {
        // リクエストから検索条件を取得
        $area = $request->input('area');
        $genre = $request->input('genre');
        $shop_name = $request->input('shop_name');

        // クエリビルダーを使用して検索条件に基づいてデータを取得
        $shops = Shop::when($area, function ($query, $area) {
                        return $query->where('area', $area);
                    })
                    ->when($genre, function ($query, $genre) {
                        return $query->where('genre', $genre);
                    })
                    ->when($shop_name, function ($query, $shop_name) {
                        return $query->where('name', 'like', "%{$shop_name}%");
                    })
                    
                    ->get();

        // 検索結果をビューに渡す
        return view('index', compact('shops', 'area', 'genre', 'shop_name'));
    }

}
