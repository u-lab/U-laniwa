@extends("layouts.main")
@section("title","セキュリティ")

@section('header')
@parent
@endsection
@section('content')
<h1 class="text-center my-8 text-3xl ">セキュリティ</h1>
<h2>登録日: {{$registerDate}}</h2>
{{-- 開発者1でログインしている場合'-----'と表示されますがバグではないです！ --}}

@endsection
