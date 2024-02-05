<?php

namespace App\Http\Controllers;
use App\Models\Reservation;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
  public function reserve(Request $request, $shop_id)
  {
    $user_id = Auth::id();

    // フォームからのデータを取得
    $selectedDate = $request->input('selectDate');
    $selectedTime = $request->input('selectTime');
    $selectedNumber = $request->input('selectNumber');

    $shop = Shop::findOrFail($shop_id);
    $shop_name = $shop->shop_name;


    // 予約情報をデータベースに格納
    Reservation::create([
      'user_id' => $user_id,
      'shop_id' => $shop_id,
      'shop_name'=>$shop_name,
      'reservation_date' => $selectedDate,
      'reservation_time' =>$selectedTime,
      'reservation_number' => $selectedNumber,
      // その他の予約情報に合わせて追加
    ]);

    // 予約完了後の処理やリダイレクト先などを追加する
  }

  public function getDone()
    {
        return view('done');
    }

}
