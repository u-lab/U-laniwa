<div class="m-header md:hidden h-20 flex flex-row justify-between items-center px-4">
    <div id="hamburger" class='inline-block'>
        <span class="material-icons" style="font-size: 2rem;">menu</span>
    </div>

    <div id="nav" class="fixed left-0 top-12 hidden bg-bg-sub p-8 z-10"
        style="transition: .2s; border-radius: 0 20px 20px 0">
        <div class="w-full">
            <div>
                <a href="/home" class="inline-block w-full mb-2 hover:opacity-80" style="transition: .2s">
                    <img src="/img/ulaniwa_logo.svg" alt="U-laniwa">
                </a>
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

    <a href="/">
        <img src="/img/ulaniwa_logo.svg" class="w-16 h-16 inline-block" alt="U-laniwa">
    </a>

    @php
    $user=Auth::user();
    @endphp
    <div class="userIcon w-fit">
        <a href="{{url('/user'.'/'.$user->id)}}">
            <img src="{{asset('storage/'.$user->profile_photo_path)}}" alt=""
                class="w-12 h-12 inline-block rounded-full">
        </a>
    </div>
</div>

<script>
    function hamburger() {
        document.getElementById('nav').classList.toggle('in');
        }
        document.getElementById('hamburger').addEventListener('click' , function () {
        hamburger();
        } );
</script>
