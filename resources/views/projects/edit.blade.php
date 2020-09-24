@extends('layouts.base')

@section('title', '案件詳細')

@section('content')

案件編集画面

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
  <input type="text" name="project_title" value="{{ old('project_title', $project->project_title) }}" id="title"></br>
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
  <label for="status">案件種別</label></br>
  <select class="" name="project_type">
    <option value="">案件種別を選択してください</option>
    <option value="revenue"
    @if( old('project_type')=='revenue' ) selected  @endif
    @if( $project->project_type == 'revenue' ) selected  @endif
    >レベニュー</option>
    <option value="single"
    @if( old('project_type')=='single' ) selected  @endif
    @if( $project->project_type == 'single' ) selected  @endif
    >単発</option>
  </select></br>
  <label for="status">募集終了日</label></br>
  現在の終了予定日：</br>
  @if($project->project_reception_end)
  {{ $project['project_reception_end']->format('Y/m/d') }}
  @else
  未定です</br>
  @endif
  更新後の終了日
  <calender-component>
  </calender-component>
  <label for="amount">金額(千円単位)</label></br>
  <span>半角数字でご入力ください。</span></br>
  <input type="text" name="project_mini_amount" maxlength="5" oninput="value = value.replace(/[^0-9]+/i,'');" value="{{ old('project_mini_amount', $project->project_mini_amount) }}" />,000
  〜
  <input type="text" name="project_max_amount" maxlength="5" oninput="value = value.replace(/[^0-9]+/i,'');" value="{{ old('project_max_amount', $project->project_max_amount) }}" />,000円
  </br>
  <label for="detail">案件詳細</label></br>
  <counter-component
    :countnum = "5000"
    ex = "例：既存ブログサイトのデザインを変えたいです。優しいデザインが得意な方を募集します。"
    id = "detail"
    name = "project_detail_desc"
    message = "{{ old('project_detail_desc', $project->project_detail_desc) }}"
  ></counter-component>
  <input type="submit" name="" value="案件登録">
</form>

@endsection
