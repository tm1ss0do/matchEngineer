@extends('layouts.base')

@section('title', '案件詳細')

@section('content')


<h3 class="c-title__page u-text-align__center">退会しました。</h3>

<div class="p-form__container u-flex u-flex__center u-flex__column">
  <p class="c-title__small u-text-align__center">ご利用いただきありがとうございました。</p>
  <div class="c-btn__panel">
    <a class="c-btn__medi" href="{{ route('project.all') }}">案件一覧へ</a>
  </div>
</div>

@endsection
