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
      <form method="POST" action="{{ route('reserve') }}">
      @csrf
        <div class="right-side__content--top">
          <div class="book">
            <h2 class="book__ttl">予約</h2>
              <div class="book__select">
                <input id="selectDate" type="date" name="selectDate" max="2025-2-28">

                <select id="selectTime" name="selectTime">
                  <option value="---">---</option>
                  <option value="17:00">17:00</option>
                  <option value="17:30">17:30</option>
                  <option value="18:00">18:00</option>
                  <option value="18:30">18:30</option>
                  <option value="19:00">19:00</option>
                  <option value="19:30">19:30</option>
                  <option value="20:00">20:00</option>
                  <option value="20:30">20:30</option>
                </select>

                <select id="numberOfPeople" name="numberOfPeople">
                  <option value="---">---</option>
                  <option value="1">1 人</option>
                  <option value="2">2 人</option>
                  <option value="3">3 人</option>
                  <option value="4">4 人</option>
                  <option value="5">5 人</option>
                  <option value="6">6 人</option>
                  <option value="7">7 人</option>
                  <option value="8">8 人</option>
                  <option value="9">9 人</option>
                  <option value="10">10 人</option>
                </select>
              </div>

              <table class="book--record__table">
                <tr>
                  <th id="shopName">shop</th>
                  <td>{{ $shop->shop_name }}</td>
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
              document.getElementById('selectDate').addEventListener('input', function() {
                  document.getElementById('selectedDate').textContent = this.value;
              });

              document.getElementById('selectTime').addEventListener('change', function() {
                  document.getElementById('selectedTime').textContent = this.value;
              });

              document.getElementById('numberOfPeople').addEventListener('change', function() {
              document.getElementById('selectedNumber').textContent = this.value + ' 人';
              });
            </script>
          </div>
        </div>
        <div class="right-side__content--bottom">
          <div class="book--button">
            <button>予約する</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

@endsection