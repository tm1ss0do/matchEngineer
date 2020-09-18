@extends('layouts.base')

@section('title', '案件詳細')

@section('content')

案件詳細画面


<p>{{ $project->project_title }}</p>

<p>{{ $user->name }}</p>

<!-- ここから、メッセージ一覧 -->

<h3>メッセージ一覧</h3>
  <message-component
  :publicmsgs = "{{ $publicmsgs }}"
  :project = "{{ $project }}"
  ></message-component>

  <form class="" action="index.html" method="post">
    <textarea name="content" rows="8" cols="80"></textarea>
    <input type="submit" name="" value="">
  </form>

  

@endsection
