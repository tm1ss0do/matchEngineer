@extends('layouts.base')

@section('title', '応募済み案件一覧')

@section('content')

応募済み案件一覧です。

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="">
    @foreach( $direct_msgs  as $direct_msg )

    <p>ダイレクトメッセージのid：{{ $direct_msg->id }}</p>
    <p>案件名：{{ $direct_msg->project->project_title }}</p>

    <a href="{{ url('/') }}/mypages/direct_msg/{{ $direct_msg->id }}">メッセージページへ</a>

    <a href="{{ url('/') }}/projects/{{ $direct_msg->project->id }}">案件詳細をみる</a>

    @endforeach

</div>

{{ $direct_msgs->links() }}


@endsection
