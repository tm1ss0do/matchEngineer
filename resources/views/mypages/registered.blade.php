@extends('layouts.base')

@section('title', '案件詳細')

@section('content')

登録済み案件一覧です。

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@endsection
