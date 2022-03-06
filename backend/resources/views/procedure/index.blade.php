@extends("layouts.main")
@section("title","手続き")

@section('header')
@parent
@endsection
@section('content')
<h1 class="text-center my-8 text-3xl ">手続き</h1>


<a href="{{url('/security')}}">セキュリティ</a>
@if($gate->allows('level4~'))
<form class="" method="POST" action="{{url('/procedure/regenerateInviteCode')}}">
    @csrf
    <input type="submit" class="text-black" value="招待コード再生成">
</form>
@endif
<form class="mx-2" method="POST" action="/logout">
    @csrf
    <input type="submit" class="text-white  py-2 px-2" value="ログアウト">
</form>
@empty($inviteCode)
<h2>招待コードはありません</h2>
@else
<h2>招待コード: {{$inviteCode->code}}</h2>
@endempty

<h2>招待ユーザー</h2>
@foreach ($invitedUsers as $invitedUser)
<img src="{{url('/' . $invitedUser->profile_photo_path)}}" alt="">
<p>{{$invitedUser->name}}</p>
{{-- この値で表示数を変更(1件~20件) --}}
@break ($loop->iteration == 3)
@endforeach

@endsection
