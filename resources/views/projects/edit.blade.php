@extends('layouts.base')

@section('title', '案件編集')

@section('content')

<h3 class="c-title__page">案件編集</h3>


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
  :old = "{{json_encode(Session::getOldInput())}}"
  :db = "{{ $project }}">
  </counter-short>


  <label for="status">ステータス</label></br>
  <select id="status" class="" name="project_status" >
    <option value="0"
     @if( old('project_status')=='0' ) selected  @endif
     @if( $project->project_status == '0' ) selected  @endif
    >募集中</option>
    <option
    @if( old('project_status')=='1' ) selected  @endif
    @if( $project->project_status == '1' ) selected  @endif
     value="1">募集終了</option>
  </select></br>

  <label for="status">募集終了日</label></br>
  現在の終了予定日：</br>
  @if($project->project_reception_end)
    {{ $project['project_reception_end']->format('Y/m/d') }}
    <input type="hidden" name="project_reception_end_old" value="{{ $project['project_reception_end']->format('Y/m/d') }}">
  @else
    未定です</br>
  @endif
    更新後の終了日
  <calender-component>
  </calender-component>


  <select-type
  :project="{{ $project }}">
  </select-type>

  <label for="detail">案件詳細</label></br>
  <counter-component
    :countnum = "2000"
    ex = "例：既存ブログサイトのデザインを変えたいです。優しいデザインが得意な方を募集します。"
    id = "detail"
    name = "project_detail_desc"
    :old = "{{json_encode(Session::getOldInput())}}"
    :db = "{{ $project }}"
  ></counter-component>
  <input type="submit" name="" value="案件登録">
</form>

@endsection
