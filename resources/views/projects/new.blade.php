@extends('layouts.base')

@section('title', '案件登録')


@section('scripts')
<script src="{{ secure_asset('js/app.js') }}" defer></script>
<script src="{{ secure_asset('js/pagetop.js') }}" defer></script>
<script src="{{ secure_asset('js/direct.js') }}" defer></script>
@endsection

@section('content')

<h3 class="c-title--page">案件登録</h3>

<div class="p-form__container">

  @if ($errors->any())
    <ul class="u-font--error" role="alert">
      @foreach ($errors->all() as $error)
        <li class="u-list--none">{{ $error }}</li>
      @endforeach
    </ul>
  @endif

  <form class="p-form__form js-form" action="" method="post">
    @csrf
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />

    <label class="c-title--label" for="title">タイトル<span class="u-font--require">※</span></label></br>
    <counter-short
    :countnum = "100"
    ex = "案件名を入力します。"
    id = "title"
    name="project_title"
    :old = "{{json_encode(Session::getOldInput())}}"
    :db = "''">
    </counter-short>

    <label class="c-title--label" for="date">募集終了日</label></br>
    <calender-component>
    </calender-component>

    <select-type
    :project="{{ json_encode(Session::getOldInput()) }}">
    </select-type>

    <label class="c-title--label" for="detail">案件詳細<span class="u-font--require">※</span></label></br>
    <counter-component
      :countnum = "2000"
      ex = "例：既存ブログサイトのデザインを変えたいです。優しいデザインが得意な方を募集します。"
      id = "detail"
      name = "project_detail_desc"
      :old="{{ json_encode(Session::getOldInput()) }}"
      :db="''"
    ></counter-component>
    <div class="c-btn__panel">
      <input class="c-btn__submit js-submit" type="submit" name="" value="案件登録">
    </div>
  </form>

</div>

@endsection
