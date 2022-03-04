@extends("layouts.main")
@php
$name = $userInfo->last_name." ".$userInfo->first_name;
@endphp
@section("title", $name)

@section('header')
@parent
@endsection
@section('content')
@php
$authUser=Auth::user();
@endphp
{{--<h1 class="text-center my-8 text-3xl ">個別ユーザー情報</h1>--}}
@include('components.forMembers.pageTitle', ['title'=>$name])

<div class="w-full text-center">
    <p>
        @if($gate->allows('level7~'))
        あなたは本入部以上のため、すべての情報の閲覧が可能です
        @else
        あなたは本入部以下のため、一部の情報は閲覧できません
        @endif
    </p>

    @if ($userInfo->user_id == $authUser->id)
    <a href='/user/edit' class="inline-block px-10 bg-bg rounded-lg">edit</a>
    @endif
</div>

<div class="mx-auto mt-8 mb-16 flex flex-wrap gap-x-3 gap-y-16 justify-between" style="width: 1200px">
    <div class="flex bg-bg-main rounded-2xl p-6 infoFrame h-fit" style="width: 500px">
        <div class="flex items-center w-1/2">
            <img src="{{url('/'.$userInfo->profile_photo_path)}}" alt="" class="object-fit-cover">
        </div>
        <div class="px-4 text-left w-1/2">
            <p class="text-sm xl:text-base px-2 mb-1 bg-bg rounded-full inline-block">なまえ</p>
            <p class="xl:text-lg pl-2 mb-2">{{$userInfo->last_name}} {{$userInfo->first_name}} ({{$userInfo->name}})
            </p>
            @empty($userInfo->status)
            @else
            <p class="text-sm xl:text-base px-2 mb-1 bg-bg rounded-full inline-block">一言コメント</p>
            <p class="xl:text-lg pl-2 mb-2">{{$userInfo->status}}</p>
            @endempty
            {{--@if($grade == '社会人' || $grade == 'その他' )--}}
            <p class="text-sm xl:text-base px-2 mb-1 bg-bg rounded-full inline-block">所属</p>
            {{--@else--}}
            {{--<p class="text-sm xl:text-base px-2 mb-1 bg-bg rounded-full inline-block">学部/学科</p>--}}
            {{--@endif--}}
            <p class="xl:text-lg pl-2 mb-2">{{$userInfo->profession}}</p>
            {{--<p class="text-sm xl:text-base px-2 mb-1 bg-bg rounded-full inline-block">せつめい</p>
            <p class="xl:text-lg pl-2 mb-2">{{$userInfo->description}}</p>--}}
        </div>
    </div>

    <div class="basicInformation infoFrame h-fit p-6 border-4 border-bg rounded-2xl relative">
        <h2 class="absolute py-2 px-6 bg-bg rounded-full text-base font-bold" style="top: -1.125rem;">基本情報</h2>
        <table class="mt-6 mx-auto">
            <tr>
                <td class="text-right font-bold w-1/2 pr-5">学年</td>
                <td class="w-1/2 pl-5">{{$userInfo->grade->label()}}</td>
            </tr>
            <tr>
                <td class="text-right font-bold w-1/2 pr-5">性別</td>
                <td class="w-1/2 pl-5">{{$userInfo->gender->label()}}</td>
            </tr>
            <tr>
                <td class="text-right font-bold w-1/2 pr-5">権限レベル</td>
                <td class="w-1/2 pl-5"></td>
            </tr>
            <tr>
                <td class="text-right font-bold w-1/2 pr-5">学部</td>
                <td class="w-1/2 pl-5"></td>
            </tr>
            <tr>
                <td class="text-right font-bold w-1/2 pr-5">出身</td>
                <td class="w-1/2 pl-5"></td>
            </tr>
            <tr>
                <td class="text-right font-bold w-1/2 pr-5">現住所</td>
                <td class="w-1/2 pl-5"></td>
            </tr>
            <tr>
                <td class="text-right font-bold w-1/2 pr-5">兼部・サークル</td>
                <td class="w-1/2 pl-5"></td>
            </tr>
        </table>
    </div>

    <div class="basicInformation infoFrame h-fit p-6 border-4 border-bg rounded-2xl relative">
        <h2 class="absolute py-2 px-6 bg-bg rounded-full text-base font-bold" style="top: -1.125rem;">パーソナルデータ</h2>
        <table class="mt-6 mx-auto">
            <tr>
                <td class="text-right font-bold w-1/2 pr-5">誕生日</td>
                <td class="w-1/2 pl-5"></td>
            </tr>
            <tr>
                <td class="text-right font-bold w-1/2 pr-5">趣味</td>
                <td class="w-1/2 pl-5">{{$userInfo->hobbies}}</td>
            </tr>
            <tr>
                <td class="text-right font-bold w-1/2 pr-5">興味</td>
                <td class="w-1/2 pl-5">{{$userInfo->interests}}</td>
            </tr>
            <tr>
                <td class="text-right font-bold w-1/2 pr-5">座右の銘</td>
                <td class="w-1/2 pl-5">{{$userInfo->motto}}</td>
            </tr>
        </table>
    </div>

    <div class="basicInformation infoFrame h-fit p-6 border-4 border-bg rounded-2xl relative">
        <h2 class="absolute py-2 px-6 bg-bg rounded-full text-base font-bold" style="top: -1.125rem;">情報</h2>
        <table class="mt-6 mx-auto">
            <tr>
                <td class="text-right font-bold w-1/2 pr-5">Slack名</td>
                <td class="w-1/2 pl-5">{{$userInfo->slack_name}}</td>
            </tr>
            <tr>
                <td class="text-right font-bold w-1/2 pr-5">Discord名</td>
                <td class="w-1/2 pl-5">{{$userInfo->discord_name}}</td>
            </tr>
            <tr>
                <td class="text-right font-bold w-1/2 pr-5">LINE名</td>
                <td class="w-1/2 pl-5">{{$userInfo->line_name}}</td>
            </tr>
            <tr>
                <td class="text-right font-bold w-1/2 pr-5">GitHubID</td>
                <td class="w-1/2 pl-5">
                    <a href='https://github.com/{{$userInfo->github_id}}' target="_blank" rel="noopener"
                        class="inline-block">{{$userInfo->github_id}}</a>
                </td>
            </tr>
        </table>
    </div>
