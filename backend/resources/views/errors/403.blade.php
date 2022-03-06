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

    <div class="inline-block rounded-xl bg-bg-sub p-12 mx-auto">
        <p class="text-lg font-bold mb-2">小畑尚史先輩の秘密①</p>
        <p>面白いと思うことは言語学</p>
    </div>

</div>

@endsection
