@extends('layouts.base')

@section('title', '応募済み案件一覧')
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

<!-- ****************************** -->

<h3 class="c-title__page">応募済み案件一覧</h3>

<div class="">
    @foreach( $direct_msgs  as $direct_msg )

      @if($direct_msg)
        @if( $direct_msg->project )
          <project-item
          :project="{{ $direct_msg->project }}"
          :user="{{ $direct_msg->project->user }}"
          url="{{ url('/') }}"
          :non-display="false"
          :all="false"
          ></project-item>

          <a class="c-btn__medi" href="{{ url('/') }}/mypages/direct_msg/{{ $direct_msg->id }}">
            <i class="far fa-hand-point-right"></i>
            メッセージページへ
          </a>

        @else
          この案件は削除されました
        @endif

      @else

        まだ応募していません
      @endif


    @endforeach
</div>

{{ $direct_msgs->links('vendor/pagination/custom') }}


@endsection
@section('back')

@endsection
