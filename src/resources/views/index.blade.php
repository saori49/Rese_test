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
          <form method="POST" action="{{ route('favorite.toggle', $shop->id) }}">
            @csrf
            <button type="submit" class="card__content--favorite--btn">
              @if(auth()->check() && optional(auth()->user()->favorites)->contains($shop->id))
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
@endsection