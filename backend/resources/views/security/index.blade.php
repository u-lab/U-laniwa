@extends("layouts.main")
@section("title","セキュリティ")

@section('header')
@parent
@endsection
@section('content')
<h1 class="text-center my-8 text-3xl ">セキュリティ</h1>
{{-- inputタグのvalueに入れておく用 --}}
<h2>メールアドレス: {{$user->email}}</h2>

<h2>登録日: {{$user->created_at->format('Y/n/j')}}</h2>

@endsection
