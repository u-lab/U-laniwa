@extends("layouts.noLogin")
@section("title","このサイトについて")

@section('header')
@parent
@endsection
@section('content')
@include('components.noLogin.pageTitle', ['title'=>'このサイトについて'])

<div class="wrapper mb-20 leading-7 aboutThisSite">

    @include('components.noLogin.aboutThisSite', ['title'=>'対応ブラウザについて', 'text'=>'Chrome や Brave、Microsoft Edge
    などChromium 系のブラウザ、Firefox および Safari に対応しています。<br>Internet Explore でのアクセスは非対応です。'])

    @include('components.noLogin.aboutThisSite', ['title'=>'JavaScript', 'text'=>'本サイトでは、グラフの表示をはじめとして JavaScript
    を使用しています。<br />ご使用のブラウザ設定において JavaScript を有効にされていない場合に、一分機能が動作しない場合や、レイアウトが崩れる場合がありますので、JavaScript
    を有効にすることをオススメします。'])

    @include('components.noLogin.aboutThisSite', ['title'=>'Cookie',
    'text'=>'本サイトでは、ご利用者様が訪問された際、自動ログインなどの利用のために、Cookieを使用しています。
    <br />Cookieは、本サイトの運用に関連するサーバから、ご利用者さまのブラウザに送信する情報で、ご利用者さまのコンピューターに記録されますが、ご利用者さまのコンピューターへ直接的な悪影響を及ぼすことはありません。<br />ブラウザ側で設定することにより「Cookie」の受け取りを拒否することができますが、度々のログインが必要であったり一部機能で不具合が生じる場合がありますので、予めご了承ください。'])

    @include('components.noLogin.aboutThisSite', ['title'=>'技術スタックについて',
    'text'=>'詳細は GitHub リポジトリをご覧ください。<br><a
        href="https://github.com/u-lab/U-laniwa">https://github.com/u-lab/U-laniwa</a>'])

    @include('components.noLogin.aboutThisSite', ['title'=>'Google Analytics',
    'text'=>'本サービスでは Google Analytics は使用していません。また使用の予定もありません。<br />また広告掲載の予定もありませんので、安心してご利用ください。'])

</div>

@endsection
