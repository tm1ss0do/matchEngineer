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
