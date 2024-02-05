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

}
