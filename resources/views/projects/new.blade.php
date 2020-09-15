@extends('layouts.base')

@section('title', '案件詳細')

@section('content')

案件登録画面

<form class="" action="" method="post">
  <label for="title">タイトル</label>
  <input type="text" name="" value="" id="title">
  <label for="status">ステータス</label>
  <input type="text" name="" value="" id="status">
  <label for="status">案件種別</label>
  <select class="" name="">
    <option value="">案件種別を選択してください</option>
    <option value="revenue">レベニュー</option>
    <option value="single">単発</option>
  </select>
  <label for="status">募集終了日</label>
  <input type="text" name="" value="" id="status">
  <calender-component>
  </calender-component>
</form>

@endsection
