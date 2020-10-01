@extends('layouts.base')

@section('title', 'ダイレクトメッセージ一覧')

@section('content')

<!-- ****************************** -->
<!-- sidemenu mypage -->
@component('components.sidebar')
  @slot('name')
    {{ $user->name }}
  @endslot
  <!-- public message の有無 -->
  @slot('pm_yet_notify_flg')
    {{ $pm_yet_notify_flg }}
  @endslot
<!-- direct message の有無 -->
  @slot('dm_yet_notify_flg')
    {{ $dm_yet_notify_flg }}
  @endslot
<!-- user_id -->
  @slot('user_id')
    {{ $user->id }}
  @endslot

@endcomponent


<h3 class="c-title__page">ダイレクトメッセージ一覧</h3>

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
      @else
        <p>個人的に直接受け取ったメッセージです</p>
      @endif

      -------
      @if($direct_msg_board->reciever['name'] && $direct_msg_board->sender['name'])
        @if( $direct_msg_board->reciever['id'] !== Auth::id() )
            {{ $direct_msg_board->reciever['name'] }}
        @else
          {{ $direct_msg_board->sender['name'] }}
        @endif
      @else
        退会したユーザー
      @endif
      さんとのやりとり
      -----
      <a href="{{ url('/') }}/mypages/direct_msg/{{ $direct_msg_board->id }}">メッセージページへ</a>

      @if ( $direct_msg_board->project )
        <a href="{{ url('/') }}/projects/{{ $direct_msg_board->project->id }}">案件詳細をみる</a>
      @endif

    @endforeach

</div>

{{ $direct_msgs_boards->links('vendor/pagination/custom') }}


@endsection
