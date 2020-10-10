@extends('layouts.base')

@section('title', 'プロフィール編集')

@section('scripts')
<script src="{{ secure_asset('js/app.js') }}" defer></script>
<script src="{{ secure_asset('js/direct.js') }}" defer></script>
@endsection


@section('content')
<!-- プロフィール編集画面 -->


<h3 class="c-title__page">プロフィール編集</h3>


@if ($errors->any())
  <ul class="u-font__error" role="alert">
    @foreach ($errors->all() as $error)
      <li class="u-list__none">{{ $error }}</li>
    @endforeach
  </ul>
@endif

<form class="p-form__form js-form" action="" method="post" enctype='multipart/form-data'>
  @csrf
  <input type="hidden" name="_token" value="{{ csrf_token() }}" />

  <label class="c-title__label" for="name">名前</label></br>
  <counter-short
  :countnum = "255"
  ex = "お名前をご入力ください"
  id = "name"
  name="name"
  :old = "{{json_encode(Session::getOldInput())}}"
  :db = "{{ $user }}">
  </counter-short>

  <label class="c-title__label" for="profile_icon">プロフィール画像</label></br>


  <image-preview
  icon="{{ $user->profile_icon }}"
  src="{{ $user->profile_icon }}"
  default="{{ secure_asset('/img/default_prof.png') }}">
  </image-preview>

  $imagesのなかみ:  {{ $user->profile_icon }}


  <!-- src="{{ secure_asset('storage/avatar/' . $user->profile_icon) }}" -->


  <label class="c-title__label" for="self_introduction">自己紹介文</label></br>
  <counter-component
    :countnum = "1000"
    ex = "例：エンジニア歴10年です。web制作会社を経て自社開発、5年勤めました。現在はフリーランスとして活動しています。"
    id = "self_introduction"
    name = "self_introduction"
    :old = "{{json_encode(Session::getOldInput())}}"
    :db = "{{ $user }}"
  ></counter-component>
  <div class="c-btn__panel">
    <input class="c-btn__medi js-submit" type="submit" name="profile" value="保存">
  </div>
</form>

<ul class="c-btn__end">
  <a class="c-btn__moderate" href="{{ url('/') }}/mypages/{{$user->id}}/password/edit">パスワード更新</a>
  <a class="c-btn__moderate" href="{{ url('/') }}/mypages/{{$user->id}}/email/edit">メールアドレスの変更</a>
  <a class="c-btn__moderate" href="{{ url('/') }}/mypages/withdraw">退会</a>
</ul>

@endsection
