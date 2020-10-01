@extends('layouts.base')

@section('title', '案件登録')

@section('content')

<h3 class="c-title__page">案件登録</h3>


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
  <counter-short
  :countnum = "100"
  ex = "案件名を入力します。"
  id = "title"
  name="project_title"
  :old="{{ json_encode(Session::getOldInput()) }}">
  </counter-short>

  <label for="status">ステータス</label></br>
  <select id="status" class="" name="project_status" value="{{ old('project_status') }}">
    <option value="0">募集中</option>
    <option value="1">募集終了</option>
  </select></br>
  <label for="status">募集終了日</label></br>

  <calender-component>
  </calender-component>

  <select-type
  :project="{{ json_encode(Session::getOldInput()) }}">
  </select-type>

  <label for="detail">案件詳細</label></br>
  <counter-component
    :countnum = "2000"
    ex = "例：既存ブログサイトのデザインを変えたいです。優しいデザインが得意な方を募集します。"
    id = "detail"
    name = "project_detail_desc"
    value="{{ old('project_detail_desc') }}"
  ></counter-component>
  <input type="submit" name="" value="案件登録">
</form>

@endsection
