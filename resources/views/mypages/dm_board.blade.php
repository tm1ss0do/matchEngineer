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
<p>{{ $directmsg->user->name }}</p>
<p>{{ $directmsg->content }}</p>
<p>{{ $directmsg->send_date }}</p>


@endforeach

<form class="" action="" method="post">
  @csrf
  <label for="content"></label>
   <counter-component
    :countnum = "1000"
    ex = ""
    id = "content"
    name = "content"
    ></counter-component>
  <input type="submit" name="" value="送信">
</form>


@endsection
