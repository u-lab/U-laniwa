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
        <div class="main-wrapper overflow-x-hidden">
            {{--@include('components.forMembers.userIcon')--}}
            @yield('content')
        </div>
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
