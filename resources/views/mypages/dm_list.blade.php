@extends('layouts.base')

@section('title', 'ダイレクトメッセージ一覧')
@section('scripts')
<script src="{{ secure_asset('js/app.js') }}" defer></script>
<script src="{{ secure_asset('js/pagetop.js') }}" defer></script>
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


<h3 class="c-title__page">ダイレクトメッセージ一覧</h3>

<div class="">

  @if($direct_msgs_boards)

    @foreach( $direct_msgs_boards  as $direct_msg_board )

      @foreach($direct_msgs_yet as $direct )
        @if( $direct->direct_board_id === $direct_msg_board->id )
        <p class="u-font__bold u-color__main">
          <i class="far fa-flag"></i>
          未読
        </p>
        @endif
      @endforeach

      <div class="c-comment__wrap--new">
        <div class="c-comment__header">
          <span class="c-comment__info">
            From:
            @if($direct_msg_board->reciever && $direct_msg_board->sender)
              @if( $direct_msg_board->reciever['id'] !== Auth::id() )
                <a class="c-comment__link" href="{{ url('/') }}/projects/{{ $direct_msg_board->reciever['id'] }}/profile" >
                  {{ $direct_msg_board->reciever['name'] }}
                </a>
              @else
                <a class="c-comment__link" href="{{ url('/') }}/projects/{{ $direct_msg_board->sender['id'] }}/profile" >
                  {{ $direct_msg_board->sender['name'] }}
                </a>
              @endif
            @else
              退会したユーザー
            @endif
          </span>
        </div>
        <div class="c-comment__body">
          @if ( $direct_msg_board->project )
            <p>案件名：
              <a class="c-card__title--link" href="{{ url('/') }}/projects/{{ $direct_msg_board->project->id }}">{{ $direct_msg_board->project->project_title }}</a>
            </p>
          @else
            <p>案件名：-</p>
          @endif
          <div class="c-btn__end">
            <a class="c-btn__medi" href="{{ url('/') }}/mypages/direct_msg/{{ $direct_msg_board->id }}">メッセージページへ</a>
          </div>
        </div>
        <div class="c-comment__footer">
          <span class="c-comment__info" >最終更新日：{{ $direct_msg_board->updated_at }}</span>
        </div>
      </div>

      @endforeach

    @endif

</div>

{{ $direct_msgs_boards->links('vendor/pagination/custom') }}


@endsection

@section('back')

@endsection
