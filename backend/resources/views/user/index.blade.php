@extends("layouts.main")
@section("title","ユーザー一覧")

@section('header')
@parent
@endsection
@section('content')
<h1 class="text-center my-8 text-3xl ">U-laniwa</h1>


<div class="text-center my-12 pr-12">
    <h2 class="text-2xl mb-8">ユーザー</h2>
    @foreach ($listedUsers as $grade=>$listedUser)
    <h1 class="text-2xl mb-4">{{$grade}}</h1>
    <div class="overflow-x-scroll mb-10">
        <div class="flex gap-10 flex-nowrap w-fit">
            @foreach($listedUser as $user)
            <a href="{{url('/user/'.$user->id)}}" style="width: 500px">
                <img src="{{url('/'.$user->profile_photo_path)}}" alt="">
                <p>{{$user->name}}</p>
                <p>{{$user->status}}</p>
                @empty(!$user->uu_faculty)
                <p>{{$user->uu_faculty}}/{{$user->uu_major}}</p>
                @endempty
            </a>
            @endforeach
        </div>
    </div>
    @endforeach
</div>


@endsection
