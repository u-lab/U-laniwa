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
        <form action="/user/edit/update/userInfo" method="post">
            @php
            $originName = $user->name;
            $originImg = $user->profile_photo_path ?? "";
            $originLastName = $userInfo->last_name?? "";
            $originFirstName = $userInfo->first_name?? "";
            $originGender = $userInfo->gender->value()?? "";
            $originBirthDay = $userInfo->birth_day?? "";
            $originIsPublishBirthDay = $userInfo->is_publish_birth_day?? "";
            $originGrade = $userInfo->grade->value()?? "";
            //会社
            $originCompany = $userInfo->company?? "";
            $originPosition = $userInfo->position?? "";
            //大学
            $originUniversity = $userInfo->university?? "";
            $originFaculty= $userInfo->faculty?? "";
            $originMajor = $userInfo->major?? "";
            $originUUMajor = $userInfo->u_u_major_id?? "";
            $originUUFaculty = $userInfo->u_u_faculty_id?? "";
            //趣味
            $originGroupAffiliation= $userInfo->group_affiliation?? "";
            $originGithubId = $userInfo->github_id?? "";
            $originLineName = $userInfo->line_name?? "";
            $originSlackName = $userInfo->slack_name?? "";
            $originDiscordName = $userInfo->discord_name?? "";
            $originHobby = $userInfo->hobby?? "";
            $originInterests = $userInfo->interests?? "";
            $originMotto = $userInfo->motto?? "";
            $originStatus= $userInfo->status?? "";
            //出身
            $originBirthCountry= $userInfo->birth_country_id?? "";
            $originBirthPrefecture= $userInfo->birth_prefecture_id?? "";
            $originBirthMunicipality= $userInfo->birth_area_id?? "";
            //現住
            $originLiveCountry= $userInfo->live_country_id?? "";
            $originLivePrefecture= $userInfo->live_prefecture_id?? "";
            $originLiveMunicipality= $userInfo->live_area_id?? "";
            @endphp
            @csrf
            <div class="mx-auto mb-20" style="width: 600px">
                <h2 class="text-lg px-6 inline-block bg-bg rounded-full mb-4 mt-20">プロフィール画像</h2>
                <div class="rounded-3xl border-2 border-bg">
                    <table class="w-full text-center edit rounded-3xl overflow-hidden">
                        <tr class="bg-bg-sub">
                            <td>プロフィール画像</td>
                            <td>画像を追加</td>
                        </tr>
                        <tr>
                            <td style="width: 250px"><img id="userImage" src="{{asset('storage/'.$originImg)}}"
                                    class="w-48 inline-block">
                            </td>
                            <td style="width: 250px"><input style="max-width: 250px" id="forCompress" type="file"
                                    name="img"></td>
                            <input type="hidden" id="profilePhotoPath" name="profilePhotoPath">
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
                            <td><input required style="width: 80%" type="text" name="userName" value="{{$originName}}">
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 200px">姓/名</td>
                            <td>
                                <input required style="width: 38%; margin-right:4%;" type="text" name="lastName"
                                    value="{{$originLastName}}">
                                <input required style="width: 38%" type="text" name="firstName"
                                    value="{{$originFirstName}}">
                            </td>
                        </tr>
                        <tr>
                            <td style=" width: 200px">誕生日
                            </td>
                            <td>
                                <input style="width: 50%; margin-right:5%;" type="date" value={{$originBirthDay}}>
                                <p class="inline-block text-right" style="width: 20%">公開する</p>
                                <input type="checkbox" name="isPublishBirthDay" {{$originIsPublishBirthDay==1
                                    ? "checked" :""}}>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 200px">性別</td>
                            <td>
                                <select name='gender' style="width: 80%" required>
                                    <option value="0">選択してください</option>
                                    @foreach ($genders as $gender)
                                    <option value="{{$loop->iteration}}" @if ($loop->iteration==$originGender)
                                        selected
                                        @endif>{{$gender['name']}}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 200px">学年</td>
                            <td>
                                <select name='grade' style="width: 80%" required>
                                    <option name='gradeOption' value="0" selected>選択してください</option>
                                    @foreach ($grades as $grade)
                                    <option name='gradeOption' value="{{$loop->iteration}}" @if ($loop->
                                        iteration==$originGrade)
                                        selected
                                        @endif>{{$grade['name']}}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                        <tr name="company">
                            <td style="width: 200px">会社名/役職名</td>
                            <td>
                                <input style="width: 38%; margin-right:4%;" type="text" name="company"
                                    value="{{$originCompany}}">
                                <input style="width: 38%;" type="text" name="position" value="{{$originPosition}}">
                            </td>

                        </tr>
                        <tr name="university">
                            <td style="width: 200px">大学</td>
                            <td>
                                <input type="radio" name="univRadio" value="宇都宮大学" @if ($originUUMajor)
                                checked
                                @endif>
                                <label for='宇都宮大学' style='margin-right: 10%'>宇都宮大学</label>
                                <input type="radio" name="univRadio" value="他大学" @if ($originUniversity)
                                checked
                                @endif>
                                <label for='他大学'>他大学</label>
                            </td>
                        </tr>
                        <tr name="university" id="UU">
                            <td style="width: 200px">学部/学科</td>
                            <td>
                                <select name='uuFaculty' style="width: 38%; margin-right:4%;">
                                    @foreach ($uuFaculties as $uuFacultie)
                                    <option value="{{$loop->iteration}}" @if ($loop->iteration==$originUUFaculty)
                                        selected
                                        @endif>{{$uuFacultie['name']}}
                                    </option>
                                    @endforeach
                                </select>
                                <select name='uuMajor' style="width: 38%; margin-right:4%;">
                                    @foreach ($uuFaculties as $uuFacultie)
                                    <option value="{{$loop->iteration}}" @if ($loop->iteration==$originUUMajor)
                                        selected
                                        @endif>{{$uuFacultie['name']}}
                                    </option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                        <tr name="university" id="other">
                            <td style="width: 200px">大学名/学部/学科</td>
                            <td>
                                <input style="width: 24%; margin-right:4%;" type="text" name="university"
                                    value={{$originUniversity}}>
                                <input style="width: 24%; margin-right:4%;" type="text" name="faculty"
                                    value={{$originFaculty}}>
                                <input style="width: 24%" type="text" name="major" value={{$originMajor}}>
                            </td>
                        </tr>
                        <script>
                            /* ラジオボタン */
                            const radioBtns = document.querySelectorAll('input[name="univRadio"]');  // 大学のラジオボタンのNodeList

                            /* ラジオボタンで制御する項目 */
                            const UU = document.querySelector('#UU');  // 宇大の入力項目
                            const other = document.querySelector('#other');  // 他大の入力項目



                            /* 大学のラジオボタンによる条件分岐 */
                            [...radioBtns].forEach(radioBtn => {
                                radioBtn.addEventListener('change', () => {  // ラジオボタンの各選択肢が更新されたとき
                                    if (radioBtn.checked && radioBtn.value === '宇都宮大学') {  // 宇大がcheckedのとき
                                        // 宇大の入力項目を表示・他大の入力項目を非表示
                                        UU.classList.remove('hidden');
                                        other.classList.add('hidden');
                                    } else {  // 他大がcheckedのとき
                                        // 宇大の入力項目を非表示・他大の入力項目を表示
                                        UU.classList.add('hidden');
                                        other.classList.remove('hidden');
                                    }
                                });
                            });
                            /* 学年のプルダウンメニューによる条件分岐 */
                            document.querySelector('select[name="grade"]').addEventListener('change', () => {  // 学年プルダウンが更新されたとき
                                /* プルダウン */
                                const options = document.querySelectorAll('option[name="gradeOption"]');
                                const selectedOption = [...options].find(option => option.selected);  // 選択状態のプルダウンの選択肢

                                /* プルダウンで制御する項目 */
                                const company = document.querySelector('tr[name="company"]');  // 会社の入力項目
                                const universities = document.querySelectorAll('tr[name="university"]');  // 大学の入力項目のNodeList
                                if (selectedOption.value < 10) {  // 学生が選択されているとき
                                    //会社の入力項目を非表示, 学生ラジオボタンを表示
                                    company.classList.add('hidden');
                                    universities.item(0).classList.remove('hidden');
                                } else {  //社会人・その他が選択されている時
                                    //会社の入力項目を表示, 学生の入力項目全体をを非表示, 大学ラジオボタンのチェックを外す
                                    company.classList.remove('hidden');
                                    [...universities].forEach(university => university.classList.add('hidden'));
                                    [...radioBtns].forEach(radioBtn => radioBtn.checked = radioBtn.checked && false);
                                }
                            });

                        </script>
                        <tr>
                            <td style="width: 200px">兼部・サークル</td>
                            <td><input style="width: 80%" type="text" name="groupAffiliation"
                                    value="{{$originGroupAffiliation}}"></td>
                        </tr>
                        <tr>
                            <td style="width: 200px">出身地</td>
                            <td>
                                <select name='birthCountry' style="width: 24%; margin-right:4%;" required>
                                    @foreach ($countries as $country)
                                    <option value="{{$loop->iteration}}">{{$country['name']}}</option>
                                    @endforeach
                                </select>
                                <select name='birthPrefecture' style="width: 24%; margin-right:4%;" required>
                                    @foreach ($countries as $country)
                                    <option value="{{$loop->iteration}}">{{$country['name']}}</option>
                                    @endforeach
                                </select>
                                <select name='birthMunicipality' style="width: 24%; margin-right:4%;" required>
                                    @foreach ($countries as $country)
                                    <option value="{{$loop->iteration}}">{{$country['name']}}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 200px">現住地</td>
                            <td>
                                {{-- TODO: 同上 --}}
                                <select name='liveCountry' style="width: 24%; margin-right:4%;" required>
                                    @foreach ($countries as $country)
                                    <option value="{{$loop->iteration}}">{{$country['name']}}</option>
                                    @endforeach
                                </select>
                                <select name='livePrefecture' style="width: 24%; margin-right:4%;" required>
                                    @foreach ($countries as $country)
                                    <option value="{{$loop->iteration}}">{{$country['name']}}</option>
                                    @endforeach
                                </select>
                                <select name='liveMunicipality' style="width: 24%; margin-right:4%;" required>
                                    @foreach ($countries as $country)
                                    <option value="{{$loop->iteration}}">{{$country['name']}}</option>
                                    @endforeach
                                </select>
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
                            <td><input style="width: 80%" type="text" value="hobby" value="{{$originHobby}}"></td>
                        </tr>
                        <tr>
                            <td style="width: 200px">興味</td>
                            <td><input style="width: 80%" type="text" value="interests " value="{{$originInterests }}">
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 200px">座右の銘</td>
                            <td><input style="width: 80%" type="text" value="motto " value="{{$originMotto }}"></td>
                        </tr>
                        <tr>
                            <td style="width: 200px">GitHub ID</td>
                            <td><input style="width: 80%" type="text" value="githubId " value="{{$originGithubId}}">
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 200px">LINEでのお名前</td>
                            <td><input style="width: 80%" type="text" value="lineName " value="{{$originLineName }}">
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 200px">Slackでのお名前</td>
                            <td><input style="width: 80%" type="text" value="slackName " value="{{$originSlackName  }}">
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 200px">Discordでのお名前</td>
                            <td><input style="width: 80%" type="text" value="discordName "
                                    value="{{$originDiscordName }}"></td>
                        </tr>
                        <tr>
                            <td style="width: 200px">一言コメント</td>
                            <td><input style="width: 80%" type="text" value="status " value="{{$originStatus }}"></td>
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
        $linkTitle="";
        $linkDescription="";
        $linkUrl="";
        @endphp
        @if(count($errors)>0)
        {{-- バリデーションエラーのとき --}}
        @php
        $linkTitle=old("linkTitle");
        $linkDescription=old("linkDescription");
        $linkUrl=old("linkUrl");
        @endphp
        {{-- エラーの表示 --}}
        <ul class="text-red-500 text-center">
            @if($errors->has('linkUrl'))
            <li class="text-red-500">
                {{$errors->first('linkUrl')}}
            </li>
            @endif
            @if($errors->has('linkTitle'))
            <li class="text-red-500">
                {{$errors->first('linkTitle')}}
            </li>
            @endif
            @if($errors->has('linkDescription'))
            <li class="text-red-500">
                {{$errors->first('linkDescription')}}
            </li>
            @endif

        </ul>
        @endif
        <div class="rounded-3xl border-2 border-bg">
            <table class="w-full text-center edit rounded-3xl overflow-hidden" id="linkTable">
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
                        @csrf
                        <td style="width: 40px">1</td>
                        <td style="width: 250px"><input style="width: 80%" type="url" name="linkUrl" required></td>
                        <td style="width: 250px"><input style="width: 80%" type="text" name="linkTitle" required></td>
                        <td style="width: 300px"><textarea style="width: 80%; padding:.5rem;"
                                name="linkDescription"></textarea></td>
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
                        <td style="width: 250px"><input style="width: 80%" type="url" name="linkUrl"
                                value="{{$link->url}}" required></td>
                        <td style=""><input style=" width: 80%" type="text" name="linkTitle" value="{{$link->title}}"
                                required required></td>
                        <td style=" width: 200px">
                            <textarea name="linkDescription"
                                style="width: 80%; padding:.5rem;">{{$link->description ?? ""}}</textarea>
                        </td>
                        <td style="width: 80px"><input type="submit" value="更新"></td>
                </form>
                <td style="width: 80px">
                    <form method="POST" action="/user/edit/delete/userLink">
                        @csrf
                        <input type="hidden" name="userLinkId" value="{{$link->id}}">
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
        <ul class="text-red-500 text-center">
            @if($errors->has('timelineTitle'))
            <li class="text-red-500">
                {{$errors->first('timelineTitle')}}
            </li>
            @endif
            @if($errors->has('timelineDescription'))
            <li class="text-red-500">
                {{$errors->first('timelineDescription')}}
            </li>
            @endif
            @if($errors->has('timelineGenreId'))
            <li class="text-red-500">
                {{$errors->first('timelineGenreId')}}
            </li>
            @endif
            @if($errors->has('timelineStartDate'))
            <li class="text-red-500">
                {{$errors->first('timelineStartDate')}}
            </li>
            @endif
            @if($errors->has('timelineEndDate'))
            <li class="text-red-500">
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

<script src="{{ mix('js/imageCompress.js') }}"></script>
@endsection
