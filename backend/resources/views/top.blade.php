@extends("layouts.noLogin")
@section("title","トップ")

@section('header')
@parent
@endsection
@section('content')
<img src="/img/logo.png" class='w-72 h-72 mx-auto mt-8'>
<h1 class="text-center mt-4 text-3xl ">U-laniwaへようこそ！</h1>

<x-buttons.loginButton url='/login' name='ログイン' />
<p>aaa</p>

@endsection
