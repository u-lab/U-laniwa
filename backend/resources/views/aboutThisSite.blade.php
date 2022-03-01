@extends("layouts.noLogin")
@section("title","このサイトについて")

@section('header')
@parent
@endsection
@section('content')
<div class="py-12 text-center">
    <h1 class="deco">このサイトについて</h1>
</div>

<div class="wrapper mb-20 leading-7 aboutThisSite">
    <div>
        <h2 class="deco">対応ブラウザについて</h2>
    </div>
    <p>Chrome や Brave、Microsoft Edge など Chromium 系のブラウザ、Firefox および Safari に対応しています。<br />
        Internet Explore でのアクセスは非対応です。</p>
    <div>
        <h2 class="deco">JavaScript</h2>
    </div>
    <p>本サイトでは、グラフの表示をはじめとして JavaScript を使用しています。<br />
        ご使用のブラウザ設定において JavaScript を有効にされていない場合に、一分機能が動作しない場合や、レイアウトが崩れる場合がありますので、JavaScript を有効にすることをオススメします。</p>
    <div>
        <h2 class="deco">Cookie</h2>
    </div>
    <p>本サイトでは、ご利用者様が訪問された際、自動ログインなどの利用のために、Cookieを使用しています。
        <br />Cookieは、本サイトの運用に関連するサーバから、ご利用者さまのブラウザに送信する情報で、ご利用者さまのコンピューターに記録されますが、ご利用者さまのコンピューターへ直接的な悪影響を及ぼすことはありません。<br />ブラウザ側で設定することにより「Cookie」の受け取りを拒否することができますが、度々のログインが必要であったり一部機能で不具合が生じる場合がありますので、予めご了承ください。
    </p>
    <div>
        <h2 class="deco">技術スタックについて</h2>
    </div>
    <p>詳細は GitHub リポジトリをご覧ください。</p>
    <a href="https://github.com/u-lab/U-laniwa">https://github.com/u-lab/U-laniwa</a>
    <div>
        <h2 class="deco">Google Analytics</h2>
    </div>
    <p>本サービスでは Google Analytics は使用していません。また使用の予定もありません。<br />また広告掲載の予定もありませんので、安心してご利用ください。</p>
</div>

@endsection
