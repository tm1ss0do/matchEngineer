@extends('layouts.base')

@section('title', 'パスワード変更')

@section('content')
<!-- ユーザーのプロフィール表示画面 -->


<h3 class="c-title__page u-text-align__center">パスワード変更</h3>

<div class="p-form__container u-flex u-flex__center">
  <form class="p-form__form--midi" method="POST" action="">
    @csrf

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
      <button type="submit" class="c-btn__submit">
          変更
      </button>
    </section>

    <!-- <div class="">
      <label for="current">
        現在のパスワード
      </label>
      <div>
        <input id="current" type="password" class="" name="current-password" autocomplete="off">
      </div>
    </div> -->
    <!-- <div class="">
      <label for="password">
        新しいパスワード
      </label>
      <div>
        <input id="password" type="password" class="" name="new-password" autocomplete="off">
        @if ($errors->has('new-password'))
          <span class="">
            <strong>{{ $errors->first('new-password') }}</strong>
          </span>
        @endif
      </div>
    </div> -->
    <!-- <div class="">
      <label for="confirm">
        新しいパスワード（確認用）
      </label>
      <div>
        <input id="confirm" type="password" class="" name="new-password_confirmation" autocomplete="off">
      </div>
    </div> -->
    <!-- <div>
      <button type="submit" class="">変更</button>
    </div> -->
  </form>
</div>

@endsection
