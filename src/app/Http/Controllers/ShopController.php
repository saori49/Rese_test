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
        $shop_name = $request->input('shop_name');
        $area = $request->input('area');
        $genre = $request->input('genre');

        $query = Shop::query();

        if ($shop_name && $shop_name != 'shop_name1') {
            $query->where('shop_name', $shop_name);
        }

        if ($area && $area != 'area1') {
            $query->where('area', $area);
        }

        if ($genre && $genre != 'genre1') {
            $query->where('genre', $genre);
        }

        $shops = $query->get();

        if (!isset($shops)) {
            $shops = collect(); 
        }

        return view('index', ['shops' => $shops]);
    }
}
