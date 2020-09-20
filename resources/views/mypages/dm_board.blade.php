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
<p>{{ $directmsg->user->name }}</p>さんから
<p>{{ $directmsg->content }}</p>
<p>{{ $directmsg->send_date }}</p>


@endforeach

@endsection
