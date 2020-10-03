@extends('layouts.base')

@section('title', 'ダイレクトメッセージボード')

@section('content')

<h3 class="c-title__page">ダイレクトメッセージボード</h3>

<direct-message
:msgs = "{{ $directmsgs }}"
:board = "{{ $board }}"
></direct-message>

@if($no_form)
このユーザーは退会しているため、メッセージは送れません。

@else

  @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
  @endif


  <form class="" action="" method="post">
    @csrf
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
      <input class="c-btn__submit" type="submit" name="" value="送信">
    </div>
  </form>

@endif


@endsection
