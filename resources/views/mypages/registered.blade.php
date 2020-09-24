@extends('layouts.base')

@section('title', '案件詳細')

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

<ul>
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

<ul>
    @foreach ($projects as $project)

    @if($project)
      <li>{{ $project->project_title }}</li>
    @else
      <li>登録した案件はありません</li>
    @endif

    @endforeach
</ul>


@endsection
