@extends("layouts.main")
@section("title","タイムライン")

@section('header')
@parent
@endsection
@section('content')
@include('components.forMembers.pageTitle', ['title'=>'タイムライン'])

<div class="bg-bg-sub p-8 rounded-3xl mx-auto mb-20 timeline-p" style="max-width: 1000px">
    @if($timelines)
    <p class="py-6 text-center">タイムラインはまだありません。</p>
    @else
    <div class="tree timeline">

        @foreach ($timelines as $timeline)
        @include('components.forMembers.timelineItem',[
        'start_date'=>$timeline->start_date,
        'end_date'=>$timeline->end_date,
        'name'=>$timeline->user->name,
        'genre'=>$timeline->genre->label(),
        'title'=>$timeline->title,
        'text'=>$timeline->description])
        {{-- この値でタイムラインの表示件数を変更(1件~20件) --}}
        @break ($loop->iteration == 10)
        @endforeach

    </div>
    @endif
</div>

@endsection
