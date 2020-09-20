@extends('layouts.base')

@section('title', '案件詳細')

@section('content')

ダイレクトメッセージの一覧画面です。

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

    @if ( $direct_msg->project )
    <p>案件名：{{ $direct_msg->project->project_title }}</p>
    @endif

    <a href="{{ url('/') }}/mypages/direct_msg/{{ $direct_msg->id }}">メッセージページへ</a>

    @if ( $direct_msg->project )
    <a href="{{ url('/') }}/projects/{{ $direct_msg->project->id }}">案件詳細をみる</a>
    @endif
    
    @endforeach

</div>


@endsection
