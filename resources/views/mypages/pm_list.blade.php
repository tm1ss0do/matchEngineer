@extends('layouts.base')

@section('title', 'パブリックメッセージ一覧')

@section('content')

パブリックメッセージ一覧

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@foreach ( $publics as $public)
    <p>{{ $public->id }}</p>
    <li>案件名：{{ $public->project->project_title }}</li>
    <li>{{ $public->user->name }}</li>
    <li>{{ $public->content }}</li>
@endforeach


@endsection
