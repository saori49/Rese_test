@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/thanks.css') }}">
@endsection

@section('content')
<div class="thanks__content">
  <div class="thanks__content--inner">
    <h1 class="thanks__txt">会員登録ありがとうございます</h1>
    <div class="button">
      <a href="{{ route('getLogin') }}" class="button__login">ログインする</a>
    </div>
  </div>
</div>
@endsection
