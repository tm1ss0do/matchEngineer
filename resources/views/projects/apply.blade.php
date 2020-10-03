@extends('layouts.base')

@section('title', '応募画面')

@section('content')

<h3 class="c-title__page">応募画面</h3>


<!-- 応募するプロジェクト詳細 -->

<h3 class="c-title__small">案件詳細</h3>
  <project-item
  :project="{{ $project }}"
  :user="{{ $project->user }}"
  url="{{ url('/') }}"
  :non-display="true"
  :all="true"
  ></project-item>


  <!-- 応募フォーム -->

<h3 class="c-title__small">応募メッセージ</h3>

@if ($errors->any())
    <div class="">
        <ul>
            @foreach ($errors->all() as $error)
                <li class="u-font__error">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form class="" action="" method="post">
  @csrf
  <counter-component
    :countnum = "1000"
    ex = "例：はじめまして。ウェブデザイナーの募集を見て応募いたしました。"
    id = "detail"
    name = "content"
    :old="{{ json_encode(Session::getOldInput()) }}"
  ></counter-component>
  <div class="c-btn__panel">
    <input class="c-btn__submit" type="submit" name="" value="応募">
  </div>
</form>

@endsection
