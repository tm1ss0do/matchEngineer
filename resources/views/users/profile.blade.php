@extends('layouts.base')

@section('title', 'プロフィール')

@section('content')
<!-- ユーザーのプロフィール表示画面 -->

ユーザーのプロフィール表示画面

<p>{{ $user->id }}</p>
<p>{{ $user->name }}</p>

{!! nl2br(e($user->self_introduction)) !!}


@endsection
