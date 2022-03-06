@extends("layouts.main")
@section("title","カレンダー")

@section('header')
@parent
@endsection
@section('content')
@include('components.forMembers.pageTitle', ['title'=>'カレンダー'])

<div class="calender mb-20">
    <iframe
        src="https://calendar.google.com/calendar/embed?height=800&wkst=1&bgcolor=%23ffffff&ctz=Asia%2FTokyo&showTitle=1&mode=MONTH&src=dWxhYjA4MTJAZ21haWwuY29t&color=%23AD1457"
        style="border-width:0" width="1200" height="800" frameborder="0" scrolling="no" class="mx-auto"></iframe>
</div>

@endsection
