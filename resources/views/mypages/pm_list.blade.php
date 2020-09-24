@extends('layouts.base')

@section('title', 'パブリックメッセージ一覧')

@section('content')

パブリックメッセージ一覧

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@foreach ( $publics as $public )

    @foreach($public_msgs_yet as $public )
      @if( $public->public_board_id === $public->project->id )
      未読
      @endif
    @endforeach

    <li>案件名：{{ $public->project->project_title }}</li>
    <li>{{ $public->user->name }}</li>
    <li>{{ $public->content }}</li>
    <a href="{{ url('/') }}/projects/{{ $public->project_id }}">メッセージページへ</a>
@endforeach


@endsection
