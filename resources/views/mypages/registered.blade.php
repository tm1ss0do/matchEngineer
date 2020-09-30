@extends('layouts.base')

@section('title', '登録済み案件一覧')

@section('content')

登録済み案件一覧です。


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


<ul>
    @foreach ($projects as $project)

      @if($project)
        <project-item
        :project="{{ $project }}"
        :user="{{ $project->user }}"
        url="{{ url('/') }}"
        :non-display="false"
        :all="false"
        ></project-item>
      @else
        <li>登録した案件はありません</li>
      @endif

    @endforeach
</ul>

{{ $projects->links() }}

@endsection
