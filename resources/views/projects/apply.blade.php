@extends('layouts.base')

@section('title', '案件詳細')

@section('content')

応募画面です。

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<!-- 応募するプロジェクト詳細 -->
<p>{{ $project->project_title }}</p>

<p>{{ $user->name }}</p>

<!-- 応募フォーム -->

<form class="" action="" method="post">
  @csrf
  <label for="detail">応募メッセージ</label></br>
  <counter-component
    :countnum = "1000"
    ex = "例：はじめまして。ウェブデザイナーの募集を見て応募いたしました。"
    id = "detail"
    name = "content"
    value="{{ old('content') }}"
  ></counter-component>
  <input type="submit" name="" value="応募">
</form>

@endsection
