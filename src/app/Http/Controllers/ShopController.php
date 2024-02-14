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
        $request->validate([
            'name' => 'nullable|string',
            'category' => 'nullable|string',
            'location' => 'nullable|string',
            // 他の検索条件も必要に応じて追加
        ]);

        $query = Shop::query();

        if ($request->filled('name')) {
            $query->where('name', 'LIKE', "%{$request->name}%");
        }

        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        if ($request->filled('location')) {
            $query->where('location', 'LIKE', "%{$request->location}%");
        }

        // 他の条件に基づく検索も同様に追加

        $result = $query;

        return view('index', ['shops' => $result]);
    }

}
