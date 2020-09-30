@extends('layouts.base')

@section('title', '応募済み案件一覧')

@section('content')

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

<!-- ****************************** -->
応募済み案件一覧です。


<div class="">
    @foreach( $direct_msgs  as $direct_msg )

      @if($direct_msg)
        @if( $direct_msg->project )
          <project-item
          :project="{{ $direct_msg->project }}"
          :user="{{ $direct_msg->project->user }}"
          url="{{ url('/') }}"
          :non-display="true"
          :all="false"
          ></project-item>

          <a href="{{ url('/') }}/mypages/direct_msg/{{ $direct_msg->id }}">メッセージページへ</a>

        @else
          この案件は削除されました
        @endif

      @else

        まだ応募していません
      @endif


    @endforeach
</div>

{{ $direct_msgs->links() }}


@endsection
