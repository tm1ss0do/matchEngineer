@extends('layouts.base')

@section('title', '案件詳細')

@section('content')

退会画面です

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<a href="{{ url()->previous() }}">戻る</a>
<form class="" action="" method="post">
  @csrf
  <input type="submit" name="withdraw" value="退会">
</form>


@endsection
