@extends("layouts.noLogin")
@section("title","リリースノート")

@section('header')
@parent
@endsection
@section('content')
@include('components.noLogin.pageTitle', ['title'=>'リリースノート'])

<div class="tree h-96">

    @include('components.noLogin.treeContent',[
    'date'=>'2022年03月05日',
    'title'=>'作りました',
    'text'=>'機能を追加'])

    @include('components.noLogin.treeContent',[
    'date'=>'2022年03月05日',
    'title'=>'作りました',
    'text'=>'機能を追加'])

    @include('components.noLogin.treeContent',[
    'date'=>'2022年03月05日',
    'title'=>'作りました',
    'text'=>'機能を追加'])

</div>

@endsection
