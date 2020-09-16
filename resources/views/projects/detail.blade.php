@extends('layouts.base')

@section('title', '案件詳細')

@section('content')

案件詳細画面


<p>{{ $project->project_title }}</p>

<p>{{ $user->name }}</p>

  <message-component
  :publicmsgs = "{{ $publicmsgs }}"
  ></message-component>

  <form class="" action="index.html" method="post">
    <textarea name="name" rows="8" cols="80"></textarea>
    <input type="submit" name="" value="">
  </form>

@endsection
