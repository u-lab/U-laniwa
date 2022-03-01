@extends("layouts.main")
@section("title","ユーザー一覧")

@section('header')
@parent
@endsection
@section('content')
<h1 class="text-center my-8 text-3xl ">U-laniwa</h1>


<div class="text-center my-12">
    <h2 class="text-2xl">ユーザー</h2>
    @foreach ($listedUsers as $grade=>$listedUser)
    <h1 class="text-2xl">{{$grade}}</h1>
    @foreach($listedUser as $user)
    <a href="{{url("/".$user->id)}}">
        <img src="{{$user->profile_photo_path}}" alt="">
        <p>{{$user->name}}</p>
        <p>{{$user->status}}</p>
        @empty(!$user->uuMajor)
        <p>{{$user->uuFaculty}}/{{$user->uuMajor}}</p>
        @endempty
    </a>
    @endforeach
    @endforeach
</div>


@endsection
