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

    @include('components.basis.mobileHeader')

    <!---コンテンツここから--->
    <div class="flex relative md:pl-60 md:flex-row flex-col">
        <!---サイドバーここから--->
        @component('components.basis.sidebar')
        <!---サイドバーここまで--->
        @endcomponent
        <div class="main-wrapper overflow-x-hidden pr-2 relative">
            <div class="absolute right-12 top-8 md:block hidden">
                @include('components.forMembers.userIcon')
            </div>
            @yield('content')
        </div>
        {{--<div class="pt-8 w-24">
            @include('components.forMembers.userIcon')
        </div>--}}
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
