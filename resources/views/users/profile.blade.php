@extends('layouts.base')

@section('title', 'プロフィール')

@section('content')
<!-- ユーザーのプロフィール表示画面 -->

<h3 class="c-title__page">プロフィール</h3>

<div class="c-card__simple">

  <div class="c-card__body">
    <div class="c-card__item">
      <p class="c-card__title">ユーザー名</p>
      <p class="c-card__text">{{ $user->name }}</p>
    </div>
    <div class="c-card__item">
      <p class="c-card__title">プロフィールアイコン</p>
      <div class="c-img__container--midi">
        @if( $user->profile_icon )
          <img class="c-img__img" src="{{ asset('storage/avatar/' . $user->profile_icon) }}">
        @else
          <img class="c-img__img" src="{{ asset('/img/default_prof.png') }}" alt="">
        @endif
      </div>
    </div>
    <div class="c-card__item">
      <p class="c-card__title">自己紹介</p>
      <p class="c-card__text">
        {!! nl2br(e($user->self_introduction)) !!}
      </p>
    </div>
  </div>

  <div class="c-btn__panel--left">
    @if( Auth::id() !== $user->id )
      <a class="c-btn__medi" href="{{ url('/') }}/projects/dm/{{ $user->id }}">ダイレクトメッセージを送る</a>
    @elseif( Auth::id() === $user->id )
      <a class="c-btn__moderate" href="{{ url('/') }}/mypages/{{$user->id}}/profile/edit">編集する</a>
    @endif

  </div>

</div>


@endsection
