@extends('layouts.base')

@section('title', '登録済み案件一覧')

@section('content')

登録済み案件一覧です。

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<!-- ****************************** -->
<!-- sidemenu mypage -->
@component('components.sidebar')
  @slot('name')
    {{ $user->name }}
  @endslot
  <!-- public message の有無 -->
  @if( $public_msgs_yet )
    @slot('public_msgs_yet')
      未読あり
    @endslot
  @else
    @slot('public_msgs_yet')
      未読なし
    @endslot
  @endif
<!-- direct message の有無 -->
  @if( $direct_msgs_yet )
    @slot('direct_msgs_yet')
      未読あり
    @endslot
  @else
    @slot('direct_msgs_yet')
      未読なし
    @endslot
  @endif
<!-- user_id -->
  @slot('user_id')
    {{ $user->id }}
  @endslot

@endcomponent
<p>{{ $user->name }}さんのマイページ</p>

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
    @if( $public_msgs_yet )
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




<ul>
    @foreach ($projects as $project)

    @if($project)
      <li>{{ $project->project_title }}</li>
    @else
      <li>登録した案件はありません</li>
    @endif

    @endforeach
</ul>

{{ $projects->links() }}

@endsection
