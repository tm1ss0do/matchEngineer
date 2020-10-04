@extends('layouts.base')

@section('title', 'ダイレクトメッセージボード')

@section('content')

<h3 class="c-title__page">ダイレクトメッセージボード</h3>

<direct-message
:msgs = "{{ $directmsgs }}"
:board = "{{ $board }}"
></direct-message>

@if($no_form)
<p class="u-font__error">このユーザーは退会しているため、メッセージは送れません。</p>

@else

  @if ($errors->any())
    <ul class="u-font__error" role="alert">
      @foreach ($errors->all() as $error)
        <li class="u-list__none">{{ $error }}</li>
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
