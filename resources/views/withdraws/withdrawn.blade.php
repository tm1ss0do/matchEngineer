@extends('layouts.base')

@section('title', '案件詳細')

@section('content')

退会しました。
ご利用いただきありがとうございました。

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<a href="{{ url('/') }}/projects/all">案件一覧へ</a>


@endsection
