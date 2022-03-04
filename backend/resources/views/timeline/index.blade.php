@extends("layouts.main")
@section("title","タイムライン")

@section('header')
@parent
@endsection
@section('content')
<h1 class="text-center my-8 text-3xl ">タイムライン</h1>
@foreach ($timelines as $timeline)
<p>{{$timeline->start_date}}〜{{$timeline->end_date}}</p>
<h2>タイトル: {{$timeline->title}}</h2>
<p>ジャンル: {{$timeline->genreName}}</p>
<p>名前: {{$timeline->user->name}}</p>
<p>ユーザーアイコン:</p>
<img src="{{url('/' . $timeline->user->profile_photo_path)}}" alt="">
<p>説明: {{$timeline->description}}</p>
<br><br>
{{-- この値でタイムラインの表示件数を変更(1件~10件) --}}
@break ($loop->iteration == 5)
@endforeach
@endsection
