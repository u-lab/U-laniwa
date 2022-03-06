@extends("layouts.main")
@section("title","セキュリティ")

@section('header')
@parent
@endsection
@section('content')
@include('components.forMembers.pageTitle', ['title'=>'セキュリティ'])
{{-- inputタグのvalueに入れておく用 --}}
@include('components.forMembers.pageSubTitle', ['subTitle'=>'セキュリティ情報変更'])
<p class="text-sm xl:text-base px-2 mb-1 bg-bg rounded-full inline-block">メールアドレス</p>
<form method="POST" action="/security/update/email">
    @csrf
    <div class="flex flex-wrap items-center mb-2">
        <p class="lg:w-64 font-bold">メールアドレス</p>
        <input type="email" name="email" autocomplete="off" placeholder="新しいメールアドレス" value="{{$user->email}}"
            style="width: 400px">
    </div>
    <div class="flex flex-wrap items-center">
        <p class="lg:w-64  font-bold">メールアドレス(確認用)</p>
        <input type="email" name="email_confirm" style="width: 400px">
    </div>
    <div class="ml-20 mt-4 mb-20">
        <input type="submit" class="text-black" style="border-radius:4px" value="メールアドレスを変更する">
    </div>
</form>
<p class="text-sm xl:text-base px-2 mb-1 bg-bg rounded-full inline-block">パスワード</p>
<form method="POST" action="/security/update/password">
    @csrf
    <div class="flex flex-wrap items-center mb-2">
        <p class="lg:w-64 font-bold">パスワード</p>
        <input type="password" name="password" autocomplete="off" placeholder="新しいパスワード" style="width: 400px">
    </div>
    <div class="flex flex-wrap items-center">
        <p class="lg:w-64  font-bold">パスワード(確認用)</p>
        <input type="password" name="password_confirm" style="width: 400px">
    </div>
    <div class="ml-20 mt-4 mb-20">
        <input type="submit" class="text-black" style="border-radius:4px" value="パスワードを変更する">
    </div>
</form>
@include('components.forMembers.pageSubTitle', ['subTitle'=>'ユーザー情報'])
<p class="text-xl">ユーザーID: {{$user->id}}</p>
<p class="text-xl">ユーザー権限ID: {{$user->user_role_id}}</p>
<p class="text-xl">登録日: {{$user->created_at->format('Y/n/j')}}</p>

@include('components.forMembers.pageSubTitle', ['subTitle'=>'DangerZone'])
<div class="flex items-center justify-center mb-12">
    <form class="mx-2" method="POST" action="/logout">
        @csrf
        <input type="submit" class="text-white  py-2 px-2" value="ログアウト">
    </form>
    <form method="POST" action="/procedure/retire" class="mx-2">
        @csrf
        <input type="submit" class="text-white  py-2 px-2 " style="background-color: red!important" value="退部する"
            onclick="retireEvent()">
    </form>
    @if($gate->allows('level4~'))
    <form method="POST" action="/procedure/withdraw" class="mx-2">
        @csrf
        <input type="submit" class="text-white py-2 px-2  " style="background-color: red!important" value="引退する"
            onclick="retireEvent()">
    </form>
    @endif
</div>

<script>
    function retireEvent() {
        alert('本当に実行しますか？\n(この操作は取り消せません。)')
    }
</script>
@endsection
