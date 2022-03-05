@extends("layouts.noLogin")
@section("title","クレジット")

@section('header')
@parent
@endsection
@section('content')
@include('components.noLogin.pageTitle', ['title'=>'クレジット'])

<div class="wrapper mb-20 leading-7">
    <p class="text-center text-xl">使用しているライブラリや素材のライセンス</p>

    @include('components.noLogin.creditSubTitle',['subTitle'=>'PHPフレームワーク、ライブラリ'])
    <div class="flex flex-col flex-wrap justify-center items-center">
        @include('components.noLogin.credit',[
        'title'=>'Laravel',
        'text'=>'メインのフレームワークとして使用',
        'license'=>'MIT',
        'copyright'=>'Copyright © Taylor Otwell',
        'link'=>'https://laravel-guide.readthedocs.io/en/latest/license/'])
        @include('components.noLogin.credit',[
        'title'=>'Laravel backup',
        'text'=>'DB バックアップで使用',
        'license'=>'MIT',
        'copyright'=>'Spatie bvba info@spatie.be',
        'link'=>'https://github.com/spatie/laravel-backup/blob/main/LICENSE.md'])

        @include('components.noLogin.credit',[
        'title'=>'Larastan',
        'text'=>'静的解析で使用',
        'license'=>'MIT',
        'copyright'=>'Nuno Maduro enunomaduro@gmail.com',
        'link'=>'https://github.com/nunomaduro/larastan/blob/master/LICENSE.md'])

        @include('components.noLogin.credit',[
        'title'=>'Laravel Debugbar',
        'text'=>'ローカルのデバッグに使用',
        'license'=>'MIT',
        'copyright'=>'2013-present Barry vd. Heuvel',
        'link'=>'https://github.com/barryvdh/laravel-debugbar/blob/master/LICENSE'])

        @include('components.noLogin.credit',[
        'title'=>'Laravel IDE Helper Generator',
        'text'=>'ローカルのデバッグに使用',
        'license'=>'MIT',
        'copyright'=>'Barry vd. Heuvel barryvdh@gmail.com',
        'link'=>'https://github.com/barryvdh/laravel-ide-helper/blob/master/LICENSE.md'])
    </div>

    @include('components.noLogin.creditSubTitle',['subTitle'=>'フロントエンド表示部分'])
    <div class="flex flex-col flex-wrap justify-center items-center">

        @include('components.noLogin.credit',[
        'title'=>'Zen Fonts Kaku Gothic',
        'text'=>'メインのフォントとして利用',
        'license'=>'OFL-1.1 License',
        'copyright'=>'Copyright 2022 The Zen Kaku Gothic Project Authors
        (https://github.com/googlefonts/zen-kakugothic)',
        'link'=>'https://github.com/googlefonts/zen-kakugothic/blob/main/OFL.txt'])

        @include('components.noLogin.credit',[
        'title'=>'Tailiwind CSS',
        'text'=>'CSSライブラリとして使用',
        'license'=>'MIT',
        'copyright'=>'Copyright (c) Tailwind Labs, Inc.',
        'link'=>'https://github.com/tailwindlabs/tailwindcss/blob/master/LICENSE'])
    </div>

    @include('components.noLogin.creditSubTitle',['subTitle'=>'その他'])
    <div class="flex flex-col flex-wrap justify-center items-center">
        @include('components.noLogin.credit',[
        'title'=>'docker-laravel',
        'text'=>'ローカル環境構築のベースとして使用',
        'license'=>'MIT',
        'copyright'=>'2020 ucan-lab/docker-laravel',
        'link'=>'https://github.com/ucan-lab/docker-laravel/blob/main/LICENSE'])
    </div>
</div>


@endsection