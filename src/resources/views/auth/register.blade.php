@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('content')
<div class="register__content">
  <div class="register-form__content">
    <div class="register-form__heading">
      <p class="register-form__title">Register</p>
    </div>
    <div class="register-form__body">
      <form class="form" action="/register" method="post">
        @csrf
        <div class="form__group">
          <div class="form__group-inner">
            <i class="fa-solid fa-user fa-2x"></i>
            <input class="form__group-input" type="name" name="name" placeholder="Username" value="{{ old('name') }}" />
          </div>
          <div class="form__error">
            @error('name')
            {{ $message }}
            @enderror
          </div>
        </div>
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
          <button class="form__button-submit" type="submit">登録</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection