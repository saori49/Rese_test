@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/done.css') }}">
@endsection

@section('content')
<div class="done__content">
  <div class="done__content--inner">
    <h1 class="done__txt">ご予約<br class="sp_br">ありがとうございます</h1>
    <div class="button">
      <a href="{{ route('getIndex') }}" class="button__back">戻る</a>
    </div>
  </div>
</div>
@endsection
