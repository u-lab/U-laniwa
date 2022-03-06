@extends("layouts.noLogin")
@section("title","500")

@section('header')
@parent
@endsection
@section('content')
<div class="board-main error-page text-center">

    @include('components.noLogin.pageTitle', ['title'=>'500エラー'])
    <p class="text-center text-xl mb-12">500 エラーです。サーバー側の処理やコードに問題があります。</p>

    <div class="mb-20">
        <a href='https://forms.gle/tShu2ho87U8ioB4U9' class="inline-block p-2 border-2 border-bg">お問い合わせ</a>
    </div>

    @include('components.messages.developer')

</div>

@endsection