@extends('layouts.base')

@section('title', '退会画面')


@section('scripts')
<script src="{{ secure_asset('js/direct.js') }}" defer></script>
@endsection


@section('content')

<h3 class="c-title--page u-text-align--center">退会画面です</h3>

<div class="p-form__container u-flex u-flex--center">
  <form class="p-form__form--midi js-form" action="" method="post">
    @csrf
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />

    <section class="c-input__line">
      <p class="c-title--small u-text-align--center" for="withdraw">本当に退会しますか？</p>
      <div class="c-btn__panel u-flex--column">
        <a class="c-btn--medi" href="{{ route('project.all') }}">案件一覧へ</a>
        <input id="withdraw" class="c-btn--moderate js-submit" type="submit" name="withdraw" value="退会">
      </div>
    </section>

  </form>
</div>


@endsection
