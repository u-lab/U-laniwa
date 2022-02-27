@extends("layouts.main")
@section("title","個別ユーザー情報")

@section('header')
@parent
@endsection
@section('content')
@php
$authUser=Auth::user();
@endphp
<h1 class="text-center my-8 text-3xl ">個別ユーザー情報</h1>
@php

@endphp
@if($gate->allows('level4~', $authUser->user_role_id))
あなたは本入部以上のため、すべての情報の閲覧が可能です
@else
あなたは本入部以下のため、一部の情報は閲覧できません
@endif

@endsection
