<div class="fixed left-0 w-60">
    <div class="my-10 w-full">
        <div class="px-8">
            <a href="/" class="inline-block w-full mb-10 hover:opacity-80" style="transition: .2s"><img
                    src="/img/logo.png" alt="U-laniwa"> </a>
            <nav class="flex flex-col gap-4 sidenav">
                @include('components.buttons.navButton', ['link'=>'/home', 'title'=>'U-laniwaホーム'])
                @include('components.buttons.navButton', ['link'=>'/notice', 'title'=>'お知らせ'])
                @include('components.buttons.navButton', ['link'=>'/calender', 'title'=>'U-labカレンダー'])
                @include('components.buttons.navButton', ['link'=>'/project', 'title'=>'プロジェクト'])
                @include('components.buttons.navButton', ['link'=>'/groupRules', 'title'=>'U-labの決め事'])
                @include('components.buttons.navButton', ['link'=>'/statistic/user', 'title'=>'統計情報'])
            </nav>
        </div>
    </div>
</div>
