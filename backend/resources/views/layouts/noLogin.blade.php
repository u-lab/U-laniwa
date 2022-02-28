<!DOCTYPE html>
<html lang="ja" prefix="og: http://ogp.me/ns#">

<head>
    <title>@yield('title') | U-laniwa</title>
    @component('components.basis.headMeta')
    @endcomponent
    @component('components.basis.ogp')
    @endcomponent

</head>

<body>

    <!---ヘッダーここから--->
    {{--@component('components.basis.headerNoLogin')
    @endcomponent--}}
    <!---ヘッダーここまで--->
    <!---コンテンツここから--->
    <div class="main-wrapper">
        @yield('content')
    </div>
    <!----コンテンツここまで--->

    <!----フッターここから--->
    @component('components.basis.footer')
    @endcomponent
    {{-- @component('components.basis.smFooter')
    @endcomponent --}}
    <!----フッターここまで--->
    @component('components.basis.roadJS')
    @endcomponent

</body>

</html>
