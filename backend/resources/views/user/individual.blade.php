@extends("layouts.main")
@section("title", $user->name)

@section('header')
@parent
@endsection
@section('content')
@php
$authUser=Auth::user();
@endphp
{{--<h1 class="text-center my-8 text-3xl ">個別ユーザー情報</h1>--}}
@include('components.forMembers.pageTitle', ['title'=>$user->name])

<div class="w-full text-center">
    <p>
        @if($gate->allows('level7~'))
        あなたは本入部以上のため、すべての情報の閲覧が可能です
        @else
        あなたは本入部以下のため、一部の情報は閲覧できません
        @endif
    </p>

    @if ($user->id == $authUser->id)
    <a href='/user/edit' class="inline-block px-10 bg-bg rounded-lg">edit</a>
    @endif
</div>

<div class="mx-auto mt-8 mb-16 flex flex-wrap gap-x-3 gap-y-16 justify-between" style="width: 1200px">
    <div class="flex bg-bg-main rounded-2xl p-6 infoFrame h-fit" style="width: 500px">
        <div class="flex items-center w-1/2">
            <img src="{{url('/'.$user->profile_photo_path)}}" alt="" class="object-fit-cover">
        </div>
        <div class="px-4 text-left w-1/2">
            <p class="text-sm xl:text-base px-2 mb-1 bg-bg rounded-full inline-block">なまえ</p>
            <p class="xl:text-lg pl-2 mb-2">{{$name->last_name}} {{$name->first_name}} ({{$user->name}})
            </p>
            @empty($user->status)
            @else
            <p class="text-sm xl:text-base px-2 mb-1 bg-bg rounded-full inline-block">一言コメント</p>
            <p class="xl:text-lg pl-2 mb-2">{{$user->status}}</p>
            @endempty
            {{--@if($grade == '社会人' || $grade == 'その他' )--}}
            <p class="text-sm xl:text-base px-2 mb-1 bg-bg rounded-full inline-block">所属</p>
            {{--@else--}}
            {{--<p class="text-sm xl:text-base px-2 mb-1 bg-bg rounded-full inline-block">学部/学科</p>--}}
            {{--@endif--}}
            <p class="xl:text-lg pl-2 mb-2">{{$user->profession}}</p>
            {{--<p class="text-sm xl:text-base px-2 mb-1 bg-bg rounded-full inline-block">せつめい</p>
            <p class="xl:text-lg pl-2 mb-2">{{$user->description}}</p>--}}
        </div>
    </div>

    <div class="basicInformation infoFrame h-fit p-6 border-4 border-bg rounded-2xl relative">
        <h2 class="absolute py-2 px-6 bg-bg rounded-full text-base font-bold" style="top: -1.125rem;">基本情報</h2>
        <table class="mt-6 mx-auto">
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
        <table class="mt-6 mx-auto">
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


<h2>名前</h2>
<p>{{$user->name}}</p>
<h2>プロフィール画像</h2>
<img src="{{url('/' . $user->profile_photo_path)}}" alt="">
<h2>一言コメント</h2>
<p>{{$user->status}}</p>
<h2>学部/学科</h2>
<p>{{$user->uu_faculty}}/{{$user->uu_major}}</p>


<h1>基本情報</h1>
<h2>学年</h2>
<p>{{$user->grade}}</p>
<h2>性別</h2>
<p>{{$user->gender}}</p>
<h2>権限レベル</h2>
<p>{{$user->user_role_id}}</p>
@if ($user->grade == '社会人' || $user->grade == 'その他')
<h2>所属</h2>
@else
<h2>学部</h2>
@endif
<p>{{$user->profession}}</p>
<h2>出身</h2>
<p>{{$user->birth_area}}</p>
<h2>現住所</h2>
<p>{{$user->live_area}}</p>
<h2>兼部・サークル</h2>
<p>{{$user->group_affiliation}}</p>


<h1>パーソナルデータ</h1>
@if ($user->is_publish_birth_day)
<h2>誕生日</h2>
<p>{{$user->birth_day}}</p>
@endif
<h2>趣味</h2>
<p>{{$user->hobbies}}</p>
<h2>興味</h2>
<p>{{$user->interests}}</p>
<h2>座右の銘</h2>
<p>{{$user->motto}}</p>


<h1>情報</h1>
<h2>slack名</h2>
<p>{{$user->slack_name}}</p>
<h2>Discord名</h2>
<p>{{$user->discord_name}}</p>
<h2>LINE名</h2>
<p>{{$user->line_name}}</p>
<h2>GitHubID</h2>
<p>{{$user->github_id}}</p>


<h1>Mylink</h1>
@foreach ($links as $link)
<a href="{{$link->url}}">
    <img src="{{'http://www.google.com/s2/favicons?sz=64&domain=' . $link->url}}" alt="">
    <h2>{{$link->name}}</h2>
    @if ($link->description)
    <p>{{$link->description}}</p>
    @endif
</a>
@endforeach


<h1>所属プロジェクト</h1>
@foreach ($projects as $project)
<a href="{{url('/project/' . $project->project_id)}}">
    <img src="{{url('/' . $project->thumbnail)}}" alt="">
    <h2>{{$project->title}}</h2>
    <h3>{{$project->subtitle}}</h3>
    <p>{{$project->start_date}} ~ {{$project->end_date}}</p>
</a>
@endforeach


<h1>タイムライン</h1>
@foreach ($events as $event)
<p>{{$event->start_date}} ~ {{$event->end_date}}</p>
<h2>{{$event->title}}</h2>
<p>{{$event->description}}</p>
@endforeach


<h1>関連ユーザ</h1>
@foreach ($relatedUsers as $relatedUser)
<a href="{{url('/user/' . $relatedUser->user_id)}}">
    <img src="{{url('/' . $relatedUser->profile_photo_path)}}" alt="">
    <p>{{$relatedUser->name}}</p>
    <p>{{$relatedUser->profession}}</p>
</a>
@endforeach
@endsection
