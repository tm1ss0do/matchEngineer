@extends('layouts.base')

@section('title', 'プロフィール')

@section('content')
<!-- ユーザーのプロフィール表示画面 -->

<h3 class="c-title__page">プロフィール</h3>


<p>ユーザID:{{ $user->id }}</p>
<p>name:{{ $user->name }}</p>

<p>プロフィールアイコン</p>
@if( $user->profile_icon )
<p>icon:{{ $user->profile_icon }}</p>
<img src="{{ asset('storage/avatar/' . $user->profile_icon) }}">
@else
  <img class="c-img__img" src="{{ asset('/img/default_prof.png') }}" alt="">
@endif

自己紹介:
<p>
  {!! nl2br(e($user->self_introduction)) !!}
</p>

@if( Auth::id() !== $user->id )
  <a href="{{ url('/') }}/projects/dm/{{ $user->id }}">ダイレクトメッセージを送る</a>
@elseif( Auth::id() === $user->id )
  <a href="{{ url('/') }}/mypages/{{$user->id}}/profile/edit">編集する</a>
@endif


@endsection
