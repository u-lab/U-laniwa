@extends("layouts.main")
@section("title","ユーザー一覧")

@section('header')
@parent
@endsection
@section('content')
@include('components.forMembers.pageTitle', ['title'=>'ユーザー一覧'])


<div class="text-center my-12 px-20">
    @foreach ($listedUsers as $grade=>$listedUser)
    <h1 class="text-2xl mb-8">{{$grade}}</h1>
    <div class="mx-auto w-fit">
        <div class="flex flex-wrap gap-x-20 gap-y-8 mb-20">
            @foreach($listedUser as $user)
            <a href="{{url('/user/'.$user->id)}}" class="flex bg-bg-main rounded-2xl p-8 hover:opacity-80"
                style="width: calc(50% - 2.5rem); transition: .2s;">
                <div class="flex items-center w-1/2">
                    <img src="{{url('/'.$user->profile_photo_path)}}" alt="">
                </div>
                <div class="px-4 text-left w-1/2">
                    <p class="px-2 mb-1 bg-bg rounded-full inline-block">なまえ</p>
                    <p class="text-lg pl-2 mb-2">{{$user->name}}</p>
                    <p class="px-2 mb-1 bg-bg rounded-full inline-block">一言コメント</p>
                    <p class="text-lg pl-2 mb-2">{{$user->status}}</p>
                    @empty(!$user->uu_faculty)
                    <p class="px-2 mb-1 bg-bg rounded-full inline-block">学部/学科</p>
                    <p class="text-lg pl-2 mb-2">{{$user->uu_faculty}}/{{$user->uu_major}}</p>
                    @endempty
                </div>
            </a>
            {{--@include('components.forMembers.userFrame', [
            'id'=>$user->id,
            'path'=>$user->profile_photo_path,
            'name'=>$user->name,
            'status'=>$user->status,
            'faculty'=>$user->uu_faculty,
            'major'=>$user->uu_major])--}}
            @endforeach
        </div>
    </div>
    @endforeach
</div>


@endsection
