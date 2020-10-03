@extends('layouts.base')

@section('title', 'メールアドレス変更')

@section('content')
<!-- ユーザーのプロフィール表示画面 -->

<h3 class="c-title__page u-text-align__center">メールアドレス変更</h3>

<div class="p-form__container u-flex u-flex__center">
  <form class="p-form__form--midi" action="" method="POST">
    @csrf
    <section class="c-input__line">
      <label class="c-title__label" for="new_email">新しいメールアドレスをご入力ください</label></br>
      <input id="new_email" type="email" class="c-input__text @error('email') is-invalid @enderror" name="new_email" value="{{ old('email', $user->email ) }}" required autocomplete="email" autofocus>
      @error('email')
          <span class="u-font__error" role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror
    </section>

    <div class="c-btn__panel">
      <input class="c-btn__medi" type="submit" value="変更">
    </div>

  </form>

</div>


@endsection
