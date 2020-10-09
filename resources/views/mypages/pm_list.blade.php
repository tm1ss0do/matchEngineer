@extends('layouts.base')

@section('title', 'パブリックメッセージ一覧')
@section('scripts')
<script src="{{ asset('js/app.js') }}" defer></script>
<script src="{{ asset('js/pagetop.js') }}" defer></script>
@endsection

@section('content')

<!-- ****************************** -->
<!-- sidemenu mypage -->
@component('components.sidebar')
  @slot('name')
    {{ $user->name }}
  @endslot
  <!-- public message の有無 -->

  @if($pm_yet_notify_flg)
    @slot('pm_yet_notify_flg')
    <a class="c-my-menu__link c-notify" href="{{ url('/') }}/mypages/public_msg">
    @endslot
  @else
    @slot('pm_yet_notify_flg')
    <a class="c-my-menu__link" href="{{ url('/') }}/mypages/public_msg">
    @endslot
  @endif

<!-- direct message の有無 -->

  @if($dm_yet_notify_flg)
    @slot('dm_yet_notify_flg')
      <a class="c-my-menu__link c-notify" href="{{ url('/') }}/mypages/direct_msg">
    @endslot
  @else
    @slot('dm_yet_notify_flg')
      <a class="c-my-menu__link" href="{{ url('/') }}/mypages/direct_msg">
    @endslot
  @endif

<!-- user_id -->
  @slot('user_id')
    {{ $user->id }}
  @endslot

@endcomponent


<h3 class="c-title__page">パブリックメッセージ一覧</h3>

<<<<<<< HEAD

@foreach ( $publics as $public )

    @foreach($public_msgs_yet as $pub_msg )
      @if( $pub_msg->public_board_id === $public->project->id )
      未読
=======
@if( $publics )

  @foreach ( $publics as $public )

      @foreach($public_msgs_yet as $pub_msg )
        @if( $pub_msg->public_board_id === $public->project->id )
        <p class="u-font__bold u-color__main">
          <i class="far fa-flag"></i>
          未読
        </p>
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
          <div class="c-comment__body u-indention u-textover__reader">{{ $public->content }}</div>
          <div class="c-comment__footer">
            <span class="c-comment__info" >送信日：{{ $public->send_date }}</span>
            <a class="c-btn__medi" href="{{ url('/') }}/projects/{{ $public->project_id }}">メッセージページへ</a>
          </div>
        </div>

      @else
        <p>このパブリックメッセージは削除されたか、ユーザーが退会しています。</p>
>>>>>>> deploy
      @endif

  @endforeach

  {{ $publics->links('vendor/pagination/custom') }}

@endif

@endsection
