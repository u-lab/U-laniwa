@extends("layouts.main")
@section("title","ユーザー情報編集")

@section('header')
@parent
@endsection
@section('content')
@php
$user=Auth::user();
@endphp
@include('components.forMembers.pageTitle', ['title'=>'ユーザー情報編集'])
<p class="text-center mb-12">{{$user->name}} さん</p>

<div class="mx-auto mb-80" style="max-width: 1200px">
    <div class="border-2 p-2 mb-20">
        <form>
            <div class="mx-auto mb-20" style="width: 600px">
                <h2 class="text-lg px-6 inline-block bg-bg rounded-full mb-4 mt-20">プロフィール画像</h2>
                <div class="rounded-3xl border-2 border-bg">
                    <table class="w-full text-center edit rounded-3xl overflow-hidden">
                        <tr class="bg-bg-sub">
                            <td>プロフィール画像</td>
                            <td>画像を追加</td>
                        </tr>
                        <tr>
                            <td style="width: 250px"><img src="{{url('/'.$user->profile_photo_path)}}"
                                    class="w-48 inline-block">
                            </td>
                            <td style="width: 250px"><input style="max-width: 250px" type="file" name="example"
                                    accept="image/jpeg, image/png"></td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="mx-auto mb-20 w-full">
                <h2 class="text-lg px-6 inline-block bg-bg rounded-full mb-4 mt-20" style="margin-left: 200px">基本情報</h2>
                <div class="rounded-3xl border-2 border-bg">
                    <table class="w-full text-center edit rounded-3xl overflow-hidden">
                        <tr class="bg-bg-sub">
                            <td>項目</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td style="width: 200px">ユーザー名</td>
                            <td><input required='true' style="width: 80%" type="text"></td>
                        </tr>
                        <tr>
                            <td style="width: 200px">姓/名</td>
                            <td>
                                <input required='true' style="width: 38%; margin-right:4%;" type="text">
                                <input required='true' style="width: 38%" type="text">
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 200px">誕生日</td>
                            <td>
                                <input style="width: 50%; margin-right:5%;" type="date">
                                <p class="inline-block text-right" style="width: 20%">公開しない</p>
                                <input type="checkbox">
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 200px">性別</td>
                            {{-- TODO: 性別はプルダウンメニューでお願いします
                            @foreach ($genders as $gender)
                            <option value="{{$loop->iteration}}">{{$gender['name']}}</option>
                            @endforeach
                            こんな感じで！ --}}
                            <td>
                                <select name='gender' style="width: 80%" required='true'>
                                    @foreach ($genders as $gender)
                                    <option value="{{$loop->iteration}}">{{$gender['name']}}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 200px">学年</td>
                            {{-- TODO: 学年はプルダウンメニューでお願いします
                            @foreach ($grades as $grade)
                            <option value="{{$loop->iteration}}">{{$grade['name']}}</option>
                            @endforeach
                            こんな感じで！ --}}
                            <td>
                                <select name='gender' style="width: 80%" required='true'>
                                    @foreach ($grades as $grade)
                                    <option value="{{$loop->iteration}}">{{$grade['name']}}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 200px">会社名</td>
                            <td><input required='true' style="width: 80%" type="text"></td>
                        </tr>
                        <tr>
                            <td style="width: 200px">大学</td>
                            <td>
                                <input type="radio" name="univ" value="宇都宮大学">
                                <label for='宇都宮大学' style='margin-right: 10%'>宇都宮大学</label>
                                <input type="radio" name="univ" value="他大学">
                                <label for='他大学'>他大学</label>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 200px">学部/学科</td>
                            {{-- TODO: 学部はプルダウンメニューでお願いします
                            @foreach ($uuFaculties as $uuFacultie)
                            <option value="{{$loop->iteration}}">{{$uuFacultie['name']}}</option>
                            @endforeach
                            こんな感じで！ --}}
                            <td>
                                <select name='faculty' style="width: 38%; margin-right:4%;" required='true'>
                                    @foreach ($uuFaculties as $uuFacultie)
                                    <option value="{{$loop->iteration}}">{{$uuFacultie['name']}}</option>
                                    @endforeach
                                </select>
                                <input required='true' style="width: 38%" type="text">
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 200px">大学名/学部/学科</td>
                            <td>
                                <input required='true' style="width: 24%; margin-right:4%;" type="text">
                                <input required='true' style="width: 24%; margin-right:4%;" type="text">
                                <input required='true' style="width: 24%" type="text">
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 200px">兼部・サークル</td>
                            <td><input required='true' style="width: 80%" type="text"></td>
                        </tr>
                        <tr>
                            <td style="width: 200px">出身地</td>
                            <td>
                                {{-- TODO: 出身地・現在地の国はプルダウンメニューでお願いします
                                @foreach ($countries as $country)
                                <option value="{{$loop->index}}">{{$country['name']}}</option>
                                @endforeach
                                こんな感じで！ --}}
                                <select name='country' style="width: 24%; margin-right:4%;" required='true'>
                                    @foreach ($countries as $country)
                                    <option value="{{$loop->iteration}}">{{$country['name']}}</option>
                                    @endforeach
                                </select>
                                <input required='true' style="width: 24%; margin-right:4%;" type="text">
                                <input required='true' style="width: 24%" type="text">
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 200px">現住地</td>
                            <td>
                                {{-- TODO: 同上 --}}
                                <select name='country_now' style="width: 24%; margin-right:4%;" required='true'>
                                    @foreach ($countries as $country)
                                    <option value="{{$loop->iteration}}">{{$country['name']}}</option>
                                    @endforeach
                                </select>
                                <input required='true' style="width: 24%; margin-right:4%;" type="text">
                                <input required='true' style="width: 24%" type="text">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <p>
                                    ユーザー名、一言コメント、学部学科はメンバー一覧で表示されます<br>
                                    兼部・サークルがある場合は「卓球、写真サークル」のように部とサークルの間を“、”で分割してお書き下さい
                                </p>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="mx-auto mb-12 w-full">
                <h2 class="text-lg px-6 inline-block bg-bg rounded-full mb-4 mt-20" style="margin-left: 200px">パーソナルデータ
                </h2>
                <div class="rounded-3xl border-2 border-bg">
                    <table class="w-full text-center edit rounded-3xl overflow-hidden">
                        <tr class="bg-bg-sub">
                            <td>項目</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td style="width: 200px">趣味</td>
                            <td><input style="width: 80%" type="text"></td>
                        </tr>
                        <tr>
                            <td style="width: 200px">興味</td>
                            <td><input style="width: 80%" type="text"></td>
                        </tr>
                        <tr>
                            <td style="width: 200px">座右の銘</td>
                            <td><input style="width: 80%" type="text"></td>
                        </tr>
                        <tr>
                            <td style="width: 200px">GitHub ID</td>
                            <td><input style="width: 80%" type="text"></td>
                        </tr>
                        <tr>
                            <td style="width: 200px">LINEでのお名前</td>
                            <td><input style="width: 80%" type="text"></td>
                        </tr>
                        <tr>
                            <td style="width: 200px">Slackでのお名前</td>
                            <td><input style="width: 80%" type="text"></td>
                        </tr>
                        <tr>
                            <td style="width: 200px">Discordでのお名前</td>
                            <td><input style="width: 80%" type="text"></td>
                        </tr>
                        <tr>
                            <td style="width: 200px">一言コメント</td>
                            <td><input style="width: 80%" type="text"></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <p>
                                    ででーんと書いちゃってください
                                </p>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="mb-12 text-center">
                <input type="submit" value="更新" class="!px-8 py-2 text-lg">
            </div>
        </form>
    </div>

    <div class="mx-auto mb-20 w-full">
        <h2 class="text-lg px-6 inline-block bg-bg rounded-full mb-4 mt-20" style="margin-left: 200px">MYLINK</h2>
        @php
        $timelineTitle="";
        $timelineDescription="";
        $timelineGenre="";
        $timelineStartDate="";
        $timelineEndDate="";
        @endphp
        @if(count($errors)>0)
        {{-- バリデーションエラーのとき --}}
        @php
        $timelineTitle=old("timelineTitle");
        $timelineDescription=old("timelineDescription");
        $timelineGenre=old("timelineGenre");
        $timelineStartDate=old("timelineStartDate");
        $timelineEndDate=old("timelineEndDate");
        @endphp
        {{-- エラーの表示 --}}
        <ul class="text-red-500 kiwi-maru text-center">
            @if($errors->has('timelineTitle'))
            <li class="text-red-500 kiwi-maru">
                {{$errors->first('timelineTitle')}}
            </li>
            @endif
            @if($errors->has('timelineDescription'))
            <li class="text-red-500 kiwi-maru">
                {{$errors->first('timelineDescription')}}
            </li>
            @endif
            @if($errors->has('timelineGenreId'))
            <li class="text-red-500 kiwi-maru">
                {{$errors->first('timelineGenreId')}}
            </li>
            @endif
            @if($errors->has('timelineStartDate'))
            <li class="text-red-500 kiwi-maru">
                {{$errors->first('timelineStartDate')}}
            </li>
            @endif
            @if($errors->has('timelineEndDate'))
            <li class="text-red-500 kiwi-maru">
                {{$errors->first('timelineEndDate')}}
            </li>
            @endif
        </ul>
        @endif
        <div class="rounded-3xl border-2 border-bg">
            <table class="w-full text-center edit rounded-3xl overflow-hidden">
                <tr class="bg-bg-sub">
                    <td>番号</td>
                    <td>URL</td>
                    <td>名称</td>
                    <td>説明</td>
                    <td>追加変更</td>
                    <td>削除</td>
                </tr>
                <tr>
                    <form method="POST" action="/user/edit/update/userLink">
                        <td style="width: 40px">1</td>
                        <td style="width: 250px"><input style="width: 80%" type="url" name="timelineUrl"></td>
                        <td style="width: 250px"><input style="width: 80%" type="text" name="timelineTitle"></td>
                        <td style="width: 300px"><textarea style="width: 80%; padding:.5rem;"
                                name="timelineDescription"></textarea></td>
                        <td style="width: 80px"><input type="submit" value="作成"></td>
                    </form>
                </tr>
                {{-- 登録済みデータ表示 --}}
                @isset($links)
                @php
                $i=1;
                @endphp
                @foreach($links as $link)
                @php
                $i+=1;
                @endphp
                <form method="POST" action="/user/edit/update/userLink">
                    @csrf
                    <input type="hidden" name="linkId" value="{{$link->id}}">
                    <tr>
                        <td style="width: 40px"> {{$i}}</td>
                        <td style="width: 250px"><input style="width: 80%" type="url" name="timelineUrl"
                                value="{{$link->url}}"></td>
                        <td style=""><input style=" width: 80%" type="text" name="linkTitle" value="{{$link->title}}"
                                required></td>
                        <td style=" width: 200px">
                            <textarea name="linkDescription"
                                style="width: 80%; padding:.5rem;">{{$link->description ?? ""}}</textarea>
                        </td>
                        <td style="width: 80px"><input type="submit" value="更新"></td>
                </form>
                <td style="width: 80px">
                    <form method="POST" action="/user/edit/delete/userLink">
                        @csrf
                        <input type="hidden" name="userlinkId" value="{{$link->id}}">
                        <input type="submit" value="削除" style="background-color: red; color: #fff;">
                    </form>
                </td>
                </tr>
                @endforeach
                @endisset
                <td colspan="6">
                    <p>使い方の例1：Twitterや自身のSNSのリンクを貼る　リンクの説明欄にフォローよろしくなどのコメントを書く。</p>
                    <p>使い方の例2：YouTubeのリンクを張る　リンクの説明欄にこれおすすめ！！って書く</p>
                </td>
                </tr>
            </table>
        </div>
    </div>

    <div class="mx-auto mb-20 w-full">
        <h2 class="text-lg px-6 inline-block bg-bg rounded-full mb-4 mt-20" style="margin-left: 200px">タイムライン登録</h2>
        @php
        $timelineTitle="";
        $timelineDescription="";
        $timelineGenre="";
        $timelineStartDate="";
        $timelineEndDate="";
        @endphp
        @if(count($errors)>0)
        {{-- バリデーションエラーのとき --}}
        @php
        $timelineTitle=old("timelineTitle");
        $timelineDescription=old("timelineDescription");
        $timelineGenre=old("timelineGenre");
        $timelineStartDate=old("timelineStartDate");
        $timelineEndDate=old("timelineEndDate");
        @endphp

        {{-- エラーの表示 --}}
        <ul class="text-red-500 kiwi-maru text-center">
            @if($errors->has('timelineTitle'))
            <li class="text-red-500 kiwi-maru">
                {{$errors->first('timelineTitle')}}
            </li>
            @endif
            @if($errors->has('timelineDescription'))
            <li class="text-red-500 kiwi-maru">
                {{$errors->first('timelineDescription')}}
            </li>
            @endif
            @if($errors->has('timelineGenreId'))
            <li class="text-red-500 kiwi-maru">
                {{$errors->first('timelineGenreId')}}
            </li>
            @endif
            @if($errors->has('timelineStartDate'))
            <li class="text-red-500 kiwi-maru">
                {{$errors->first('timelineStartDate')}}
            </li>
            @endif
            @if($errors->has('timelineEndDate'))
            <li class="text-red-500 kiwi-maru">
                {{$errors->first('timelineEndDate')}}
            </li>
            @endif
        </ul>
        @endif
        <div class="rounded-3xl border-2 border-bg">
            <table class="w-full text-center edit rounded-3xl overflow-hidden">
                <tr class="bg-bg-sub">
                    <td>番号</td>
                    <td>タイトル</td>
                    <td>説明</td>
                    <td>ジャンル</td>
                    <td>開始日/終了日</td>
                    <td>追加変更</td>
                    <td>削除</td>
                </tr>
                {{-- 初回分は登録フォームなのでループ外 --}}
                <form method="POST" action="/user/edit/update/userTimeline" id="timelineTable">
                    @csrf
                    <tr>
                        <td style="width: 40px">1</td>
                        <td style=""><input style="width: 80%" type="text" name="timelineTitle"
                                value="{{$timelineTitle}}" required></td>
                        <td style=" width: 300px">
                            <textarea name="timelineDescription"
                                style="width: 80%; padding:.5rem;">{{$timelineDescription}}</textarea>
                        </td>
                        <td>
                            <select name="timelineGenreId">
                                @php
                                $id=0;
                                @endphp
                                @foreach($timelineGenres as $timelineGenre)
                                @php
                                $id+=1;
                                @endphp
                                <option value="{{$timelineGenre['id']}}" @if($timelineGenre==$timelineGenre['id'])
                                    selected @endif>{{$timelineGenre['name']}}</option>
                                @endforeach
                            </select>
                        </td>
                        <td style=" font-size:.875rem; ">
                            <div class="mb-1">開始日 : <input type="date" name="timelineStartDate"
                                    value="{{$timelineStartDate}}" required>
                            </div>
                            <div>終了日 : <input type="date" name="timelineEndDate" value={{$timelineEndDate ?? "" }}>
                            </div>
                        </td>
                        <td style="width: 80px"><input type="submit" value="作成"></td>
                        <td style="width: 80px">

                        </td>
                    </tr>
                </form>
                {{-- 登録済みデータ表示 --}}
                @isset($timelines)
                @php
                $i=1;
                @endphp
                @foreach($timelines as $timeline)
                @php
                $i+=1;
                @endphp
                <form method="POST" action="/user/edit/update/userTimeline">
                    @csrf
                    <input type="hidden" name="timelineId" value="{{$timeline->id}}">
                    <tr>
                        <td style="width: 40px"> {{$i}}</td>
                        <td style=""><input style="width: 80%" type="text" name="timelineTitle"
                                value="{{$timeline->title}}" required></td>
                        <td style=" width: 200px">
                            <textarea name="timelineDescription"
                                style="width: 80%; padding:.5rem;">{{$timeline->description ?? ""}}</textarea>
                        </td>
                        <td>
                            <select name="timelineGenreId">
                                @php
                                $id=0;
                                @endphp
                                @foreach($timelineGenres as $timelineGenre)
                                @php
                                $id+=1;
                                @endphp
                                <option value="{{$timelineGenre['id']}}" @if($timeline->genre->value()
                                    ==$timelineGenre['id'])
                                    selected
                                    @endif
                                    >{{$timelineGenre['name']}}</option>
                                @endforeach
                            </select>
                        </td>
                        <td style=" font-size:.875rem; ">
                            <div class="mb-1">開始日 : <input type="date" name="timelineStartDate"
                                    value="{{$timeline->start_date->format('Y-m-d')}}" required>
                            </div>
                            <div>終了日 : <input type="date" name="timelineEndDate" value={{$timeline->end_date ?
                                $timeline->end_date->format('Y-m-d'):""}}>
                            </div>
                        </td>
                        <td style="width: 80px"><input type="submit" value="更新"></td>
                </form>
                <td style="width: 80px">
                    <form method="POST" action="/user/edit/delete/userTimeline">
                        @csrf
                        <input type="hidden" name="userTimelineId" value="{{$timeline->id}}">
                        <input type="submit" value="削除" style="background-color: red; color: #fff;">
                    </form>
                </td>
                </tr>
                @endforeach
                @endisset
                <td colspan="7">
                    <p>タイムラインでは、自分の学業、お仕事、資格、所属団体、大会などの結果や情報を時系列で表示できます。<br>
                        例　けん玉15級を取得、卓球部に入部</p>
                </td>
                </tr>
            </table>
        </div>
    </div>
</div>

@endsection
