@extends("layouts.main")
@section("title","手続き")
@php
$user=Auth::user();
@endphp

@section('header')
@parent
@endsection
@section('content')
@include('components.forMembers.pageTitle', ['title'=>'手続きページ'])

<div class="flex gap-4 w-fit mx-auto">
    <a href="{{url('/security')}}" class="inline-block px-4 py-2 bg-bg-sub rounded-xl">セキュリティ</a>
    @if($gate->allows('level4~'))
    <form class="" method="POST" action="{{url('/procedure/regenerateInviteCode')}}">
        @csrf
        <input type="submit" class="inline-block px-4 py-2 !bg-bg-sub rounded-xl" value="招待コード再生成">
    </form>
    @endif
</div>

<form class="w-fit mx-auto my-4" method="POST" action="/logout">
    @csrf
    <input type="submit" class="text-white  py-2 px-2" value="ログアウト">
</form>

<div class="wrapper">
    <div class="mb-12">
        <h2 class="mb-2">招待コード</h2>
        @empty($inviteCode)
        <p class="ml-4">招待コードはありません。</p>
        @else
        <input type="text" readonly='true' class="ml-4 w-96" value='{{$inviteCode->code}}'>
        @endempty
    </div>

    <div class="mb-12">
        <h2 class="mb-4">{{$user->name}}さんの招待ユーザー</h2>
        <div class="flex flex-col gap-2 ml-4">
            @foreach ($invitedUsers as $invitedUser)
            <div>
                <img src="{{url('/' . $invitedUser->profile_photo_path)}}" alt=""
                    class="w-12 h-12 rounded-full inline-block">
                <p class="inline-block pl-4">{{$invitedUser->name}}</p>
                {{-- この値で表示数を変更(1件~20件) --}}
            </div>
            @break ($loop->iteration == 3)
            @endforeach
        </div>
    </div>
</div>
@endsection
