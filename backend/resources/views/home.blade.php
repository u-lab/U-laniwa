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
// var_dump($userInfo);//userInfoがないユーザーも居ます。(登録したての人など)
// var_dump($userMajor->faculty_id->label());//userInfoがないユーザーも居ます。(登録したての人など)
// var_dump($userMajor->name);//userInfoがないユーザーも居ます。(登録したての人など)


var_dump($userBirthArea->municipality);
var_dump($userLiveArea->municipality);


// echo($userBirthArea->country_code->label());//userInfoがないユーザーも居ます。(登録したての人など)
// echo($userBirthArea->prefecture_code->label());//userInfoがないユーザーも居ます。(登録したての人など)
// echo($userBirthArea->municipality);//userInfoがないユーザーも居ます。(登録したての人など)
// var_dump($userProjects);

if($userProjects->isEmpty()){
echo "所属しているプロジェクトはありません";
}else{
foreach ($userProjects as $userProject) {
echo "プロジェクトタイトル:";
echo $userProject->project->title;
}
}
// var_dump($timelines);
@endphp

@endsection
