<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Favorite;
use App\Models\Reservation;
use App\Models\Shop;


class UserController extends Controller
{
    public function getMypage()
    {
        $user = Auth::user();
        $reservations = Reservation::where('user_id', $user->id)->get();
        $favorites = Favorite::with('user','shop')->where('user_id', $user->id)->get();

        return view('mypage', ['user' => $user, 'reservations' => $reservations, 'favorites' => $favorites]);
    }

    // お気に入り
    public function showFavorites()
    {
        $user = auth()->user();
        $favorites = Favorite::where('user_id', $user->id)->get();

        return view('mypage', ['favorites' => $favorites]);
    }

    public function destroyFavorite($id)
    {
        $favorite = Favorite::findOrFail($id);
        $favorite->delete();

        return redirect()->route('getMypage')->with('deleteFavorite', 'お気に入りから削除しました。');
    }


    // 予約
    public function showReservations()
    {
        $user = auth()->user();
        $reservations = Reservation::where('user_id', $user->id)->get();

        return view('mypage', ['reservations' => $reservations]);
    }

    public function destroyReservation($id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->delete();

        return redirect()->route('getMypage')->with('deleteReservation', '予約が削除されました。');
    }

}
