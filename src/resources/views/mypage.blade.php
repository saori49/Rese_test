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
      @if(count($favorites) > 0)
      <div class="favorite__content">
        <p class="favorite__content--username">{{ $favorites[0]->user->name }}さん</p>
        <p class="favorite__content--text">お気に入り店舗</p>

        <div class="grid">
          @foreach($favorites as $favorite)
            <div class="favorite__content--card">
              <div class="card__img">
                <img src="{{ $favorite->shop->image_url }}"  />
              </div>
              <div class="card__content">
                <h2 class="card__content--name">{{ $favorite->shop->shop_name }}</h2>
                <p class="card__content--tag">#{{ $favorite->shop->area }}#{{ $favorite->shop->genre }}</p>
                <div class="card__content--btn">
                  <a href="{{ route('getDetail', $favorite->id) }}" class="card__content--btn-item">詳しくみる</a>
                  <form method="POST" action="{{ route('getFavorite', $favorite->id) }}">
                    @csrf
                    <button type="submit" class="card__content--favorite--btn">
                      @if(auth()->check() && optional(auth()->user()->favorites)->contains($favorite->id))
                        お気に入り解除
                      @else
                          お気に入り登録
                      @endif
                    </button>
                  </form>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </div>
      @endif
    </div>
  </div>
</div>

@endsection