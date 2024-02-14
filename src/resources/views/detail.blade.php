@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/detail.css') }}">
@endsection

@section('content')
<div class="detail__container">
  <div class="detail__content">
    <div class="left-side__content">
      <div class="shop__introduction">
        <div class="shop-name">
          <a href="{{ route('getIndex') }}" class="back-to-list-button"><span class="arrow"></span></a>
          <h2>{{ $shop->shop_name }}</h2>
        </div>
        <div class="shop__img">
          <img src={{ $shop->image_url }} alt="">
        </div>
        <div class="shop__text">
          <p class="shop__text--tag">#{{ $shop->area }}#{{ $shop->genre }}</p>
          <p class="shop__text--detail">{{ $shop->description }}</p>
        </div>
      </div>
    </div>

    <div class="right-side__content">
      <form method="post" action="{{ route('reserve', ['shop_id' => $shop->id]) }}">
      @csrf
        <div class="book-form">
          <h2 class="book__ttl">予約</h2>
          <div class="book__select">
            <input id="selectDate" type="date" name="selectDate" max="2025-2-28" value="{{ old('selectDate') }}">
            <div class="form__error">
              @error('selectDate')
                {{ $message }}
              @enderror
            </div>

            <select id="selectTime" name="selectTime" >
              <option value=""></option>
              <option value="17:00" @if('17:00' === old('selectTime')) selected @endif>17:00</option>
              <option value="17:30" @if('17:30' === old('selectTime')) selected @endif>17:30</option>
              <option value="18:00" @if('18:00' === old('selectTime')) selected @endif>18:00</option>
              <option value="18:30" @if('18:30' === old('selectTime')) selected @endif>18:30</option>
              <option value="19:00" @if('19:00' === old('selectTime')) selected @endif>19:00</option>
              <option value="19:30" @if('19:30' === old('selectTime')) selected @endif>19:30</option>
              <option value="20:00" @if('20:00' === old('selectTime')) selected @endif>20:00</option>
              <option value="20:30" @if('20:30' === old('selectTime')) selected @endif>20:30</option>
            </select>
            <div class="form__error">
              @error('selectTime')
                {{ $message }}
              @enderror
            </div>

            <select id="selectNumber" name="selectNumber">
              <option value=""></option>
              <option value="1" @if(1 === (int)old('selectNumber')) selected @endif>1 人</option>
              <option value="2" @if(2 === (int)old('selectNumber')) selected @endif>2 人</option>
              <option value="3" @if(3 === (int)old('selectNumber')) selected @endif>3 人</option>
              <option value="4" @if(4 === (int)old('selectNumber')) selected @endif>4 人</option>
              <option value="5" @if(5 === (int)old('selectNumber')) selected @endif>5 人</option>
              <option value="6" @if(6 === (int)old('selectNumber')) selected @endif>6 人</option>
              <option value="7" @if(7 === (int)old('selectNumber')) selected @endif>7 人</option>
              <option value="8" @if(8 === (int)old('selectNumber')) selected @endif>8 人</option>
              <option value="9" @if(9 ===(int) old('selectNumber')) selected @endif>9 人</option>
              <option value="10" @if(10 === (int)old('selectNumber')) selected @endif>10 人</option>
            </select>
            <div class="form__error">
              @error('selectNumber')
                {{ $message }}
              @enderror
            </div>
          </div>

          <table class="book--record__table">
            <tr>
              <th id="shopName">shop</th>
              <td>{{ $shop_name }}</td>
            </tr>
            <tr>
              <th>Date</th>
              <td id="selectedDate"></td>
            </tr>
            <tr>
              <th>Time</th>
              <td id="selectedTime"></td>
            </tr>
            <tr>
              <th>Number</th>
              <td id="selectedNumber"></td>
            </tr>
          </table>
        </div>
        <script>
          window.addEventListener('load', function() {
            document.getElementById('selectedDate').textContent = document.getElementById('selectDate').value;
            document.getElementById('selectedTime').textContent = document.getElementById('selectTime').value;
            document.getElementById('selectedNumber').textContent = document.getElementById('selectNumber').value + ' 人';
          });

          document.getElementById('selectDate').addEventListener('input', function() {
            document.getElementById('selectedDate').textContent = this.value;
          });

          document.getElementById('selectTime').addEventListener('change', function() {
            document.getElementById('selectedTime').textContent = this.value;
          });

          document.getElementById('selectNumber').addEventListener('change', function() {
            document.getElementById('selectedNumber').textContent = this.value + ' 人';
          });
        </script>
        <div class="book--button">
          <button class="form__button-submit" type="submit">予約する</button>
        </div>
      </form>
    </div>

  </div>
</div>

@endsection