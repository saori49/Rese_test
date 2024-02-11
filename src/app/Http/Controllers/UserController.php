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

    // ユーザーのお気に入り一覧取得
    public function showFavorites()
    {
        // ログインユーザーのお気に入り一覧を取得
        $user = auth()->user();
        $favorites = Favorite::where('user_id', $user->id)->get();


        //return view('mypage', ['favorites' => $favorites]);
        return $this->getMypage();
    }

    // ユーザーの予約情報取得
    public function showReservations()
    {
        $user = auth()->user();
        $reservations = Reservation::where('user_id', $user->id)->get();

        //return view('mypage', ['reservations' => $reservations]);
        return $this->getMypage();
    }

}
