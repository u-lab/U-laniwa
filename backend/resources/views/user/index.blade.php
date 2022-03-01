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
<h1 class="text-center my-8 text-3xl ">U-laniwa</h1>


<div class="text-center my-12">
    <h2 class="text-2xl">ユーザー</h2>
    @foreach ($users as $user)
    {{-- <img src="{{}}" alt=""> --}}
    <p>{{$user->profile_photo_path}}</p>
    <p>{{$user->userInfo->status}}</p>
    <p>{{$user->name}}</p>
    @empty(!$user->userInfo->uuMajor)
    <p>{{$user->userInfo->uuFaculty}}/{{$user->userInfo->uuMajor}}</p>
    @endempty
    @endforeach
</div>


@endsection