</div>

<div class="mx-auto mb-32" style='max-width: 1000px'>
    <div class="basicInformation mb-16 h-fit p-6 border-4 border-bg rounded-2xl relative">
        <h2 class="absolute py-2 px-6 bg-bg rounded-full text-base font-bold" style="top: -1.125rem;">MyLink</h2>
        <div class="flex flex-wrap gap-x-12 my-8">
            {{--@foreach ($collection as $item)--}}
            <a href="https://hogehoge.com" target="_blank" rel="noopener"
                class="flex bg-bg-sub rounded-2xl p-6 hover:opacity-80 userFrame" style="transition: .2s; width: 500px">
                <div class="flex items-center w-1/2">
                    <img src="path" alt="" class="object-fit-cover">
                    <p>sitename</p>
                </div>
                <p>description</p>
            </a>
            <a href="https://hogehoge.com" target="_blank" rel="noopener"
                class="flex bg-bg-sub rounded-2xl p-6 hover:opacity-80 userFrame" style="transition: .2s; width: 500px">
                <div class="flex items-center w-1/2">
                    <img src="path" alt="" class="object-fit-cover">
                    <p>sitename</p>
                </div>
                <p>description</p>
            </a>
            {{--@endforeach--}}
        </div>
    </div>

    <div class="basicInformation h-fit p-6 border-4 border-bg rounded-2xl relative">
        <h2 class="absolute py-2 px-6 bg-bg rounded-full text-base font-bold" style="top: -1.125rem;">所属プロジェクト
        </h2>
        <div class="flex flex-wrap gap-x-12 my-8">
            {{--@foreach ($collection as $item)--}}
            <a href="https://hogehoge.com" target="_blank" rel="noopener"
                class="flex bg-bg-sub rounded-2xl p-6 hover:opacity-80 userFrame" style="transition: .2s; width: 500px">
                <div class="flex items-center w-1/2">
                    <img src="path" alt="" class="object-fit-cover">
                    <p>sitename</p>
                </div>
                <p>description</p>
            </a>
            <a href="https://hogehoge.com" target="_blank" rel="noopener"
                class="flex bg-bg-sub rounded-2xl p-6 hover:opacity-80 userFrame" style="transition: .2s; width: 500px">
                <div class="flex items-center w-1/2">
                    <img src="path" alt="" class="object-fit-cover">
                    <p>sitename</p>
                </div>
                <p>description</p>
            </a>
            {{--@endforeach--}}
        </div>
    </div>
</div>


@endsection
