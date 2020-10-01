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

        <project-item
        :project="{{ $public->project }}"
        :user="{{ $public->project->user }}"
        url="{{ url('/') }}"
        :non-display="true"
        :all="false"
        ></project-item>

        <div class="c-comment__wrap--new">
          <div class="c-comment__header">
            <span class="c-comment__info">
              From:
              <a class="c-comment__link" href="{{ url('/') }}/projects/{{ $public->user->id }}/profile" >
                {{ $public->user->name }}
              </a>
            </span>
          </div>
          <div class="c-comment__body u-indention">{{ $public->content }}</div>
          <div class="c-comment__footer">
            <span class="c-comment__info" >送信日：{{ $public->send_date }}</span>
            <a class="c-btn__medi" href="{{ url('/') }}/projects/{{ $public->project_id }}">メッセージページへ</a>
          </div>
        </div>

      @else
        <p>このパブリックメッセージは削除されたか、ユーザーが退会しています。</p>
      @endif

  @endforeach

  {{ $publics->links('vendor/pagination/custom') }}

@endif

@endsection
