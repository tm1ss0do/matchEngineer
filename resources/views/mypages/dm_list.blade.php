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

    @foreach( $direct_msgs_boards  as $direct_msg_board )

      <p>ダイレクトメッセージのid：{{ $direct_msg_board->id }}

      @foreach($direct_msgs_yet as $direct )
        @if( $direct->direct_board_id === $direct_msg_board->id )
        <span>未読</span>
        @endif
      @endforeach

      </p>

      @if ( $direct_msg_board->project )
        <p>案件名：{{ $direct_msg_board->project->project_title }}</p>
      @endif

      <a href="{{ url('/') }}/mypages/direct_msg/{{ $direct_msg_board->id }}">メッセージページへ</a>

      @if ( $direct_msg_board->project )
        <a href="{{ url('/') }}/projects/{{ $direct_msg_board->project->id }}">案件詳細をみる</a>
      @endif

    @endforeach

</div>

{{ $direct_msgs_boards->links() }}


@endsection
