@extends("layouts.noLogin")
@section("title","クレジット")

@section('header')
@parent
@endsection
@section('content')
@include('components.noLogin.pageTitle', ['title'=>'クレジット'])

<div class="wrapper mb-20 leading-7">
    <p class="text-center text-ls">使用しているライブラリや素材のライセンス</p>
    <div class="text-center my-4">
        <h3 class="inline-block p-2 mb-2 border">PHP フレームワーク、ライブラリ</h3>
    </div>

    <div class="text-center mb-8">
        <h2 class="deco">Laravel</h2><br>
        <a href="https://laravel-guide.readthedocs.io/en/latest/license/" target="_blank" rel="noopener">The MIT License
            (MIT) Copyright © Taylor Otwell</a>
    </div>

    @include('components.noLogin.credit',[
    'title'=>'laravel-backup',
    'text'=>'※DB バックアップで使用',
    'copyright'=>'Spatie bvba info@spatie.be',
    'link'=>'https://github.com/spatie/laravel-backup/blob/main/LICENSE.md'])

    @include('components.noLogin.credit',[
    'title'=>'larastan',
    'text'=>'※静的解析で使用',
    'copyright'=>'Nuno Maduro enunomaduro@gmail.com',
    'link'=>'https://github.com/nunomaduro/larastan/blob/master/LICENSE.md'])

    @include('components.noLogin.credit',[
    'title'=>'laravel-debugbar',
    'text'=>'※ローカルのデバッグに使用',
    'copyright'=>'2013-present Barry vd. Heuvel',
    'link'=>'https://github.com/barryvdh/laravel-debugbar/blob/master/LICENSE'])

    @include('components.noLogin.credit',[
    'title'=>'laravel-ide-helper',
    'text'=>'※ローカルのデバッグに使用',
    'copyright'=>'Barry vd. Heuvel barryvdh@gmail.com',
    'link'=>'https://github.com/barryvdh/laravel-ide-helper/blob/master/LICENSE.md'])

    <div class="text-center my-4">
        <h3 class="inline-block p-2 mb-2 border">その他</h3>
    </div>

    @include('components.noLogin.credit',[
    'title'=>'docker-laravel',
    'text'=>'※docker 作成で使用',
    'copyright'=>'2020 ucan-lab/docker-laravel',
    'link'=>'https://github.com/ucan-lab/docker-laravel/blob/main/LICENSE'])

</div>


@endsection
