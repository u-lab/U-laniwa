@extends("layouts.main")
@php
$name = $userInfo->last_name." ".$userInfo->first_name;
@endphp
@section("title", $name)

@section('header')
@parent
@endsection
@section('content')
@php
$authUser=Auth::user();
@endphp
{{--<h1 class="text-center my-8 text-3xl ">個別ユーザー情報</h1>--}}
@include('components.forMembers.pageTitle', ['title'=>$name])

@if($gate->allows('level7~'))
あなたは本入部以上のため、すべての情報の閲覧が可能です
@else
あなたは本入部以下のため、一部の情報は閲覧できません
@endif

@if ($userInfo->user_id == $authUser->id)
<a href='/user/edit' class="block p-10 bg-bg">edit</a>
@endif

{{--<div class="text-center my-10 aaa">
    <p>{{$userInfo->description}}</p>
    <p>{{$userInfo->grade->label()}}年 /
        性別 : {{$userInfo->gender->label()}}</p>
    <p>{{$userInfo->status}}</p>
    <a href='https://github.com/{{$userInfo->github_id}}' target="_blank" rel="noopener" class="inline-block">
        GitHub : <span class="text-blue-700">{{$userInfo->github_id}}</span></a>
    <p>Line name : {{$userInfo->line_name}}</p>
    <p>slack name : {{$userInfo->slack_name}}</p>
    <p>discord name : {{$userInfo->discord_name}}</p>
    <p>hobbies : {{$userInfo->hobbies}}</p>
    <p>interests : {{$userInfo->interests}}</p>
    <p>motto : {{$userInfo->motto}}</p>
</div>--}}


@endsection
