@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/thanks.css') }}">
@endsection

@section('content')
<div class="thanks__content">
  <div class="thanks__content--inner">
    <h1 class="thanks__txt">会員登録ありがとうございます</h1>
    <div class="form__button">
      <button class="form__button-submit" type="submit">ログインする</button>
    </div>
  </div>
</div>
@endsection
