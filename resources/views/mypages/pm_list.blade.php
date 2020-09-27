@extends('layouts.base')

@section('title', 'パブリックメッセージ一覧')

@section('content')

パブリックメッセージ一覧

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
