@extends("layouts.main")
@section("title","カレンダー")

@section('header')
@parent
@endsection
@section('content')
@include('components.forMembers.pageTitle', ['title'=>'カレンダー'])

<div class="calender pc mb-20 lg:block hidden">
    <iframe
        src="https://calendar.google.com/calendar/embed?height=800&wkst=1&bgcolor=%23ffffff&ctz=Asia%2FTokyo&showTitle=1&mode=MONTH&src=dWxhYjA4MTJAZ21haWwuY29t&color=%23AD1457"
        style="border-width:0" width="100%" height="800" frameborder="0" scrolling="no"
        class="mx-auto calender-height"></iframe>
</div>

<div class="calender sp mb-10 lg:hidden block">
    <iframe
        src="https://calendar.google.com/calendar/embed?height=600&wkst=1&bgcolor=%23ffffff&ctz=Asia%2FTokyo&showTitle=1&mode=AGENDA&src=dWxhYjA4MTJAZ21haWwuY29t&color=%23AD1457"
        style="border-width:0; margin: 0 auto;" width="300" height="600" frameborder="0" scrolling="no"></iframe>
</div>

@endsection
