@extends('layouts.base')

@section('title', 'パスワード変更')

@section('scripts')
<script src="{{ asset('js/direct.js') }}" defer></script>
@endsection

@section('content')

<h3 class="c-title__page u-text-align__center">{{ __('Reset Password') }}</h3>


<div class="p-form__container u-flex u-flex__center">

  <form class="p-form__form--midi js-form" method="POST" action="{{ route('password.update') }}">

    @csrf
    <input type="hidden" name="token" value="{{ $token }}">
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />

    @if ($errors->any())
      <ul class="u-font__error" role="alert">
        @foreach ($errors->all() as $error)
          <li class="u-list__none">{{ $error }}</li>
        @endforeach
      </ul>
    @endif
    <section class="c-input__line">
      <label class="c-title__label" for="email">{{ __('E-Mail Address') }}</label></br>
      <input id="email" type="email" class="c-input__text @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
      @error('email')
          <span class="u-font__error" role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror
    </section>


    <section class="c-input__line">
      <label class="c-title__label" for="password">{{ __('Password') }}</label></br>
      <input id="password" type="password" class="c-input__text @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
      @error('password')
          <span class="u-font__error" role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror
    </section>

    <section class="c-input__line">
      <label class="c-title__label" for="password-confirm">{{ __('Confirm Password') }}</label></br>
      <input id="password-confirm" type="password" class="c-input__text" name="password_confirmation" required autocomplete="new-password">
    </section>

    <section class="c-btn">
      <button type="submit" class="c-btn__medi js-submit">
            {{ __('Reset Password') }}
      </button>
    </section>

  </form>
</div>


@endsection
