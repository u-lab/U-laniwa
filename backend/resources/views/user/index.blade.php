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
@foreach ($users as $user)
<p class="text-center">{{$user->name}}</p>
@endforeach

@endsection
