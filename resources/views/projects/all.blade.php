@extends('layouts.base')

@section('title', '案件一覧')
@section('scripts')
<script src="{{ secure_asset('js/app.js') }}" defer></script>
<script src="{{ secure_asset('js/pagetop.js') }}" defer></script>
@endsection

@section('content')

    <project-list
    url="{{ url('/') }}"
    ></project-list>


@endsection

@section('back')
  <a class="c-btn__moderate" href="{{ route('mypage.registered') }}">マイページへ</a>
@endsection
