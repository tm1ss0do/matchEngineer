@extends('layouts.base')

@section('title', 'パブリックメッセージ一覧')

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


<h3 class="c-title__page">パブリックメッセージ一覧</h3>

@if( $publics )

  @foreach ( $publics as $public )

      @foreach($public_msgs_yet as $pub_msg )
        @if( $pub_msg->public_board_id === $public->project->id )
        未読
        @endif
      @endforeach

      @if( $public->project )

        <li>案件名：
          <a class="c-card__title--link" href="{{ url('/') }}/projects/{{ $public->project_id }}" >{{ $public->project->project_title }}</a>
        </li>
        <li>{{ $public->user->name }}</li>
        <li>{{ $public->content }}</li>
        <a href="{{ url('/') }}/projects/{{ $public->project_id }}">メッセージページへ</a>
      @else
        <p>このパブリックメッセージは削除されたか、ユーザーが退会しています。</p>
      @endif

  @endforeach

  {{ $publics->links('vendor/pagination/custom') }}

@endif

@endsection
