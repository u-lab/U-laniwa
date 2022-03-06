@extends("layouts.main")
@php
$authUser=Auth::user();
$name = $user->last_name." ".$user->first_name;
@endphp
@section("title", $name)

@section('header')
@parent
@endsection
@section('content')
{{--<h1 class="text-center my-8 text-3xl ">個別ユーザー情報</h1>--}}
@include('components.forMembers.pageTitle', ['title'=>$name])

<div class="w-full text-center">
    <p>
        @if($gate->allows('level7~'))
        あなたは本入部以上のため、すべての情報の閲覧が可能です。
        @else
        あなたは本入部以下のため、一部の情報は閲覧できません。
        @endif
    </p>

    @if ($user->id == $authUser->id)
    <a href='/user/edit' class="inline-block px-10 py-2 bg-bg rounded-lg my-8 text-lg font-bold">edit</a>
    @endif
</div>

<div class="mx-auto mt-8 mb-16 flex flex-wrap gap-x-3 gap-y-16 justify-between" style="width: 1200px">
    <div class="flex bg-bg-main rounded-2xl p-6 infoFrame h-fit" style="width: 500px">
        <div class="flex items-center w-1/2">
            <img src="{{url('/'.$user->profile_photo_path)}}" alt="" class="object-fit-cover">
        </div>
        <div class="px-4 text-left w-1/2">
            <h3 class="text-sm xl:text-base px-2 mb-1 bg-bg rounded-full inline-block">なまえ</h3>
            <p class="xl:text-lg pl-2 mb-2">{{$name}} ({{$user->name}})
            </p>
            @empty($user->status)
            @else
            <p class="text-sm xl:text-base px-2 mb-1 bg-bg rounded-full inline-block">一言コメント</p>
            <p class="xl:text-lg pl-2 mb-2">{{$user->status}}</p>
            @endempty
            @if($user->grade == '社会人' || $user->grade == 'その他' )
            <p class="text-sm xl:text-base px-2 mb-1 bg-bg rounded-full inline-block">所属</p>
            @else
            <p class="text-sm xl:text-base px-2 mb-1 bg-bg rounded-full inline-block">学部/学科</p>
            @endif
            <p class="xl:text-lg pl-2 mb-2">{{$user->profession}}</p>
        </div>
    </div>

    <div class="basicInformation infoFrame h-fit p-6 border-4 border-bg rounded-2xl relative">
        <h2 class="absolute py-2 px-6 bg-bg rounded-full text-base font-bold" style="top: -1.125rem;">基本情報</h2>
        <table class="mt-4 mx-auto">
            <tr>
                <td class="text-right font-bold w-1/2 pr-5">学年</td>
                <td class="w-1/2 pl-5">{{$user->grade}}</td>
            </tr>
            <tr>
                <td class="text-right font-bold w-1/2 pr-5">性別</td>
                <td class="w-1/2 pl-5">{{$user->gender}}</td>
            </tr>
            <tr>
                <td class="text-right font-bold w-1/2 pr-5">権限レベル</td>
                <td class="w-1/2 pl-5">{{$user->user_role_id}}</td>
            </tr>
            <tr>
                <td class="text-right font-bold w-1/2 pr-5">学部・学科</td>
                <td class="w-1/2 pl-5">{{$user->profession}}</td>
            </tr>
            <tr>
                <td class="text-right font-bold w-1/2 pr-5">出身</td>
                <td class="w-1/2 pl-5">{{$user->birth_area}}</td>
            </tr>
            <tr>
                <td class="text-right font-bold w-1/2 pr-5">現住所</td>
                <td class="w-1/2 pl-5">{{$user->live_area}}</td>
            </tr>
            <tr>
                <td class="text-right font-bold w-1/2 pr-5">兼部・サークル</td>
                <td class="w-1/2 pl-5">{{$user->group_affiliation}}</td>
            </tr>
        </table>
    </div>

    <div class="basicInformation infoFrame h-fit p-6 border-4 border-bg rounded-2xl relative">
        <h2 class="absolute py-2 px-6 bg-bg rounded-full text-base font-bold" style="top: -1.125rem;">パーソナルデータ</h2>
        <table class="mt-4 mx-auto">
            @if ($user->is_publish_birth_day)
            <tr>
                <td class="text-right font-bold w-1/2 pr-5">誕生日</td>
                <td class="w-1/2 pl-5">{{$user->birth_day}}</td>
            </tr>
            @endif
            <tr>
                <td class="text-right font-bold w-1/2 pr-5">趣味</td>
                <td class="w-1/2 pl-5">{{$user->hobbies}}</td>
            </tr>
            <tr>
                <td class="text-right font-bold w-1/2 pr-5">興味</td>
                <td class="w-1/2 pl-5">{{$user->interests}}</td>
            </tr>
            <tr>
                <td class="text-right font-bold w-1/2 pr-5">座右の銘</td>
                <td class="w-1/2 pl-5">{{$user->motto}}</td>
            </tr>
        </table>
    </div>

    <div class="basicInformation infoFrame h-fit p-6 border-4 border-bg rounded-2xl relative">
        <h2 class="absolute py-2 px-6 bg-bg rounded-full text-base font-bold" style="top: -1.125rem;">情報</h2>
        <table class="mt-4 mx-auto">
            <tr>
                <td class="text-right font-bold w-1/2 pr-5">Slack名</td>
                <td class="w-1/2 pl-5">{{$user->slack_name}}</td>
            </tr>
            <tr>
                <td class="text-right font-bold w-1/2 pr-5">Discord名</td>
                <td class="w-1/2 pl-5">{{$user->discord_name}}</td>
            </tr>
            <tr>
                <td class="text-right font-bold w-1/2 pr-5">LINE名</td>
                <td class="w-1/2 pl-5">{{$user->line_name}}</td>
            </tr>
            <tr>
                <td class="text-right font-bold w-1/2 pr-5">GitHubID</td>
                <td class="w-1/2 pl-5">
                    <a href='https://github.com/{{$user->github_id}}' target="_blank" rel="noopener"
                        class="inline-block">{{$user->github_id}}</a>
                </td>
            </tr>
        </table>
    </div>
