@extends('layouts.base')

@section('title', 'プロフィール編集画面')

@section('content')
<!-- プロフィール編集画面 -->

プロフィール編集画面

<form class="" action="" method="post" enctype='multipart/form-data'>
  @csrf
  <label for="name">名前</label></br>
  <input id="name" type="text" name="name" value="{{ old('name', $user->name) }}"></br>
  <label for="profile_icon">プロフィール画像</label></br>
  <input id="profile_icon" type="file" name="profile_icon" value="{{ old('profile_icon', $user->profile_icon) }}"></br>
  <label for="self_introduction">自己紹介文</label></br>
  <counter-component
    :countnum = "1000"
    ex = "例：エンジニア歴10年です。web制作会社を経て自社開発、5年勤めました。現在はフリーランスとして活動しています。"
    id = "self_introduction"
    name = "self_introduction"
    message = "{{ old('self_introduction', $user->self_introduction) }}"
  ></counter-component>
  <input type="submit" name="profile" value="保存">
</form>

<a href="#">パスワード更新</a>
<a href="#">メールアドレスの変更</a>

@endsection
