@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/done.css') }}">
@endsection

@section('content')
<div class="done__content">
  <div class="done__content--inner">
    <h1 class="done__txt">ご予約ありがとうございます</h1>
    <div class="form__button">
      <button class="form__button-submit" onclick="location.href='{{ route("getIndex") }}'" type="submit">戻る</button>
    </div>
  </div>
</div>
@endsection
