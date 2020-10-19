@extends('layouts.base')

@section('title', '新規登録')

@section('scripts')
<script src="{{ secure_asset('js/direct.js') }}" defer></script>
@endsection

@section('content')

<h3 class="c-title--page text-align u-text-align--center">新規登録</h3>

<div class="p-form__container u-flex u-flex--center">
  <form class="p-form__form--midi js-form" method="POST" action="{{ route('register') }}">
      @csrf
      <input type="hidden" name="_token" value="{{ csrf_token() }}" />

      <section class="c-input__line">
        <label class="c-title--label" for="name">{{ __('Name') }}</label></br>
        <input id="name" type="text" class="c-input__text @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
        @error('name')
            <span class="u-font--error" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
      </section>

      <section class="c-input__line">
        <label class="c-title--label" for="email">{{ __('E-Mail Address') }}</label></br>
        <input id="email" type="email" class="c-input__text @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
        @error('email')
            <span class="u-font--error" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
      </section>


      <section class="c-input__line">
        <label class="c-title--label" for="password">{{ __('Password') }}</label></br>
        <input id="password" type="password" class="c-input__text @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
        @error('password')
            <span class="u-font--error" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
      </section>

      <section class="c-input__line">
        <label class="c-title--label" for="password-confirm">{{ __('Confirm Password') }}</label></br>
        <input id="password-confirm" type="password" class="c-input__text" name="password_confirmation" required autocomplete="new-password">
      </section>

      <section class="c-btn">
        <button type="submit" class="c-btn__submit js-submit">
            {{ __('Register') }}
        </button>
      </section>


  </form>

</div>


@endsection
