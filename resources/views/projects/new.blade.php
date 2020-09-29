@extends('layouts.base')

@section('title', '案件詳細')

@section('content')

案件登録画面

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<form class="" action="" method="post">
  @csrf
  <label for="title">タイトル</label></br>
  <input type="text" name="project_title" value="{{ old('project_title') }}" id="title"></br>
  <label for="status">ステータス</label></br>
  <select id="status" class="" name="project_status" value="{{ old('status') }}">
    <option value="0">募集中</option>
    <option value="1">募集終了</option>
  </select></br>
  <label for="status">募集終了日</label></br>
  <calender-component>
  </calender-component>

  <select-status>
  </select-status>

  <label for="detail">案件詳細</label></br>
  <counter-component
    :countnum = "5000"
    ex = "例：既存ブログサイトのデザインを変えたいです。優しいデザインが得意な方を募集します。"
    id = "detail"
    name = "project_detail_desc"
    value="{{ old('project_detail_desc') }}"
  ></counter-component>
  <input type="submit" name="" value="案件登録">
</form>

@endsection
