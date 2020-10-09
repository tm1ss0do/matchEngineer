@extends('layouts.base')

@section('title', 'パスワードリセット')

@section('scripts')
<script src="{{ secure_asset('js/direct.js') }}" defer></script>
@endsection

@section('content')

<h3 class="c-title__page u-text-align__center">{{ __('Reset Password') }}</h3>

<p class="u-font__sub u-text-align__center">
  パスワードリセット用のリンクを送信します。</br>
  ご登録中のメールアドレスをご入力ください。
</p>
<div class="p-form__container u-flex u-flex__center">

  <form class="p-form__form--midi js-form" method="POST" action="{{ route('password.email') }}">
    @csrf
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />

    <section class="c-input__line">
      <label class="c-title__label" for="email">{{ __('E-Mail Address') }}</label></br>
      <input id="email" type="email" class="c-input__text @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
      @error('email')
          <span class="u-font__error" role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror
    </section>

    <section class="c-btn">
      <button type="submit" class="c-btn__submit js-submit">
          送信
      </button>
    </section>

  </form>


</div>

@endsection
