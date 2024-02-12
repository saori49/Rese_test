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
