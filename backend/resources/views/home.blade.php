@extends("layouts.hasTwitter")
@section("title","ホーム")

@section('header')
@parent
@endsection
@section('content')
@include('components.forMembers.pageTitle', ['title'=>'U-laniwa ホーム'])

<div class='w-96'></div>

<div class="belongsProject">
    <p>{{$userInfo->last_name}} {{$userInfo->first_name}}さん、こんにちは！</p>
    <p>
        @if($userProjects->isEmpty())
        所属しているプロジェクトはありません
        @else
        あなたが所属しているプロジェクトは、<br>
        @foreach ($userProjects as $userProject)
        {{$userProject->project->title}} <br>
        @endforeach
        @endif
    </p>
</div>

<h2 class="text-3xl">タイムライン</h2>
@foreach($timelines as $timeline)
<p>
    {{$timeline->start_date}}
    @empty($timeline->end_date)
    @else
    ～{{$timeline->end_date}}
    @endempty
</p>
<p>名前:{{$timeline->user->name}}</p>
<p>タイトル:{{$timeline->title}}</p>
<p>説明:{{$timeline->description}}</p>
<p>ジャンル:{{$timeline->genre->label()}}</p>
@endforeach

@php
//てつくんへ、このphpからendphpまでは消して大丈夫です。取れる値やその確認時に書いたコードを一応残しているだけです。
/**
* $userInfo→ログインしているユーザーの情報 nullabnle
* $userMajor→ログインしているユーザーの学部学科 nullabnle
* $userBirthArea→ログインしているユーザーの出身地 nullabnle
* $userLiveAreaログインしているユーザーの現住地 nullabnle
* $userMajor→ログインしているユーザーの学部学科 nullabnle
* $userProjects→ログインしているユーザーが所属してるプロジェクト nullabnle
* $timelines→U-labユーザー全体のタイムライン直近10件(start_dateが新しい順) nullabnle
*
*
*/
// var_dump($userInfo);//userInfoがないユーザーも居ます。(登録したての人など)
// var_dump($userMajor->faculty_id->label());//userInfoがないユーザーも居ます。(登録したての人など)
// var_dump($userMajor->name);//userInfoがないユーザーも居ます。(登録したての人など)
// var_dump($userBirthArea->municipality);
// var_dump($userLiveArea->municipality);


// echo($userBirthArea->country_code->label());//userInfoがないユーザーも居ます。(登録したての人など)
// echo($userBirthArea->prefecture_code->label());//userInfoがないユーザーも居ます。(登録したての人など)
// echo($userBirthArea->municipality);//userInfoがないユーザーも居ます。(登録したての人など)
// var_dump($userProjects);

// if($userProjects->isEmpty()){
// echo "所属しているプロジェクトはありません";
// }else{
// foreach ($userProjects as $userProject) {
// echo "プロジェクトタイトル:";
// echo $userProject->project->title;
// }
// }
@endphp

@endsection
