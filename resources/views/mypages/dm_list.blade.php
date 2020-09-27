@extends('layouts.base')

@section('title', '案件詳細')

@section('content')

ダイレクトメッセージの一覧画面です。

<!-- ****************************** -->
<!-- sidemenu mypage -->
@component('components.sidebar')
  @slot('name')
    {{ $user->name }}
  @endslot
  <!-- public message の有無 -->
  @if( $pm_yet_notify_flg )
    @slot('pm_yet_notify_flg')
      未読あり
    @endslot
  @else
    @slot('pm_yet_notify_flg')
      未読なし
    @endslot
  @endif
<!-- direct message の有無 -->
  @if( $dm_yet_notify_flg )
    @slot('dm_yet_notify_flg')
      未読あり
    @endslot
  @else
    @slot('dm_yet_notify_flg')
      未読なし
    @endslot
  @endif
<!-- user_id -->
  @slot('user_id')
    {{ $user->id }}
  @endslot

@endcomponent


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
