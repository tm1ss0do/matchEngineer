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

@if( $publics )

  @foreach ( $publics as $public )

      @foreach($public_msgs_yet as $pub_msg )
        @if( $pub_msg->public_board_id === $public->project->id )
        未読
        @endif
      @endforeach

      @if( $public->project )
        <li>案件名：{{ $public->project->project_title }}</li>
        <li>{{ $public->user->name }}</li>
        <li>{{ $public->content }}</li>
        <a href="{{ url('/') }}/projects/{{ $public->project_id }}">メッセージページへ</a>
      @else
        <p>このパブリックメッセージは削除されたか、ユーザーが退会しています。</p>
      @endif

  @endforeach

  {{ $publics->links() }}

@endif

@endsection
