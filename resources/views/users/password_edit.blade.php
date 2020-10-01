@extends('layouts.base')

@section('title', 'パスワード変更')

@section('content')
<!-- ユーザーのプロフィール表示画面 -->


<h3 class="c-title__page">パスワード変更</h3>


<div class="">パスワード変更</div>

<div class="">
  <form method="POST" action="">
    @csrf
    <div class="">
      <label for="current">
        現在のパスワード
      </label>
      <div>
        <input id="current" type="password" class="" name="current-password" autocomplete="off">
      </div>
    </div>
    <div class="">
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
    </div>
    <div class="">
      <label for="confirm">
        新しいパスワード（確認用）
      </label>
      <div>
        <input id="confirm" type="password" class="" name="new-password_confirmation" autocomplete="off">
      </div>
    </div>
    <div>
      <button type="submit" class="">変更</button>
    </div>
  </form>
</div>

@endsection
