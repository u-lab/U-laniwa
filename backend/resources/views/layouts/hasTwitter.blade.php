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
    <div class="flex relative pl-60">
        <!---サイドバーここから--->
        @component('components.basis.sidebar')
        <!---サイドバーここまで--->
        @endcomponent
        <div class="main-wrapper" style="width: 600px">
            @yield('content')
        </div>
        <!---サイドバーここから--->
        <div class="side mt-12" style="width: 330px">
            @include('components.forMembers.userIcon')

            <div class="calender mb-10">
                <iframe
                    src="https://calendar.google.com/calendar/embed?height=600&wkst=1&bgcolor=%23ffffff&ctz=Asia%2FTokyo&showTitle=1&mode=AGENDA&src=dWxhYjA4MTJAZ21haWwuY29t&color=%23AD1457"
                    style="border-width:0;" width="300" height="600" frameborder="0" scrolling="no"></iframe>
            </div>

            <div class="twitter">
                <a class="twitter-timeline" data-width="300" data-height="800"
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
