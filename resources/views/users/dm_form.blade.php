@extends('layouts.base')

@section('title', 'DM送信画面')

@section('content')
<!-- DM送信フォーム表示画面 -->

DM送信フォーム表示画面


<form class="" action="" method="post">
  @csrf
  <label for="detail">ダイレクトメッセージ</label></br>
  <counter-component
    :countnum = "1000"
    ex = "例：はじめまして。プロフィールを拝見し、ぜひ一度弊社の案件をご検討いただきたく連絡いたしました。"
    id = "detail"
    name = "content"
    value="{{ old('content') }}"
  ></counter-component>
  <input type="submit" name="" value="送信">
</form>

@endsection
