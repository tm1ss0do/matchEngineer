@extends('layouts.base')

@section('title', '案件詳細')

@section('content')


<h3 class="c-title--page u-text-align--center">退会しました。</h3>

<div class="p-form__container u-flex u-flex--center u-flex--column">
  <p class="c-title--small u-text-align--center">ご利用いただきありがとうございました。</p>
  <div class="c-btn__panel">
    <a class="c-btn--medi" href="{{ route('project.all') }}">案件一覧へ</a>
  </div>
</div>

@endsection
@section('back')

@endsection
