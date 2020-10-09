@extends('layouts.base')

@section('title', 'パスワード変更')

@section('scripts')
<script src="{{ asset('js/direct.js') }}" defer></script>
@endsection

@section('content')


<h3 class="c-title__page u-text-align__center">パスワード変更</h3>

<div class="p-form__container u-flex u-flex__center">

  <form class="p-form__form--midi js-form" method="POST" action="">
    @csrf
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />

    @if ($errors->any())
      <ul class="u-font__error" role="alert">
        @foreach ($errors->all() as $error)
          <li class="u-list__none">{{ $error }}</li>
        @endforeach
      </ul>
    @endif

    <section class="c-input__line">
      <label class="c-title__label" for="current-password">現在のパスワード</label></br>
      <input id="current-password" type="password" class="c-input__text @error('current-password') is-invalid @enderror" name="current-password" required autocomplete="off">
      @error('current-password')
          <span class="u-font__error" role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror
    </section>


    <section class="c-input__line">
      <label class="c-title__label" for="new-password">新しいパスワード</label></br>
      <input id="new-password" type="password" class="c-input__text @error('new-password') is-invalid @enderror" name="new-password" required autocomplete="off">
      @error('new-password')
          <span class="u-font__error" role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror
    </section>


    <section class="c-input__line">
      <label class="c-title__label" for="confirm">新しいパスワード（確認用）</label></br>
      <input id="confirm" type="password" class="c-input__text" name="new-password_confirmation" required autocomplete="off">
    </section>

    <section class="c-btn">
      <button type="submit" class="c-btn__submit js-submit">
          変更
      </button>
    </section>

  </form>
</div>

@endsection
