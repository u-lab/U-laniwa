@extends("layouts.main")
@section("title","ユーザー一覧")

@section('header')
@parent
@endsection
@section('content')
@php
/*
* $users:ユーザー情報
* $projects:プロジェクト情報
*/
@endphp
<h1 class="text-center my-8 text-3xl kiwi-maru">U-laniwa</h1>


<div class="text-center my-12">
    <h2 class="text-2xl">ユーザー</h2>
    @foreach ($users as $user)
    <p>{{$user->name}}</p>
    @endforeach
</div>
<div class="text-center my-12">
    <h2 class="text-2xl">プロジェクト</h2>
    @foreach ($projects as $project)
    <p>{{$project->name}}</p>
    @endforeach
</div>

@endsection
