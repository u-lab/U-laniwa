@extends("layouts.main")
@section("title","セキュリティ")

@section('header')
@parent
@endsection
@section('content')
@include('components.forMembers.pageTitle', ['title'=>'セキュリティ'])
{{-- inputタグのvalueに入れておく用 --}}
@include('components.forMembers.pageSubTitle', ['subTitle'=>'セキュリティ情報変更'])
<p class="text-lg md:ml-4 ml-2 px-2 mb-2 bg-bg rounded-full inline-block">メールアドレス</p>
@if (count($errors) > 0)
@error('email')
<td style="color: red;">{{$message}}</td>
@enderror
@error('email_confirm')
{{-- TODO:エラーメッセージなぜか赤色にならない 機能的には問題なし--}}
{{--修正しました ばいてつ--}}
<p class="text-red-600 inline-block">※メールアドレスが一致していません</p>
@enderror
@endif
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
<p class="text-lg md:ml-4 ml-2 px-2 mb-2 bg-bg rounded-full inline-block">パスワード</p>
@if (count($errors) > 0)
@error('password')
<td>{{$message}}</td>
@enderror
@error('password_confirm')
<p class="text-red-600 inline-block">※パスワードが一致していません</p>
@enderror
@endif
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
<div class="mb-20">
    @include('components.forMembers.pageSubTitle', ['subTitle'=>'ユーザー情報'])
    <p class="text-xl">ユーザーID: {{$user->id}}</p>
    <p class="text-xl">ユーザー権限ID: {{$user->user_role_id}}</p>
    <p class="text-xl">登録日: {{$user->created_at->format('Y/n/j')}}</p>
</div>

<div class="text-center">
    <h2 class="my-4 font-bold py-2 px-4 border-4 border-red-400 inline-block mx-auto">DangerZone</h2>
    <div class="flex items-center justify-center mb-12">
        @if($gate->allows('level4~'))
        <form method="POST" action="/procedure/retire" class="mx-2">
            @csrf
            <input type="submit" class="text-white py-2 px-2  " style="background-color: red!important" value="引退する"
                onclick="retireEvent()">
        </form>
        @endif
        <form method="POST" action="/procedure/withdraw" class="mx-2">
            @csrf
            <input type="submit" class="text-white  py-2 px-2 " style="background-color: red!important" value="退部する"
                onclick="withdrawEvent()">
        </form>

    </div>
</div>

<script>
    function retireEvent() {
        alert('本当に実行しますか？\n{{$user->name}}さんはOB・OG権限になります。\n(この操作は取り消せません。)')
    }
    function withdrawEvent() {
        alert('本当に実行しますか？\n{{$user->name}}さんはU-laniwaへログインができなくなります。\n(この操作は取り消せません。)')
    }
</script>
@endsection
