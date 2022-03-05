@extends("layouts.hasTwitter")
@section("title","ホーム")

@section('header')
@parent
@endsection
@section('content')
@include('components.forMembers.pageTitle', ['title'=>'ホーム'])


<div class='w-96'></div>

<div class="belongsProject">
    <div class="userTimeline bg-bg-sub w-full p-8 rounded-3xl mb-20">
        <h2 class="text-xl">タイムライン</h2>
        <div class="tree">

            @foreach ($timelines as $timeline)
            @include('components.forMembers.timelineItem',[
            'start_date'=>$timeline->start_date,
            'end_date'=>$timeline->end_date,
            'name'=>$timeline->user->name,
            'genre'=>$timeline->genre->label(),
            'title'=>$timeline->title,
            'text'=>$timeline->description])
            @endforeach

        </div>
    </div>
    @if($userProjects->isEmpty())
    <h2 class="text-2xl">
        現在進行中のプロジェクトはありません
    </h2>
    @else
    <h2 class="text-2xl">
        現在進行中のプロジェクトは </h2>
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
@endsection
