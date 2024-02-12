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
        @if(session('deleteReservation'))
          <div class="todo__alert--success">
            {{ session('deleteReservation') }}
          </div>
        @endif

        @php $reservationCount = 1; @endphp
        @foreach($reservations as $reservation)
          <table>
            <tr>
              <th><i class="fa-regular fa-clock fa-2x"></i></th>
              <th>予約{{ $reservationCount }}</th>
              <th>
                <form class="delete-form" action="{{ route('reservation.delete', ['id' => $reservation->id]) }}" method="POST">
                  @method('DELETE')
                  @csrf
                  <button class="delete--btn" type="submit"><i class="fa-regular fa-circle-xmark fa-2x"></i></button>
                </form>
              </th>
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
              <td>{{ \Carbon\Carbon::parse($reservation->reservation_time)->format('H:i') }}</td>
            </tr>
            <tr>
              <td>Number</td>
              <td>{{ $reservation->reservation_number }}人</td>
            </tr>
          </table>
        @php $reservationCount++; @endphp
        @endforeach
      </div>
    </div>

    <div class="right-side__content">
      <p class="favorite__content--username">{{ $user->name }}さん</p>
      <p class="favorite__content--text">お気に入り店舗</p>
      <div class="favorite__content">
        <div class="grid">
          @if(session('deleteFavorite'))
          <div class="todo__alert--success">
            {{ session('deleteFavorite') }}
          </div>
          @endif

          @foreach($favorites as $favorite)
            <div class="favorite__content--card">
              <div class="card__img">
                <img src="{{ $favorite->shop->image_url }}"  />
              </div>
              <div class="card__content">
                <h2 class="card__content--name">{{ $favorite->shop->shop_name }}</h2>
                <p class="card__content--tag">#{{ $favorite->shop->area }}#{{ $favorite->shop->genre }}</p>
                <div class="card__content--btn">
                  <a href="{{ route('getDetail', $favorite->shop->id) }}" class="card__content--btn-item">詳しくみる</a>
                  <form class="delete-form" action="{{ route('favorite.delete', ['id' => $favorite->id]) }}" method="POST">
                  @method('DELETE')
                  @csrf
                  <button class="card__content--favorite--btn" type="submit"><i class="fa-solid fa-heart fa-2x"></i></button>
                </form>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</div>

@endsection