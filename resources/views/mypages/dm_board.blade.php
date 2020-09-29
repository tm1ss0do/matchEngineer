@extends('layouts.base')

@section('title', '案件詳細')

@section('content')

ダイレクトメッセージのやりとり画面です。

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@foreach ( $directmsgs as $directmsg )
  @if ( $directmsg->user )
    <p>From:{{ $directmsg->user->name }}</p>
  @else
    <p>このユーザーは退会しています</p>
  @endif
  <p>{{ $directmsg->content }}</p>
  <p>{{ $directmsg->send_date }}</p>

@endforeach


@if($no_form)
このユーザーは退会しているため、メッセージは送れません。

@else
<form class="" action="" method="post">
  @csrf
  <label for="content"></label>
   <counter-component
    :countnum = "1000"
    ex = ""
    id = "content"
    name = "content"
    value="{{ old('content') }}"
    ></counter-component>
  <input type="submit" name="" value="送信">
</form>

@endif


@endsection
