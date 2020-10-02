@extends('layouts.base')

@section('title', '案件詳細')

@section('content')

<h3 class="c-title__page u-text-align__center">退会画面です</h3>

<div class="p-form__container u-flex u-flex__center">
  <form class="p-form__form--midi" action="" method="post">
    @csrf
    <section class="c-input__line">
      <p class="c-title__small u-text-align__center" for="withdraw">本当に退会しますか？</p>
      <div class="c-btn__panel u-flex__column">
        <a class="c-btn__medi" href="{{ route('project.all') }}">案件一覧へ</a>
        <input id="withdraw" class="c-btn__moderate" type="submit" name="withdraw" value="退会">
      </div>
    </section>

  </form>
</div>


@endsection
