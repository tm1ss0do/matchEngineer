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

<div class="p-form__container">

  <form class="p-form__form" action="" method="post">
    @csrf
    <label class="c-title__label" for="title">タイトル</label></br>
    <counter-short
    :countnum = "100"
    ex = "案件名を入力します。"
    id = "title"
    name="project_title"
    :old = "{{json_encode(Session::getOldInput())}}"
    :db = "{{ $project }}">
    </counter-short>

    <label class="c-title__label" for="status">ステータス</label></br>

    <section class="c-input__line">
      <div class="c-input__select--wrap">
        <select class="c-input__select" id="status" class="" name="project_status" value="{{ old('project_status') }}">
          <option class="c-input__option" value="0">募集中</option>
          <option class="c-input__option" value="1">募集終了</option>
        </select>
      </div>
    </section>


    <label class="c-title__label" for="date">募集終了日</label></br>
    <calender-component>
    </calender-component>

    <select-type
    :project="{{ json_encode(Session::getOldInput()) }}">
    </select-type>

    <label class="c-title__label" for="detail">案件詳細</label></br>
    <counter-component
      :countnum = "2000"
      ex = "例：既存ブログサイトのデザインを変えたいです。優しいデザインが得意な方を募集します。"
      id = "detail"
      name = "project_detail_desc"
      :old="{{ json_encode(Session::getOldInput()) }}"
      :db="''"
    ></counter-component>
    <div class="c-btn__panel">
      <input class="c-btn__submit" type="submit" name="" value="案件登録">
    </div>
  </form>

</div>

@endsection
