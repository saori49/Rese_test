<?php

namespace App\Http\Controllers;
use App\Models\Reservation;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ReservationRequest;


class ReservationController extends Controller
{
  public function reserve(ReservationRequest $request, $shop_id)
  {
    if (!Auth::check()) {
      return redirect('/register')->with('reserve_error','会員登録をしてください');
    }

    $user_id = Auth::id();

    $selectedDate = $request->input('selectDate');
    $selectedTime = $request->input('selectTime');
    $selectedNumber = $request->input('selectNumber');

    $shop = Shop::findOrFail($shop_id);
    $shop_name = $shop->shop_name;

    Reservation::create([
      'user_id' => $user_id,
      'shop_id' => $shop_id,
      'shop_name'=>$shop_name,
      'reservation_date' => $selectedDate,
      'reservation_time' =>$selectedTime,
      'reservation_number' => $selectedNumber,
    ]);

    return redirect('/done');
  }

  public function getDone()
    {
        return view('done');
    }

}
