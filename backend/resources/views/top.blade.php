@extends("layouts.noLogin")
@section("title","トップ")

@section('header')
@parent
@endsection
@section('content')
<div class="main-wrapper flex items-center justify-center">
    <div>
        <div class="py-8">
            <img src="/img/logo.png" class='w-48 h-48 mx-auto'>
        </div>
        <h1 class="text-center mb-6 ">U-laniwaへようこそ！</h1>

        <div class="flex justify-center gap-4 mb-8">
            <x-buttons.loginButton url='/login' name='ログイン' />
            <x-buttons.loginButton url='/register' name='U-laniwaに登録' />
        </div>

        <div class="wrapper">
            <h2 class="mb-4">U-laniwaとは？</h2>
            <p class="ml-6 mb-16">（尚史先輩の何からのリンク？gitとか）が中心となって制作された学生団体U-labに所属する内部メンバー向けに制作されたU-labの内向けサービスです。</p>

            <h2 class="mb-4">U-laniwaが想定しているこのサービスの使い方</h2>
            <p class="ml-6 mb-16">
                U-labにいるメンバーのプロフィールを見たり、終了したproject、現在進行中のprojectの進行状況を確認することができます。U-laniwaのサービスを使うことでprojectへの参加申請も送ることができます。
            </p>
        </div>
    </div>
</div>

@endsection
