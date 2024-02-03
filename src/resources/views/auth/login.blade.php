@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('content')
<div class="login__content">
  @if(session('success'))
    <div class="alert alert-success">
      {{ session('success') }}
    </div>
  @endif
  <div class="login-form__content">
    <div class="login-form__heading">
      <p class="login-form__title">Login</p>
    </div>
    <div class="login-form__body">
      @if(session('login_error'))
        <div class="alert alert-danger">
          {{session('login_error')}}
        </div>
      @endif

      <form class="form" action="/login" method="post">
        @csrf
        <div class="form__group">
          <div class="form__group-inner">
            <i class="fa-solid fa-envelope  fa-2x"></i>
            <input class="form__group-input" type="email" name="email" placeholder="Email" value="{{ old('email') }}" />
          </div>
          <div class="form__error">
            @error('email')
            {{ $message }}
            @enderror
          </div>
        </div>
        <div class="form__group">
          <div class="form__group-title">
            <i class="fa-solid fa-lock fa-2x"></i>
            <input class="form__group-input" type="password" name="password" placeholder="Password"/>
          </div>
          <div class="form__error">
            @error('password')
            {{ $message }}
            @enderror
          </div>
        </div>
        <div class="form__button">
          <button class="form__button-submit" type="submit">ログイン</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection