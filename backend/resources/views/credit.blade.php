@extends("layouts.noLogin")
@section("title","クレジット")

@section('header')
@parent
@endsection
@section('content')
<div class="py-12 text-center">
    <h1 class="deco">クレジット</h1>
</div>

<div class="wrapper mb-20 leading-7 credit">
    <p class="text-center text-ls">使用しているライブラリや素材のライセンス</p>
    <div>
        <h3>PHP フレームワーク、ライブラリ</h3>
    </div>
    <div>
        <h2 class="deco">Laravel</h2>
    </div>
    <p>The MIT License (MIT) Copyright © Taylor Otwell</p>
    <a href="https://opensource.org/licenses/mit-license.php" target="_blank"
        rel="noopener">https://opensource.org/licenses/mit-license.php</a><br>
    <a href="https://laravel-guide.readthedocs.io/en/latest/license/" target="_blank"
        rel="noopener">https://laravel-guide.readthedocs.io/en/latest/license/</a><br>
    <a href="https://laravel.com/" target="_blank" rel="noopener">https://laravel.com/</a>
    <div>
        <h2 class="deco">laravel-backup</h2>
    </div>
    <p>※DB バックアップで使用</p>
    <p>Copyright (c) Spatie bvba info@spatie.be</p>
    <p>Released under the MIT license</p>
    <a href="https://github.com/spatie/laravel-backup/blob/main/LICENSE.md" target="_blank"
        rel="noopener">https://github.com/spatie/laravel-backup/blob/main/LICENSE.md</a>
    <div>
        <h2 class="deco">larastan</h2>
    </div>
    <p>※静的解析で使用</p>
    <p>Copyright (c) Nuno Maduro enunomaduro@gmail.com</p>
    <p>Released under the MIT license</p>
    <a href="https://github.com/nunomaduro/larastan/blob/master/LICENSE.md" target="_blank"
        rel="noopener">https://github.com/nunomaduro/larastan/blob/master/LICENSE.md</a>
    <div>
        <h2 class="deco">laravel-debugbar</h2>
    </div>
    <p>※ローカルのデバッグに使用</p>
    <p>Copyright (C) 2013-present Barry vd. Heuvel</p>
    <p>Released under the MIT license</p>
    <a href="https://github.com/barryvdh/laravel-debugbar/blob/master/LICENSE" target="_blank"
        rel="noopener">https://github.com/barryvdh/laravel-debugbar/blob/master/LICENSE</a>
    <div>
        <h2 class="deco">laravel-ide-helper</h2>
    </div>
    <p>※ローカルのデバッグに使用</p>
    <p>Copyright (c) Barry vd. Heuvel barryvdh@gmail.com</p>
    <p>Released under the MIT license</p>
    <a href="https://github.com/barryvdh/laravel-ide-helper/blob/master/LICENSE.md" target="_blank"
        rel="noopener">https://github.com/barryvdh/laravel-ide-helper/blob/master/LICENSE.md</a>
    <div>
        <h3 class="mt-4">その他</h3>
    </div>
    <div>
        <h2 class="deco">docker-laravel</h2>
    </div>
    <p>※docker 作成で使用</p>
    <p>Copyright (c) 2020 ucan-lab/docker-laravel</p>
    <p>Released under MIT License.</p>
    <a href="https://github.com/ucan-lab/docker-laravel/blob/main/LICENSE" target="_blank"
        rel="noopener">https://github.com/ucan-lab/docker-laravel/blob/main/LICENSE</a>
</div>


@endsection
