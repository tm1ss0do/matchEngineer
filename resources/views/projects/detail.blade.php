@extends('layouts.base')

@section('title', '案件詳細')

@section('content')

案件詳細画面


<p>{{ $project->project_title }}</p>

<p>{{ $user->name }}</p>

<p>{{ $publicmsgs }}</p>



@endsection
