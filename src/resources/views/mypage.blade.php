@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/mypage.css') }}">
@endsection

@section('content')
<div class="mypage__container">
  <div class="mypage__content">
    <div class="left-side__content">
      <div class="book-record__title">
        <p>予約状況</p>
      </div>
      <div class="book-record__table">
        @isset($reservations)
          @php $reservationCount = 1; @endphp
          @foreach($reservations as $reservation)
            <table>
              <tr>
                <th><i class="fa-regular fa-clock fa-2x"></i></th>
                <th>予約{{ $reservationCount }}</th>
                <th></th>
              </tr>
              <tr>
                <td>shop</td>
                <td>{{ $reservation->shop_name }}</td>
              </tr>
              <tr>
                <td>Date</td>
                <td>{{ $reservation->reservation_date }}</td>
              </tr>
              <tr>
                <td>Time</td>
                <td>{{ $reservation->reservation_time }}</td>
              </tr>
              <tr>
                <td>Number</td>
                <td>{{ $reservation->reservation_number }}人</td>
              </tr>
            </table>
          @php $reservationCount++; @endphp
          @endforeach
        @else
          <p>現在ご予約はありません。</p>
        @endisset
      </div>
    </div>

    <div class="right-side__content">
      @isset($favorites)
        @foreach($favorites as $favorite)
        <div class="favorite__content">
          <p class="favorite__content--username">{{ $favorite->name }}さん</p>
          <p class="favorite__content--text">お気に入り店舗</p>
          <div class="grid">
            <div class="favorite__content--card">
              <div class="card__img">
                <img src="https://coachtech-matter.s3-ap-northeast-1.amazonaws.com/image/sushi.jpg" alt="" />
              </div>
              <div class="card__content">
                <h2 class="card__content--name">仙人</h2>
                <p class="card__content--tag">#東京都#寿司</p>
                <div class="card__content--btn">
                  <button class="card__content--btn-item">詳しくみる</button>
                  <button class="card__content--btn--item--heart"></button>
                </div>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      @else
        <p>No favorites found.</p>
      @endisset
    </div>
  </div>
</div>

@endsection