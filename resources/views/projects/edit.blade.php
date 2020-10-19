@extends('layouts.base')

@section('title', '案件編集')


@section('scripts')
<script src="{{ secure_asset('js/app.js') }}" defer></script>
<script src="{{ secure_asset('js/pagetop.js') }}" defer></script>
<script src="{{ secure_asset('js/direct.js') }}" defer></script>
@endsection


@section('content')

<h3 class="c-title--page">案件編集</h3>

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

    <label for="title">タイトル<span class="u-font--require">※</span></label></br>
    <counter-short
    :countnum = "100"
    ex = "案件名を入力します。"
    id = "title"
    name="project_title"
    :old = "{{json_encode(Session::getOldInput())}}"
    :db = "{{ $project }}">
    </counter-short>


    <label class="c-title--label" for="status">ステータス</label></br>

    <section class="c-input__line">
      <div class="c-input__select-wrap">
        <select id="status" class="c-input__select" name="project_status" >
          <option value="0"
            class="c-input__option"
            @if( old('project_status')=='0' ) selected  @endif
            @if( $project->project_status == '0' ) selected  @endif
            >募集中
          </option>
          <option value="1"
            class="c-input__option"
            @if( old('project_status')=='1' ) selected  @endif
            @if( $project->project_status == '1' ) selected  @endif
            >募集終了
         </option>
        </select>
      </div>
    </section>


    <label for="status">募集終了日</label></br>
    @if($project->project_reception_end)
      <p class="u-font--sub">設定中：{{ $project['project_reception_end']->format('Y/m/d') }}</p>
      <input type="hidden" name="project_reception_end_old" value="{{ $project['project_reception_end']->format('Y/m/d') }}">
    @else
      未定です</br>
    @endif
    <calender-component>
    </calender-component>
    <p class="u-font--ss">変更しない場合は空欄にしてください</p>

    <select-type
    :project="{{ $project }}">
    </select-type>

    <label class="c-title--label" for="detail">案件詳細<span class="u-font--require">※</span></label></br>
    <counter-component
      :countnum = "2000"
      ex = "例：既存ブログサイトのデザインを変えたいです。優しいデザインが得意な方を募集します。"
      id = "detail"
      name = "project_detail_desc"
      :old = "{{json_encode(Session::getOldInput())}}"
      :db = "{{ $project }}"
    ></counter-component>
    <div class="c-btn__panel">
      <input class="c-btn__submit js-submit" type="submit" name="" value="案件登録">
    </div>
  </form>


</div>


@endsection
