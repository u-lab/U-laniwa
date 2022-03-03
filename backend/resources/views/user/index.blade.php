@extends("layouts.main")
@section("title","ユーザー一覧")

@section('header')
@parent
@endsection
@section('content')
@include('components.forMembers.pageTitle', ['title'=>'ユーザー一覧'])


<div class="text-center mt-12 mb-28 px-4">
    @foreach ($listedUsers as $grade=>$listedUser)

    <h1 class="text-2xl mb-8">{{$grade}}</h1>
    <div class="mx-auto w-fit">
        <div class="flex flex-wrap gap-x-12 gap-y-8 mb-20">
            @foreach($listedUser as $user)
            @include('components.forMembers.userFrame')
            @endforeach
        </div>
    </div>
    @endforeach

    <h1 class="text-2xl">{{$grade}}</h1>
    @foreach($listedUser as $user)
    <a href="{{url('/user/'.$user->id)}}">
        <img src="{{url('/'.$user->profile_photo_path)}}" alt="">
        <p>{{$user->last_name}} {{$user->first_name}}({{$user->name}})</p>
        <p>{{$user->status}}</p>
        @empty(!$user->uu_faculty)
        <p>{{$user->uu_faculty}}/{{$user->uu_major}}</p>
        @endempty
    </a>
    @endforeach

</div>


@endsection
