<div class="fixed left-0 w-60 md:block hidden">
    <div class="my-10 w-full">
        <div class="px-8">
            <a href="/" class="inline-block w-full mb-10 hover:opacity-80" style="transition: .2s"><img
                    src="/img/ulaniwa_logo.svg" alt="U-laniwa"> </a>
            <nav class="flex flex-col gap-2 sidenav">
                @include('components.buttons.navButton', ['link'=>'/home', 'title'=>'ホーム'])
                {{--@include('components.buttons.navButton', ['link'=>'/notice', 'title'=>'お知らせ'])--}}
                @include('components.buttons.navButton', ['link'=>'/calender', 'title'=>'カレンダー'])
                @include('components.buttons.navButton', ['link'=>'/timeline', 'title'=>'タイムライン'])
                @include('components.buttons.navButton', ['link'=>'/user', 'title'=>'ユーザー一覧'])
                {{--@include('components.buttons.navButton', ['link'=>'/project', 'title'=>'プロジェクト'])--}}
                {{--@include('components.buttons.navButton', ['link'=>'/groupRules', 'title'=>'U-labの決め事'])--}}
                @include('components.buttons.navButton', ['link'=>'/statistic/user', 'title'=>'統計情報'])
                @include('components.buttons.navButton', ['link'=>'/procedure', 'title'=>'手続きページ'])
                @include('components.buttons.navButton', ['link'=>'/security', 'title'=>'セキュリティ'])
            </nav>
        </div>
    </div>
</div>