</div>

<div class="mx-auto mb-32" style='max-width: 1200px'>
    <div class="basicInformation mb-16 h-fit p-6 border-4 border-bg rounded-2xl relative">
        <h2 class="absolute py-2 px-6 bg-bg rounded-full text-base font-bold" style="top: -1.125rem;">MyLink</h2>
        <div class="flex flex-wrap gap-x-12 my-8">
            @if($links->isEmpty())
            <p class="absolute top-1/2 left-1/2" style="transform: translateX(-50%)">MyLinkはありません。</p>
            @endif
            @foreach ($links as $link)
            <a href="{{$link->url}}" target="_blank" rel="noopener"
                class="bg-bg-sub rounded-2xl p-6 hover:opacity-80 h-auto userFrame"
                style="transition: .2s; width: 500px">
                <div class="flex items-center w-full mb-4">
                    <img src="{{'http://www.google.com/s2/favicons?sz=64&domain=' . $link->url}}" class="w-12 h-12"
                        alt="">
                    <h3 class="ml-4 text-xl">{{$link->title}}</h3>
                </div>
                @if ($link->description)
                <p class="text-center">{{$link->description}}</p>
                @endif
            </a>
            @endforeach
        </div>
    </div>

    <div class="basicInformation h-fit p-6 border-4 border-bg rounded-2xl relative mb-16">
        <h2 class="absolute py-2 px-6 bg-bg rounded-full text-base font-bold" style="top: -1.125rem;">所属プロジェクト
        </h2>
        @if($projects->isEmpty())
        <p class="absolute top-1/2 left-1/2" style="transform: translateX(-50%)">所属しているプロジェクトはありません。</p>
        @endif
        <div class=" flex flex-wrap gap-x-12 my-8">
            @foreach ($projects as $project)
            @include('components.forMembers.projectFrame')
            @endforeach
        </div>
    </div>

    <div class="individual bg-bg-sub w-full p-8 rounded-3xl mb-20">
        <h2 class="text-xl">タイムライン</h2>
        <div class="tree">

            @foreach ($events as $event)
            @include('components.forMembers.userTimeline',[
            'start_date'=>$event->start_date,
            'end_date'=>$event->end_date,
            'genre'=>$event->genre->label(),
            'title'=>$event->title,
            'text'=>$event->description])
            @endforeach

        </div>
    </div>

    <div class="basicInformation mb-16 h-fit p-6 border-4 border-bg rounded-2xl relative">
        <h2 class="absolute py-2 px-6 bg-bg rounded-full text-base font-bold" style="top: -1.125rem;">関連ユーザ</h2>
        <div class="flex flex-wrap gap-x-12 my-8">
            @foreach ($relatedUsers as $relatedUser)
            <a href="{{url('/user/' . $relatedUser->user_id)}}"
                class="bg-bg-sub rounded-2xl p-6 hover:opacity-80 h-auto userFrame flex"
                style="transition: .2s; width: 500px">
                <div class="flex items-center w-1/2">
                    <img src="{{url('/' . $relatedUser->profile_photo_path)}}" alt="" class="object-fit-cover">
                </div>
                <div class="w-1/2 px-4">
                    <p class="text-sm xl:text-base px-2 mb-1 bg-bg rounded-full inline-block">なまえ</p>
                    <h3 class="ml-2 text-xl mb-2">{{$relatedUser->name}}</h3>
                    @if($relatedUser->grade == '社会人' || $relatedUser->grade == 'その他' )
                    <p class="text-sm xl:text-base px-2 mb-1 bg-bg rounded-full inline-block">所属</p>
                    @else
                    <p class="text-sm xl:text-base px-2 mb-1 bg-bg rounded-full inline-block">学部/学科</p>
                    @endif
                    <p class="ml-2">{{$relatedUser->profession}}</p>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</div>

@endsection
