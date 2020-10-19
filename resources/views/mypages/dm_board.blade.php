@extends('layouts.base')

@section('title', 'ダイレクトメッセージボード')

@section('scripts')
<script src="{{ secure_asset('js/app.js') }}" defer></script>
<script src="{{ secure_asset('js/pagetop.js') }}" defer></script>
<script src="{{ secure_asset('js/direct.js') }}" defer></script>
@endsection

@section('content')

<h3 class="c-title--page">ダイレクトメッセージボード</h3>

<direct-message
:msgs = "{{ $directmsgs }}"
:board = "{{ $board }}"
></direct-message>

@if($no_form)
<p class="u-font--error">このユーザーは退会しているため、メッセージは送れません。</p>

@else

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

    <label for="content">メッセージ投稿フォーム</label>
     <counter-component
      :countnum = "1000"
      ex = ""
      id = "content"
      name = "content"
      :old = "{{json_encode(Session::getOldInput())}}"
      :db = "''"
      ></counter-component>
    <div class="c-btn__panel">
      <input class="c-btn__submit js-submit" type="submit" name="" value="送信">
    </div>
  </form>

@endif


@endsection
@section('back')

@endsection
