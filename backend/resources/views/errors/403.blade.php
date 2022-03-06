@extends("layouts.noLogin")
@section("title","403")

@section('header')
@parent
@endsection
@section('content')
<div class="board-main error-page text-center">

    @include('components.noLogin.pageTitle', ['title'=>'403エラー'])
    <p class="text-center text-xl mb-12">403 エラーです。このページへの入構は許可されていないみたいです。</p>

    <div class="mb-20">
        <a href='https://forms.gle/tShu2ho87U8ioB4U9' class="inline-block p-2 border-2 border-bg">お問い合わせ</a>
    </div>

    @include('components.messages.developer')

</div>

@endsection