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

<div class="mx-auto mb-80" style="max-width: 1000px">
    <div class="border-2 p-2 mb-20">
        <form action="/user/edit/update/userInfo" method="post">
            @php
            $originImg = url('/'.$user->profile_photo_path);
            $originName = $user->name;
            $originLastName = $userInfo->last_name;
            $originFirstName = $userInfo->first_name;
            $originGender = $userInfo->gender;
            $originBirthDay = $userInfo->birth_day;
            $originGrade = $userInfo->grade;
            $originCompany = $userInfo->company;
            $originPosition = $userInfo->position;
            @endphp
            @csrf
            <div class="mx-auto mb-20" style="width: 600px">
                <h2 class="text-lg px-6 inline-block bg-bg rounded-full mb-4">プロフィール画像</h2>
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
                            <td style="width: 250px"><input style="max-width: 250px" type="file" name="img"></td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="mx-auto mb-20 w-full">
                <h2 class="text-lg px-6 inline-block bg-bg rounded-full mb-4" style="margin-left: 200px">基本情報</h2>
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
                                <select name='grade' style="width: 80%" required='true'>
                                    <option name='gradeOption' value="0" selected>選択してください</option>
                                    @foreach ($grades as $grade)
                                    <option name='gradeOption' value="{{$loop->iteration}}">{{$grade['name']}}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                        <tr name="company" class="hidden">
                            <td style="width: 200px">会社名/役職名</td>
                            <td>
                                <input required='true' style="width: 38%; margin-right:4%;" type="text">
                                <input required='true' style="width: 38%;" type="text">
                            </td>

                        </tr>
                        <tr name="university" class="hidden">
                            <td style="width: 200px">大学</td>
                            <td>
                                <input type="radio" name="univRadio" value="宇都宮大学">
                                <label for='宇都宮大学' style='margin-right: 10%'>宇都宮大学</label>
                                <input type="radio" name="univRadio" value="他大学">
                                <label for='他大学'>他大学</label>
                            </td>
                        </tr>
                        <tr name="university" id="UU", class="hidden">
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
                        <tr name="university" id="other" class="hidden">
                            <td style="width: 200px">大学名/学部/学科</td>
                            <td>
                                <input required='true' style="width: 24%; margin-right:4%;" type="text">
                                <input required='true' style="width: 24%; margin-right:4%;" type="text">
                                <input required='true' style="width: 24%" type="text">
                            </td>
                        </tr>
                        <script>
                            // 学年のプルダウンメニューによる条件分岐
                            document.querySelector('select[name="grade"]').addEventListener('change', () => {  // 学年プルダウンが更新されたとき
                                const options = document.querySelectorAll('option[name="gradeOption"]');  // プルダウンの選択肢のNodeList
                                const selectedOption = [...options].find(option => option.selected);  // 選択状態のプルダウンの選択肢

                                const company = document.querySelector('tr[name="company"]');  // 会社の項目
                                const universities = document.querySelectorAll('tr[name="university"]');  // 大学の項目のNodeList
                                if (selectedOption.value < 10) {  // 学生が選択されているとき
                                    //会社を非表示, 学生ラジオボタンを表示
                                    company.classList.add('hidden');
                                    // [...universities].forEach(university => university.classList.remove('hidden'));
                                    universities.item(0).classList.remove('hidden');
                                } else {  //社会人・その他が選択されている時
                                    //会社を表示, 学生全体を非表示
                                    company.classList.remove('hidden');
                                    [...universities].forEach(university => university.classList.add('hidden'));
                                }
                            });

                            // 大学のラジオボタンによる条件分岐

                            const UU = document.querySelector('#UU');
                            const other = document.querySelector('#other');
                            // UUBtn.addEventListener('change', () => {
                            //     if (UUBtn.checked) {
                            //         console.log('hoge');
                            //         UU.classList.remove('hidden');
                            //         other.classList.add('hidden');
                            //     } else {
                            //         console.log('fuga');
                            //         UU.classList.add('hidden');
                            //         other.classList.remove('hidden');
                            //     }
                            // });
                            // window.onload = () => {
                            //     const radioBtns = document.querySelectorAll('input[name="univRadio]"');
                            //     [...radioBtns].forEach(radioBtn => {
                            //         console.log(radioBtn);
                            //     });
                            // }
                                // radioBtn.addEventListener('change', () => {
                                //     if (radioBtn.checked && radioBtn.value === '宇都宮大学') {
                                //         console.log('hoge');
                                //         UU.classList.remove('hidden');
                                //         other.classList.add('hidden');
                                //     } else {
                                //         console.log('fuga');
                                //         UU.classList.add('hidden');
                                //         other.classList.remove('hidden');
                                //     }
                                // });
                            // });
                        </script>
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
                <h2 class="text-lg px-6 inline-block bg-bg rounded-full mb-4" style="margin-left: 200px">パーソナルデータ</h2>
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
        <h2 class="text-lg px-6 inline-block bg-bg rounded-full mb-4" style="margin-left: 200px">MYLINK</h2>
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
                    <td style="width: 40px">1</td>
                    <td style="width: 250px"><input style="width: 80%" type="url"></td>
                    <td style="width: 250px"><input style="width: 80%" type="text"></td>
                    <td style="width: 300px"><textarea style="width: 80%; padding:.5rem;"></textarea></td>
                    <td style="width: 80px"><input type="submit" value="更新"></td>
                    <td style="width: 80px"><input type="submit" value="削除" style="background-color: red; color: #fff;">
                    </td>
                </tr>
                <tr>
                    <td style="width: 40px">2</td>
                    <td style="width: 250px"><input style="width: 80%" type="url"></td>
                    <td style="width: 250px"><input style="width: 80%" type="text"></td>
                    <td style="width: 300px"><textarea style="width: 80%; padding:.5rem;"></textarea></td>
                    <td style="width: 80px"><input type="submit" value="更新"></td>
                    <td style="width: 80px"><input type="submit" value="削除" style="background-color: red; color: #fff;">
                    </td>
                </tr>
                <td colspan="6">
                    <p>使い方の例1：Twitterや自身のSNSのリンクを貼る　リンクの説明欄にフォローよろしくなどのコメントを書く。</p>
                    <p>使い方の例2：YouTubeのリンクを張る　リンクの説明欄にこれおすすめ！！って書く</p>
                </td>
                </tr>
            </table>
        </div>
    </div>

    <div class="mx-auto mb-20 w-full">
        <h2 class="text-lg px-6 inline-block bg-bg rounded-full mb-4" style="margin-left: 200px">タイムライン登録</h2>
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
                <tr>
                    <td style="width: 40px">1</td>
                    <td style="width: 200px"><input style="width: 80%" type="url"></td>
                    <td style="width: 300px">
                        <textarea style="width: 80%; padding:.5rem;"></textarea>
                    </td>
                    <td style="width: 150px"><input style="width: 80%" type="text"></td>
                    <td style="width: 150px; font-size:.875rem; ">
                        <div class="mb-1">開始日 : <input style="width:50%" type="date"></div>
                        <div>終了日 : <input style="width:50%" type="date"></div>
                    </td>
                    <td style="width: 80px"><input type="submit" value="更新"></td>
                    <td style="width: 80px">
                        <input type="submit" value="削除" style="background-color: red; color: #fff;">
                    </td>
                </tr>
                <tr>
                    <td style="width: 40px">2</td>
                    <td style="width: 200px"><input style="width: 80%" type="url"></td>
                    <td style="width: 300px">
                        <textarea style="width: 80%; padding:.5rem;"></textarea>
                    </td>
                    <td style="width: 150px"><input style="width: 80%" type="text"></td>
                    <td style="width: 150px; font-size:.875rem; ">
                        <div class="mb-1">開始日 : <input style="width:50%" type="date"></div>
                        <div>終了日 : <input style="width:50%" type="date"></div>
                    </td>
                    <td style="width: 80px"><input type="submit" value="更新"></td>
                    <td style="width: 80px">
                        <input type="submit" value="削除" style="background-color: red; color: #fff;">
                    </td>
                </tr>
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
