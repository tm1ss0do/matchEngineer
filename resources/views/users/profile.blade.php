@extends('layouts.base')

@section('title', 'プロフィール')

@section('content')
<!-- ユーザーのプロフィール表示画面 -->

ユーザーのプロフィール表示画面


<p>ユーザID:{{ $user->id }}</p>
<p>name:{{ $user->name }}</p>
<p>icon:{{ $user->profile_icon }}</p>
<img src="{{ asset('storage/avatar/' . $user->profile_icon) }}">

自己紹介:
<p>
  {!! nl2br(e($user->self_introduction)) !!}
</p>


<a href="{{ url('/') }}/projects/dm/{{ $user->id }}">ダイレクトメッセージを送る</a>
<a href="{{ url('/') }}/mypages/{{$user->id}}/profile/edit">編集する</a>

@endsection
