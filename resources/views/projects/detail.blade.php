@extends('layouts.base')

@section('title', '案件詳細')

@section('content')

案件詳細画面


@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<p>{{ $project->project_title }}</p>

<p>{{ $user->name }}</p>

@if( $project->user_id === $auther->id )
<a href="{{ url('projects/'.$project->id.'/edit' ) }}">編集する</a>
@elseif( $already_apply )
 <a href="{{ url('mypages/direct_msg/'.$already_apply->id ) }}">
   この案件は応募済みです
 </a>
@else
<a href="{{ url('projects/'.$project->id.'/application' ) }}">応募する</a>
@endif

<!-- twitter share -->
<a class="twitter-share-button"
   href="https://twitter.com/share"
   data-dnt="true"
   data-text="match｜案件名：{{ mb_substr($project->project_title, 0, 80) }}...">Tweet</a>


<!-- ここから、メッセージ一覧 -->

<h3>メッセージ一覧</h3>
  <message-component
  :publicmsgs = "{{ $publicmsgs }}"
  :project = "{{ $project }}"
  ></message-component>

  <form class="" action="" method="post">
    @csrf
    <label for="pub_msg">メッセージ送信フォーム</label>
     <counter-component
      :countnum = "1000"
      ex = "募集者へ質問してみましょう。"
      id = "pub_msg"
      name = "content"
      message = ""
      ></counter-component>
    <input type="submit" name="" value="送信">
  </form>

@endsection
