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
    public function getDetail($id)
    {
        $shop = Shop::findOrFail($id);
        return view('detail', compact('shop'));
    }

}
