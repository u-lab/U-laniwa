@extends("layouts.hasTwitter")
@section("title","ホーム")

@section('header')
@parent
@endsection
@section('content')
@include('components.forMembers.pageTitle', ['title'=>'U-laniwa ホーム'])

<div class='w-96'></div>

<div class="belongsProject">
    <p>
        @if($userProjects->isEmpty())
        所属しているプロジェクトはありません
        @else
        @foreach ($userProjects as $userProject)
        プロジェクトタイトル: {{$userProject->project->title}} <br>
        @endforeach
        @endif
    </p>
</div>



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
