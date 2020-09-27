@extends('layouts.base')

@section('title', '応募済み案件一覧')

@section('content')

応募済み案件一覧です。

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
    @foreach( $direct_msgs  as $direct_msg )

    <p>ダイレクトメッセージのid：{{ $direct_msg->id }}</p>
      @if( $direct_msg->project )
        <p>案件名：{{ $direct_msg->project->project_title }}</p>

        <a href="{{ url('/') }}/mypages/direct_msg/{{ $direct_msg->id }}">メッセージページへ</a>

        <a href="{{ url('/') }}/projects/{{ $direct_msg->project->id }}">案件詳細をみる</a>
      @else
        この案件は削除されました
      @endif

    @endforeach

</div>

{{ $direct_msgs->links() }}


@endsection
