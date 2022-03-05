@extends("layouts.noLogin")
@section("title","トップ")

@section('header')
@parent
@endsection
@section('content')
<div class="main-wrapper flex items-center justify-center">
    <div>
        <div class="py-8">
            <img src="/img/ulaniwa_logo.svg" class='w-48 h-48 mx-auto'>
        </div>
        <h1 class="text-center mb-6 ">U-laniwaへようこそ！</h1>

        <div class="flex justify-center gap-4 mb-8">
            <x-buttons.loginButton url='/login' name='ログイン' />
            <x-buttons.loginButton url='/register' name='U-laniwaに登録' />
        </div>

        <div class="wrapper">
            <h2 class="mb-4">U-laniwaとは？</h2>
            <p class="ml-6 mb-16">宇都宮大学非公式学生団体U-labに所属するU-lab民向けのサービスです！</p>

            <h2 class="mb-4">できること</h2>
            <p class="ml-6 mb-16">
                U-labにいるメンバーのプロフィールを見たり、U-lab内プロジェクトの進行状況の確認(※今後実装予定)ができます。<br>
                U-labのお知らせ(※今後実装予定)やU-labメンバーの傾向閲覧、各種手続き(※今後実装予定)などもできます。
            </p>
            <h2 class="mb-4">おことわり</h2>
            <p class="ml-6 mb-16">
                このサービスはU-labの関係者向けサービスです。登録にはU-lab本入部以上のユーザーが発行できる招待コードが必要です。
            </p>
        </div>
    </div>
</div>

@endsection