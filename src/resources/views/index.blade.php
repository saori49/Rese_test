@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<div class="home__content">
  @if(session('logout'))
    <div class="alert alert-success">
      {{session('logout')}}
    </div>
  @endif
  <div class="grid">
    @foreach($shops as $shop)
    <div class="favorite__content--card">
      <div class="card__img">
        <img src="{{ $shop->image_url }}"" alt="" />
      </div>
      <div class="card__content">
        <h2 class="card__content--name">{{ $shop->shop_name }}</h2>
        <p class="card__content--tag">#{{ $shop->area }}#{{ $shop->genre }}</p>
        <div class="card__content--btn">
          <a href="{{ route('getDetail', $shop->id) }}" class="card__content--btn-item">詳しくみる</a>
          @auth
            <form  method="post" action="{{ route('favorite.toggle', ['shop_id' => $shop->id]) }}">
            @csrf
              <button class="card__content--favorite--btn" type="submit">
                @if ($isFavorite)
                  Remove from Favorites
                @else
                  Add to Favorites
                @endif
              </button>
            </form>
          @endauth
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>
@endsection