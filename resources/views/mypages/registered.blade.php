@extends('layouts.base')

@section('title', '登録済み案件一覧')

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
      <li class="c-my-menu__item c-notify">
    @endslot
  @else
    @slot('pm_yet_notify_flg')
      <li class="c-my-menu__item">
    @endslot
  @endif

<!-- direct message の有無 -->

  @if($dm_yet_notify_flg)
    @slot('dm_yet_notify_flg')
      <li class="c-my-menu__item c-notify">
    @endslot
  @else
    @slot('dm_yet_notify_flg')
      <li class="c-my-menu__item">
    @endslot
  @endif

<!-- user_id -->
  @slot('user_id')
    {{ $user->id }}
  @endslot

@endcomponent


<h3 class="c-title__page">登録済み案件一覧</h3>

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

{{ $projects->links('vendor/pagination/custom') }}

@endsection
