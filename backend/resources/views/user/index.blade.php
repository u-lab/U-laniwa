@extends("layouts.main")
@section("title","ユーザー一覧")

@section('header')
@parent
@endsection
@section('content')
@include('components.forMembers.pageTitle', ['title'=>'ユーザー一覧'])


<div class="text-center mt-12 mb-28 px-4">
    @foreach ($listedUsers as $grade=>$listedUser)

    <h2 class="text-2xl mb-8 font-bold">{{$grade}}</h2>
    <div class="overflow-x-scroll xl:overflow-x-hidden mb-20">
        <div class="mx-auto md:w-full w-fit">
            <div class="flex flex-nowrap xl:flex-wrap gap-x-12 gap-y-8">
                @foreach($listedUser as $user)
                @include('components.forMembers.userFrame')
                @endforeach
            </div>
        </div>
    </div>

    @endforeach

</div>

@endsection
