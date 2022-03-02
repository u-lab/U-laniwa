@extends("layouts.hasTwitter")
@section("title","ホーム")

@section('header')
@parent
@endsection
@section('content')
@include('components.forMembers.pageTitle', ['title'=>'U-laniwa ホーム'])

<div class='w-96'></div>

<div class="belongsProject">
    {{--@include('components.forMembers.userTimeline')--}}
    <div class="userTimeline bg-bg-sub w-full p-8 rounded-3xl mb-20">
        <h2 class="text-xl">タイムライン</h2>
        <div class="tree h-96">
            @foreach ($timelines as $timeline)
            @include('components.forMembers.timelineItem',[
            'date'=>$timeline->start_date,
            'name'=>$userInfo->last_name,
            'genre'=>$timeline->genre,
            'title'=>$timeline->title])
            @endforeach


        </div>
    </div>
    <p>{{$userInfo->last_name}} {{$userInfo->first_name}}さん、こんにちは！</p>
    @if($userProjects->isEmpty())
    <h2 class="text-2xl">
        所属しているプロジェクトはありません
    </h2>
    @else
    <h2 class="text-2xl">
        あなたが所属しているプロジェクトは、 </h2>
    @foreach ($userProjects as $userProject)
    <a href="{{url('/project/'.$userProject->id)}}">
        <img src="{{url('/'.$userProject->thumbnail)}}" alt="">
        <p>タイトル:{{$userProject->title}} </p>
        <p>サブタイトル:{{$userProject->subtitle}} </p>
        <p>
            {{$userProject->start_date}}
            @empty($userProject->end_date)
            @else
            ～{{$userProject->end_date}}
            @endempty
        </p>
    </a>
    @endforeach
    @endif
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
@empty($timeline->description)
{{-- 説明は必須でない --}}
@else
<p>説明:{{$timeline->description}}</p>
@endempty
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
