@extends('layouts.base')

@section('title', '登録済み案件一覧')
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

<<<<<<< HEAD
<ul>
  <li>
    <a href="{{ url('/') }}/projects/new">案件登録</a>
  </li>
  <li>
    <a href="{{ url('/') }}/mypages/registered">登録済み案件一覧</a>
  </li>
  <li>
    <a href="{{ url('/') }}/mypages/applied">応募済み案件一覧</a>
  </li>
  <li>
    <a href="{{ url('/') }}/mypages/public_msg">パブリックメッセージ一覧</a>
    @if(  $public_msgs_yet )
    未読あり
    @else
    未読なし
    @endif
  </li>
  <li>
    <a href="{{ url('/') }}/mypages/direct_msg">ダイレクトメッセージ一覧</a>
    @if(  $direct_msgs_yet )
    未読あり
    @else
    未読なし
    @endif
  </li>
  <li>
    <a href="{{ url('/') }}/projects/{{ $user->id }}/profile">プロフィール</a>
  </li>
  <li>
    <a href="{{ url('/') }}/mypages/withdraw">退会</a>
  </li>
</ul>
=======
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


<h3 class="c-title__page">登録済み案件一覧</h3>
>>>>>>> deploy

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

<<<<<<< HEAD
{{ $projects->links() }}

=======
{{ $projects->links('vendor/pagination/custom') }}

@endsection
@section('back')
>>>>>>> deploy

@endsection
