@extends('layouts.base')

@section('title', 'DM送信画面')


@section('scripts')
<script src="{{ secure_asset('js/app.js') }}" defer></script>
<script src="{{ secure_asset('js/pagetop.js') }}" defer></script>
<script src="{{ secure_asset('js/direct.js') }}" defer></script>
@endsection

@section('content')
<!-- DM送信フォーム表示画面 -->

<h3 class="c-title--page">ダイレクトメッセージ送信フォーム</h3>

@if ($errors->any())
  <ul class="u-font--error" role="alert">
    @foreach ($errors->all() as $error)
      <li class="u-list--none">{{ $error }}</li>
    @endforeach
  </ul>
@endif

<form class="js-form" action="" method="post">
  @csrf
  <input type="hidden" name="_token" value="{{ csrf_token() }}" />

  <label class="c-title--small" for="detail">ダイレクトメッセージ</label></br>
  <counter-component
    :countnum = "1000"
    ex = "例：はじめまして。プロフィールを拝見し、ぜひ一度弊社の案件をご検討いただきたく連絡いたしました。"
    id = "detail"
    name = "content"
    :old="{{ json_encode(Session::getOldInput()) }}"
    :db="''"
  ></counter-component>
  <div class="c-btn__panel">
    <input class="c-btn__submit js-submit" type="submit" name="" value="送信">
  </div>
</form>

@endsection
