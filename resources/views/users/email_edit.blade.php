@extends('layouts.base')

@section('title', 'メールアドレス変更')

@section('scripts')
<script src="{{ secure_asset('js/direct.js') }}" defer></script>
@endsection

@section('content')
<!-- ユーザーのプロフィール表示画面 -->

<h3 class="c-title--page u-text-align--center">メールアドレス変更</h3>

<div class="p-form__container u-flex u-flex--center">

  @if ($errors->any())
    <ul class="u-font--error" role="alert">
      @foreach ($errors->all() as $error)
        <li class="u-list--none">{{ $error }}</li>
      @endforeach
    </ul>
  @endif

  <form class="p-form__form--midi js-form" action="" method="POST">
    @csrf
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />

    <section class="c-input__line">
      <label class="c-title--label" for="new_email">新しいメールアドレスをご入力ください</label></br>
      <input id="new_email" type="email" class="c-input__text @error('email') is-invalid @enderror" name="new_email" value="{{ old('email', $user->email ) }}" required autocomplete="email" autofocus>
      @error('email')
          <span class="u-font--error" role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror
    </section>

    <div class="c-btn__panel">
      <input class="c-btn--medi js-submit" type="submit" value="変更">
    </div>

  </form>

</div>


@endsection
