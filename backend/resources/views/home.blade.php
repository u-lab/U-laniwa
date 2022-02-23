@extends("layouts.main")
@section("title","ホーム")

@section('header')
@parent
@endsection
@section('content')
<h1 class="text-center my-8 text-3xl ">ホーム</h1>
@php
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
@endphp
@php
var_dump($userInfo->hobbies);//userInfoがないユーザーも居ます。(登録したての人など)
// var_dump($userMajor->faculty_id->label());//userInfoがないユーザーも居ます。(登録したての人など)
// var_dump($userMajor->name);//userInfoがないユーザーも居ます。(登録したての人など)
echo($userBirthArea->country_code->label());//userInfoがないユーザーも居ます。(登録したての人など)
echo($userBirthArea->prefecture_code->label());//userInfoがないユーザーも居ます。(登録したての人など)
echo($userBirthArea->municipality);//userInfoがないユーザーも居ます。(登録したての人など)
// var_dump($userMajor);//userInfoがないユーザーも居ます。(登録したての人など)
if(empty($userProjects)){
echo "所属しているプロジェクトはありません";
}
// var_dump($timelines);
@endphp

@endsection
