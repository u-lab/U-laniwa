@extends("layouts.main")
@section("title","ユーザー情報編集")

@section('header')
@parent
@endsection
@section('content')
@php
$user=Auth::user();
@endphp
@include('components.forMembers.pageTitle', ['title'=>$user->name.'さんのユーザー情報編集'])

<div class="mx-auto mb-80" style="max-width: 1200px">
    <div class="w-full text-center">
        <a href='/user/{{$user->id}}'
            class="inline-block px-10 py-2 bg-bg rounded-lg mt-8  text-lg font-bold">ユーザー詳細へ戻る</a>
        <p class="text-center mb-8 text-xs mt-2">※必ず「更新」ボタンで保存の上、お戻りください</p>

    </div>
    <div class="border-4 p-2 mb-20 rounded-2xl border-dotted border-bg">
        @php
        $originProfilePhotoPath = $user->profile_photo_path;
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
        $originHobbies = $userInfo->hobbies?? "";
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
        @if(count($errors)>0)
        {{-- バリデーションエラーのとき --}}
        @php
        $originProfilePhotoPath =old('profilePhotoPath');
        $originName =old('userName');
        $originImg = $originProfilePhotoPath ?? "";//ここは別ロジックなので画像とってこれないから古い画像を付与
        $originLastName =old('lastName');
        $originFirstName =old('firstName');
        $originGender = old('gender');
        $originBirthDay = old('birthDay');
        $originIsPublishBirthDay =old('isPublishBirthDay');
        $originGrade =old('grade');
        //会社
        $originCompany = old('company');
        $originPosition =old('position');
        //大学
        $originUniversity =old('university');
        $originFaculty= old('faculty');
        $originMajor = old('major');
        $originUUMajor = old('uuMajorId');
        $originUUFaculty = old('uuFacultyId');
        //趣味
        $originGroupAffiliation=old('groupAffiliation');
        $originGithubId = old('githubId');
        $originLineName = old('lineName');
        $originSlackName = old('slackName');
        $originDiscordName = old('discordName');
        $originHobbies = old('hobbies');
        $originInterests = old('interests');
        $originMotto =old('motto');
        $originStatus= old('status');
        //出身
        $originBirthCountry= old('birthCountryId');
        $originBirthPrefecture=old('birthPrefectureId');
        $originBirthMunicipality=old('birthMunicipalityId');
        //現住
        $originLiveCountry=old('liveCountryId');
        $originLivePrefecture= old('livePrefectureId');
        $originLiveMunicipality=old('liveMunicipalityId');
        @endphp
        {{-- エラーの表示 --}}
        <ul class="text-red-500 text-center">
            @if($errors->has('profilePhotoPath'))
            <li class="text-red-500">
                {{$errors->first('profilePhotoPath')}}
            </li>
            @endif
            @if($errors->has('userName'))
            <li class="text-red-500">
                {{$errors->first('userName')}}
            </li>
            @endif
            @if($errors->has('lastName'))
            <li class="text-red-500">
                {{$errors->first('lastName')}}
            </li>
            @endif
            @if($errors->has('firstName'))
            <li class="text-red-500">
                {{$errors->first('firstName')}}
            </li>
            @endif
            @if($errors->has('gender'))
            <li class="text-red-500">
                {{$errors->first('gender')}}
            </li>
            @endif
            @if($errors->has('birthDay'))
            <li class="text-red-500">
                {{$errors->first('birthDay')}}
            </li>
            @endif
            @if($errors->has('isPublishBirthDay'))
            <li class="text-red-500">
                {{$errors->first('isPublishBirthDay')}}
            </li>
            @endif
            @if($errors->has('grade'))
            <li class="text-red-500">
                {{$errors->first('grade')}}
            </li>
            @endif
            @if($errors->has('company'))
            <li class="text-red-500">
                {{$errors->first('company')}}
            </li>
            @endif
            @if($errors->has('position'))
            <li class="text-red-500">
                {{$errors->first('position')}}
            </li>
            @endif
            @if($errors->has('university'))
            <li class="text-red-500">
                {{$errors->first('university')}}
            </li>
            @endif
            @if($errors->has('faculty'))
            <li class="text-red-500">
                {{$errors->first('faculty')}}
            </li>
            @endif
            @if($errors->has('major'))
            <li class="text-red-500">
                {{$errors->first('major')}}
            </li>
            @endif
            @if($errors->has('uuMajorId'))
            <li class="text-red-500">
                {{$errors->first('uuMajorId')}}
            </li>
            @endif
            @if($errors->has('uuFacultyId'))
            <li class="text-red-500">
                {{$errors->first('uuFacultyId')}}
            </li>
            @endif
            @if($errors->has('groupAffiliation'))
            <li class="text-red-500">
                {{$errors->first('groupAffiliation')}}
            </li>
            @endif
            @if($errors->has('githubId'))
            <li class="text-red-500">
                {{$errors->first('githubId')}}
            </li>
            @endif
            @if($errors->has('lineName'))
            <li class="text-red-500">
                {{$errors->first('lineName')}}
            </li>
            @endif
            @if($errors->has('slackName'))
            <li class="text-red-500">
                {{$errors->first('slackName')}}
            </li>
            @endif
            @if($errors->has('discordName'))
            <li class="text-red-500">
                {{$errors->first('discordName')}}
            </li>
            @endif
            @if($errors->has('hobbies'))
            <li class="text-red-500">
                {{$errors->first('hobbies')}}
            </li>
            @endif
            @if($errors->has('interests'))
            <li class="text-red-500">
                {{$errors->first('interests')}}
            </li>
            @endif
            @if($errors->has('motto'))
            <li class="text-red-500">
                {{$errors->first('motto')}}
            </li>
            @endif
            @if($errors->has('status'))
            <li class="text-red-500">
                {{$errors->first('status')}}
            </li>
            @endif
            @if($errors->has('birthCountryId'))
            <li class="text-red-500">
                {{$errors->first('birthCountryId')}}
            </li>
            @endif
            @if($errors->has('birthPrefectureId'))
            <li class="text-red-500">
                {{$errors->first('birthPrefectureId')}}
            </li>
            @endif
            @if($errors->has('birthMunicipalityId'))
            <li class="text-red-500">
                {{$errors->first('birthMunicipalityId')}}
            </li>
            @endif
            @if($errors->has('liveCountryId'))
            <li class="text-red-500">
                {{$errors->first('liveCountryId')}}
            </li>
            @endif
            @if($errors->has('livePrefectureId'))
            <li class="text-red-500">
                {{$errors->first('livePrefectureId')}}
            </li>
            @endif
            @if($errors->has('liveMunicipalityId'))
            <li class="text-red-500">
                {{$errors->first('liveMunicipalityId')}}
            </li>
            @endif

        </ul>
        @endif
        <form action="/user/edit/update/userInfo" method="post" id="userInfoTable">
            @csrf
            <div class="mx-auto mb-20" style="width: 600px">
                <h2 class="text-lg px-6 inline-block bg-bg rounded-full mb-4 mt-10">プロフィール画像</h2>
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
                            <input type="hidden" id="profilePhotoPath" name="profilePhotoPath"
                                value="{{$originProfilePhotoPath}}">
                        </tr>
                    </table>
                </div>
            </div>

            <div class="mx-auto mb-20 w-full">
                <h2 class="text-lg px-6 inline-block bg-bg rounded-full mb-4 mt-10" style="margin-left: 200px">基本情報</h2>
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
                                <input style="width: 50%; margin-right:5%;" type="date" name="birthDay"
                                    value={{$originBirthDay}}>
                                <p class="inline-block text-right" style="width: 20%">公開する</p>
                                <input type="checkbox" name="isPublishBirthDay" {{$originIsPublishBirthDay==1
                                    ? "checked" :""}}>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 200px">性別</td>
                            <td>
                                <select name='gender' style="width: 80%" required>
                                    <option hidden>選択してください</option>
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
                                    <option name='gradeOption' hidden>選択してください</option>
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
                                <input type="radio" name="univRadio" value="uu" @if ($originUUMajor) checked @endif>
                                <label for='宇都宮大学' style='margin-right: 10%'>宇都宮大学</label>
                                <input type="radio" name="univRadio" value="else" @if ($originUniversity) checked
                                    @endif>
                                <label for='他大学'>他大学</label>
                            </td>
                        </tr>
                        <tr name="university" id="UU">
                            <td style="width: 200px">学部/学科</td>
                            <td>
                                <select name='uuFaculty' style="width: 38%; margin-right:4%;">
                                    <option hidden>選択してください</option>
                                    @foreach ($uuFaculties as $uuFacultie)
                                    <option value="{{$loop->iteration}}" @if ($loop->iteration==$originUUFaculty)
                                        selected
                                        @endif>{{$uuFacultie['name']}}
                                    </option>
                                    @endforeach
                                </select>
                                <select name='uuMajorId' style="width: 38%; margin-right:4%;">
                                    @foreach ($uuFaculties as $uuFacultie)
                                    <option value="1" @if ($loop->iteration==$originUUMajor)

                                        selected
                                        @endif>{{$uuFacultie['name']}}
                                    </option>
                                    @endforeach --}}
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
                        <tr>
                            <td style="width: 200px">兼部・サークル</td>
                            <td><input style="width: 80%" type="text" name="groupAffiliation"
                                    value="{{$originGroupAffiliation}}"></td>
                        </tr>
                        <tr>
                            <td style="width: 200px">出身地</td>
                            <td>
                                <select name='birthCountry' style="width: 24%; margin-right:4%;" required>
                                    {{-- optionのvalueを国コードにしたいがためにループのカウンタに81かける無茶苦茶な実装になってしまいました --}}
                                    <option hidden>選択してください</option>
                                    @foreach ($countries as $country)
                                    <option value="{{$loop->index * 81}}">{{$country['name']}}</option>
                                    @endforeach
                                </select>
                                <select name='birthPrefecture' style="width: 24%; margin-right:4%;" required></select>
                                <select name='birthMunicipality' style="width: 24%; margin-right:4%;" required></select>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 200px">現住地</td>
                            <td>
                                <select name='liveCountry' style="width: 24%; margin-right:4%;" required>
                                    <option hidden>選択してください</option>
                                    @foreach ($countries as $country)
                                    <option value="{{$loop->index * 81}}">{{$country['name']}}</option>
                                    @endforeach
                                </select>
                                <select name='livePrefecture' style="width: 24%; margin-right:4%;" required></select>
                                <select name='liveMunicipality' style="width: 24%; margin-right:4%;" required></select>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <p>
                                    ユーザー名、ひとことコメント、学部学科はメンバー一覧で表示されます<br>
                                    兼部・サークルがある場合は「卓球、写真サークル」のように部とサークルの間を“、”で分割してお書き下さい
                                </p>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>

            <script>
                /* 大学のラジオボタンによる条件分岐 */
                /* ラジオボタン */
                const radioBtns = document.querySelectorAll('input[name="univRadio"]');  // 大学のラジオボタンのNodeList

                /* ラジオボタンで制御する項目 */
                const UU = document.querySelector('#UU');  // 宇大の入力項目
                const other = document.querySelector('#other');  // 他大の入力項目

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

                // 学科のプルダウンを制御する関数
                function manageMajor(listened, target) {
                    listened.addEventListener('change', () => {
                        const options = listened.childNodes;
                        const selectedOption = [...options].find(option => option.selected);  // 選択状態のプルダウンの選択肢
                        fetchMajor(selectedOption.value)
                            .then(data => {
                                target.innerHTML = '';
                                data.forEach(elem => {
                                    target.appendChild(document.createElement('option'));
                                    const option = target.lastElementChild;
                                    option.value = elem.id;
                                    option.textContent = elem.name;
                                });
                            })
                            .catch(err => console.log(err));
                    });

                    async function fetchMajor(id) {
                        const res = await fetch('https://u-laniwa.tk' + `/api/get/major/${id}`);
                        return await res.json();
                    }
                }

                // 出身地・現住地のプルダウンを制御する関数
                function manageAreaSection(country, prefecture, municipality) {
                    createPulldownByAPI(country, 'prefecture', prefecture, 'prefecture_code', 'name');
                    createPulldownByAPI(prefecture, 'municipality', municipality, 'municipality_code', 'municipality');
                    country.addEventListener('change', () => municipality.innerHTML = '');

                    // API経由で地域情報を取得し、プルダウンのオプションを生成する関数
                    function createPulldownByAPI(listened, property, target, code, content) {
                        listened.addEventListener('change', () => {
                            const options = listened.childNodes;
                            const selectedOption = [...options].find(option => option.selected);  // 選択状態のプルダウンの選択肢
                            fetchArea(property, selectedOption.value)
                                .then(data => {
                                    target.innerHTML = '';
                                    data.forEach(elem => {
                                        target.appendChild(document.createElement('option'));
                                        const option = target.lastElementChild;
                                        option.value = elem[code];
                                        option.textContent = elem[content];
                                    });
                                })
                                .catch(err => console.log(err));
                        });

                        async function fetchArea(property, id) {
                            const res = await fetch('https://u-laniwa.tk' + `/api/get/area/${property}/${id}`);
                            return await res.json();
                        }
                    }
                }


                window.onload = () => {
                    // API経由で学科情報を取得し、プルダウンのオプションを生成
                    const uuFaculty = document.querySelector('select[name="uuFaculty"]');
                    const uuMajor = document.querySelector('select[name="uuMajor"]');
                    manageMajor(uuFaculty, uuMajor);

                    // API経由で地域情報を取得し、プルダウンのオプションを生成
                    /* 出身地 */
                    const birthCountry = document.querySelector('select[name="birthCountry"]');
                    const birthPrefecture = document.querySelector('select[name="birthPrefecture"]');
                    const birthMunicipality = document.querySelector('select[name="birthMunicipality"]');
                    manageAreaSection(birthCountry, birthPrefecture, birthMunicipality);

                    /* 現住地 */
                    const liveCountry = document.querySelector('select[name="liveCountry"]');
                    const livePrefecture = document.querySelector('select[name="livePrefecture"]');
                    const liveMunicipality = document.querySelector('select[name="liveMunicipality"]');
                    manageAreaSection(liveCountry, livePrefecture, liveMunicipality);



                    // 初期値による会社・大学の入力項目の条件分岐
                    /* プルダウン */
                    const options = document.querySelectorAll('option[name="gradeOption"]');
                    const selectedOption = [...options].find(option => option.selected);  // 選択状態のプルダウンの選択肢

                    /* プルダウンで制御する項目 */
                    const company = document.querySelector('tr[name="company"]');  // 会社の入力項目
                    const universities = document.querySelectorAll('tr[name="university"]');  // 大学の入力項目のNodeList

                    if (selectedOption.value < 10) {  // 学生が選択されているとき
                        company.classList.add('hidden');  // 会社の入力項目を非表示
                    } else {  //社会人・その他が選択されている時
                        [...universities].forEach(university => university.classList.add('hidden')); // 学生の入力項目全体をを非表示
                    }


                    /* ラジオボタン */
                    const UUBtn = document.querySelector('input[value="宇都宮大学"]');
                    const otherBtn = document.querySelector('input[value="他大学"]');

                    /* ラジオボタンで制御する項目 */
                    const UU = document.querySelector('#UU');  // 宇大の入力項目
                    const other = document.querySelector('#other');  // 他大の入力項目

                    if (UUBtn.checked) {  // "宇都宮大学"が選択されているとき
                        other.classList.add('hidden');  // 他大学の入力項目を非表示
                    } else if (otherBtn.checked) { // "他大学"が選択されているとき
                        UU.classList.add('hidden');  // 宇大の入力項目を非表示
                    }
                }

            </script>

            <div class="mx-auto mb-12 w-full">
                <h2 class="text-lg px-6 inline-block bg-bg rounded-full mb-4 mt-10" style="margin-left: 200px">パーソナルデータ
                </h2>
                <div class="rounded-3xl border-2 border-bg">
                    <table class="w-full text-center edit rounded-3xl overflow-hidden">
                        <tr class="bg-bg-sub">
                            <td>項目</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td style="width: 200px">趣味</td>
                            <td><input style="width: 80%" type="text" name="hobbies" value="{{$originHobbies}}"></td>
                        </tr>
                        <tr>
                            <td style="width: 200px">興味</td>
                            <td><input style="width: 80%" type="text" name="interests" value="{{$originInterests }}">
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 200px">座右の銘</td>
                            <td><input style="width: 80%" type="text" name="motto" value="{{$originMotto}}"></td>
                        </tr>
                        <tr>
                            <td style="width: 200px">GitHub ID</td>
                            <td><input style="width: 80%" type="text" name="githubId" value="{{$originGithubId}}">
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 200px">LINEでのお名前</td>
                            <td><input style="width: 80%" type="text" name="lineName" value="{{$originLineName}}">
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 200px">Slackでのお名前</td>
                            <td><input style="width: 80%" type="text" name="slackName" value="{{$originSlackName }}">
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 200px">Discordでのお名前</td>
                            <td><input style="width: 80%" type="text" name="discordName" value="{{$originDiscordName}}">
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 200px">ひとことコメント</td>
                            <td><input style="width: 80%" type="text" name="status" value="{{$originStatus}}"></td>
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
        <h2 class="text-lg px-6 inline-block bg-bg rounded-full mb-4 mt-10" style="margin-left: 200px">MYLINK</h2>

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
                <td colspan="6" class="text-left pl-4">
                    <p>使い方の例1：Twitterや自身のSNSのリンクを貼る　リンクの説明欄にフォローよろしくなどのコメントを書く。</p>
                    <p>使い方の例2：YouTubeのリンクを張る　リンクの説明欄にこれおすすめ！！って書く</p>
                    <p>※まとめての更新ではできませんので、ご注意ください</p>
                </td>
                </tr>
            </table>
        </div>
    </div>

    <div class="mx-auto mb-20 w-full">
        <h2 class="text-lg px-6 inline-block bg-bg rounded-full mb-4 mt-10" style="margin-left: 200px">タイムライン登録</h2>
        @php
        $timelineTitle="";
        $timelineDescription="";
        $timelineGenreId="";
        $timelineStartDate="";
        $timelineEndDate="";
        @endphp
        @if(count($errors)>0)
        {{-- バリデーションエラーのとき --}}
        @php
        $timelineTitle=old("timelineTitle");
        $timelineDescription=old("timelineDescription");
        $timelineGenreId=old("timelineGenreId");
        $timelineStartDate=old("timelineStartDate");
        $timelineEndDate=old("timelineEndDate");
        var_dump($errors);
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
            <table class="w-full text-center edit rounded-3xl overflow-hidden" id="timelineTable">
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
                <form method="POST" action="/user/edit/update/userTimeline">
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
                                <option value="{{$timelineGenre['id']}}" @if($timelineGenreId==$timelineGenre['id'])
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
                <td colspan="7" class="text-left pl-4">
                    <p>タイムラインでは、自分の学業、お仕事、資格、所属団体、大会などの結果や情報を時系列で表示できます。<br>
                        例　けん玉15級を取得、卓球部に入部</p>
                    <p>※まとめての更新ではできませんので、ご注意ください</p>
                </td>
                </tr>
            </table>
        </div>
    </div>
</div>

<script src="{{ mix('js/imageCompress.js') }}"></script>
@endsection