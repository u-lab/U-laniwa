<!DOCTYPE html>
<html lang="ja">

<head>
    <title>@yield('title') | U-laniwa</title>
    @component('components.basis.headMeta')
    @endcomponent
    {{-- @component('components.basis.ogp')
    @endcomponent --}}
    {{-- 検索インデックスさせない --}}
    <meta name="robots" content="noindex,nofollow">

</head>

<body>

    <!---コンテンツここから--->
    <div class="flex relative pl-80">
        <!---サイドバーここから--->
        @component('components.basis.sidebar')
        <!---サイドバーここまで--->
        @endcomponent
        <div class="main-wrapper">
            @yield('content')
        </div>
        <!---サイドバーここから--->
        <div class="side w-96 text-center">
            <div class="twitter mt-20">
                <a class="twitter-timeline" data-width="320" data-height="800"
                    href="https://twitter.com/Ulab_uu?ref_src=twsrc%5Etfw">Tweets by Ulab_uu</a>
                <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
            </div>
        </div>
        <!---サイドバーここまで--->
    </div>
    <!----コンテンツここまで--->

    <!----フッターここから--->
    @component('components.basis.footer')
    @endcomponent
    <!----フッターここまで--->
    @component('components.basis.roadJS')
    @endcomponent

</body>

</html>
