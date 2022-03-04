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
@if($gate->allows('level7~'))
あなたは本入部以上のため、すべての情報の閲覧が可能です
@else
あなたは本入部以下のため、一部の情報は閲覧できません
@endif

<h2>名前</h2>
<p>{{$user->name}}</p>
<h2>プロフィール画像</h2>
<img src="{{url('/' . $user->profile_photo_path)}}" alt="">
<h2>一言コメント</h2>
<p>{{$user->status}}</p>
<h2>学部/学科</h2>
<p>{{$user->uu_faculty}}/{{$user->uu_major}}</p>


<h1>基本情報</h1>
<h2>学年</h2>
<p>{{$user->grade}}</p>
<h2>性別</h2>
<p>{{$user->gender}}</p>
<h2>権限レベル</h2>
<p>{{$user->user_role_id}}</p>
{{-- 宇大生・他大生・社会人の条件分岐 --}}
@if ($user->company_meta)
<h2>会社情報</h2>
<p>{{$user->profession}}</p>
@elseif ($user->university_meta)
<h2>大学情報</h2>
<p>{{$user->profession}}</p>
@else
<h2>学部</h2>
<p>{{$user->profession}}</p>
@endif
<h2>出身</h2>
<p>{{$user->birth_area}}</p>
<h2>現住所</h2>
<p>{{$user->live_area}}</p>
<h2>兼部・サークル</h2>
<p>{{$user->group_affiliation}}</p>


<h1>パーソナルデータ</h1>
@if ($user->is_publish_birth_day)
<h2>誕生日</h2>
<p>{{$user->birth_day}}</p>
@endif
<h2>趣味</h2>
<p>{{$user->hobbies}}</p>
<h2>興味</h2>
<p>{{$user->interests}}</p>
<h2>座右の銘</h2>
<p>{{$user->motto}}</p>


<h1>情報</h1>
<h2>slack名</h2>
<p>{{$user->slack_name}}</p>
<h2>Discord名</h2>
<p>{{$user->discord_name}}</p>
<h2>LINE名</h2>
<p>{{$user->line_name}}</p>
<h2>GitHubID</h2>
<p>{{$user->github_id}}</p>


<h1>Mylink</h1>
@foreach ($links as $link)
<a href="{{$link->url}}">
    <img src="{{'http://www.google.com/s2/favicons?sz=64&domain=' . $link->url}}" alt="">
    <h2>{{$link->name}}</h2>
    @if ($link->description)
    <p>{{$link->description}}</p>
    @endif
</a>
@endforeach


<h1>所属プロジェクト</h1>
@foreach ($projects as $project)
<a href="{{url('/project/' . $project->project_id)}}">
    <img src="{{url('/' . $project->thumbnail)}}" alt="">
    <h2>{{$project->title}}</h2>
    <h3>{{$project->subtitle}}</h3>
    <p>{{$project->start_date}} ~ {{$project->end_date}}</p>
</a>
@endforeach


<h1>タイムライン</h1>
@foreach ($events as $event)
<p>{{$event->start_date}} ~ {{$event->end_date}}</p>
<h2>{{$event->title}}</h2>
<p>{{$event->description}}</p>
@endforeach


<h1>関連ユーザ</h1>
@foreach ($relatedUsers as $relatedUser)
<a href="{{url('/user/' . $relatedUser->user_id)}}">
    <img src="{{url('/' . $relatedUser->profile_photo_path)}}" alt="">
    <p>{{$relatedUser->name}}</p>
    <p>{{$relatedUser->profession}}</p>
</a>
@endforeach
@endsection
