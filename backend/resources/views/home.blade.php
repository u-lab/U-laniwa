@extends("layouts.hasTwitter")
@section("title","ホーム")

@section('header')
@parent
@endsection
@section('content')
@include('components.forMembers.pageTitle', ['title'=>'ホーム'])

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

    <div class="basicInformation h-fit p-6 border-4 border-bg rounded-2xl relative mb-16">
        <h2 class="absolute py-2 px-6 bg-bg rounded-full text-base font-bold" style="top: -1.125rem;">現在進行中のプロジェクト</h2>
        @if($userProjects->isEmpty())
        <p class="py-6 text-center">現在進行中のプロジェクトはありません。</p>
        @else
        <div class=" flex flex-wrap gap-x-12 my-8">
            @foreach($userProjects as $userProject)
            <a href="{{url('/project/' . $userProject->project_id)}}" target="_blank" rel="noopener"
                class="bg-bg-sub text-center rounded-2xl p-6 hover:opacity-80 userFrame"
                style="transition: .2s; width: 500px">
                <img src="{{url('/' . $userProject->thumbnail)}}" alt="" class="rounded mb-8">
                <h3 class="ml-4 text-xl font-bold mb-2">{{$userProject->title}}</h3>
                <p class="mb-2">{{$userProject->subtitle}}</p>
                <p class="text-sm mb-4">{{$userProject->start_date}} 〜 {{$userProject->end_date}}</p>
            </a>
            @endforeach
        </div>
        @endif
    </div>
</div>
@endsection
