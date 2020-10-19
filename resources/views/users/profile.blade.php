@extends('layouts.base')

@section('title', 'プロフィール')

@section('scripts')
<script src="{{ secure_asset('js/pagetop.js') }}" defer></script>
@endsection

@section('content')
<!-- ユーザーのプロフィール表示画面 -->

<h3 class="c-title--page">プロフィール</h3>

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
          <img class="c-img__img" src="{{ $user->profile_icon }}">
        @else
          <img class="c-img__img" src="{{ secure_asset('/img/default_prof.png') }}" alt="default_prof.png">
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
      <a class="c-btn--medi" href="{{ url('/') }}/projects/dm/{{ $user->id }}">ダイレクトメッセージを送る</a>
    @elseif( Auth::id() === $user->id )
      <a class="c-btn--moderate" href="{{ url('/') }}/mypage/{{$user->id}}/profile/edit">編集する</a>
    @endif

  </div>

</div>


@endsection
@section('back')
  <a class="c-btn--moderate" href="{{ route('mypage.registered') }}">マイページへ</a>
@endsection
