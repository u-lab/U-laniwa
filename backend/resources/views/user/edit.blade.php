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
    <div class="mx-auto mb-20" style="width: 600px">
        <h2 class="text-lg px-6 inline-block bg-bg rounded-full mb-4">プロフィール画像</h2>
        <div class="rounded-3xl border-2 border-bg">
            <table class="w-full text-center edit rounded-3xl overflow-hidden">
                <tr class="bg-bg-sub">
                    <td>プロフィール画像</td>
                    <td>画像を追加</td>
                    <td>更新</td>
                </tr>
                <tr>
                    <form>
                        <td style="width: 250px"><img src="{{url('/'.$user->profile_photo_path)}}"
                                class="w-48 inline-block">
                        </td>
                        <td style="width: 250px"><input style="max-width: 250px" type="file" name="example"
                                accept="image/jpeg, image/png"></td>
                        <td style="width: 100px"><input type="submit" value="更新">
                        </td>
                    </form>
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
                    <td>更新</td>
                </tr>
                <tr>
                    <form>
                        <td style="width: 200px">ユーザー名</td>
                        <td><input style="width: 80%" type="text"></td>
                        <td style="width: 100px"><input type="submit" value="更新"></td>
                    </form>
                </tr>
                <tr>
                    <form>
                        <td style="width: 200px">姓/名</td>
                        <td><input style="width: 38%; margin-right:4%;" type="text"><input style="width: 38%"
                                type="text"></td>
                        <td style="width: 100px"><input type="submit" value="更新"></td>
                    </form>
                </tr>
                <tr>
                    <form>
                        <td style="width: 200px">性別</td>
                        <td><input style="width: 80%" type="text"></td>
                        <td style="width: 100px"><input type="submit" value="更新"></td>
                    </form>
                </tr>
                <tr>
                    <form>
                        <td style="width: 200px">一言コメント</td>
                        <td><input style="width: 80%" type="text"></td>
                        <td style="width: 100px"><input type="submit" value="更新"></td>
                    </form>
                </tr>
                <tr>
                    <form>
                        <td style="width: 200px">学年</td>
                        <td><input style="width: 80%" type="text"></td>
                        <td style="width: 100px"><input type="submit" value="更新"></td>
                    </form>
                </tr>
                <tr>
                    <form>
                        <td style="width: 200px">会社名</td>
                        <td><input style="width: 80%" type="text"></td>
                        <td style="width: 100px"><input type="submit" value="更新"></td>
                    </form>
                </tr>
                <tr>
                    <form>
                        <td style="width: 200px">大学</td>
                        <td><input style="width: 80%" type="text"></td>
                        <td style="width: 100px"><input type="submit" value="更新"></td>
                    </form>
                </tr>
                <tr>
                    <form>
                        <td style="width: 200px">学部/学科</td>
                        <td><input style="width: 38%; margin-right:4%;" type="text"><input style="width: 38%"
                                type="text"></td>
                        <td style="width: 100px"><input type="submit" value="更新"></td>
                    </form>
                </tr>
                <tr>
                    <form>
                        <td style="width: 200px">大学名/学部/学科</td>
                        <td>
                            <input style="width: 24%; margin-right:4%;" type="text">
                            <input style="width: 24%; margin-right:4%;" type="text">
                            <input style="width: 24%" type="text">
                        </td>
                        <td style="width: 100px"><input type="submit" value="更新"></td>
                    </form>
                </tr>
                <tr>
                    <form>
                        <td style="width: 200px">兼部・サークル</td>
                        <td><input style="width: 80%" type="text"></td>
                        <td style="width: 100px"><input type="submit" value="更新"></td>
                    </form>
                </tr>
                <tr>
                    <form>
                        <td style="width: 200px">出身地</td>
                        <td>
                            <input style="width: 24%; margin-right:4%;" type="text">
                            <input style="width: 24%; margin-right:4%;" type="text">
                            <input style="width: 24%" type="text">
                        </td>
                        <td style="width: 100px"><input type="submit" value="更新"></td>
                    </form>
                </tr>
                <tr>
                    <form>
                        <td style="width: 200px">現住地</td>
                        <td>
                            <input style="width: 24%; margin-right:4%;" type="text">
                            <input style="width: 24%; margin-right:4%;" type="text">
                            <input style="width: 24%" type="text">
                        </td>
                        <td style="width: 100px"><input type="submit" value="更新"></td>
                    </form>
                </tr>
                <tr>
                    <td colspan="3">
                        <p>
                            ユーザー名、一言コメント、学部学科はメンバー一覧で表示されます<br>
                            兼部・サークルがある場合は「卓球、写真サークル」のように部とサークルの間を“、”で分割してお書き下さい
                        </p>
                    </td>
                </tr>
            </table>
        </div>
    </div>

    <div class="mx-auto mb-20 w-full">
        <h2 class="text-lg px-6 inline-block bg-bg rounded-full mb-4" style="margin-left: 200px">パーソナルデータ</h2>
        <div class="rounded-3xl border-2 border-bg">
            <table class="w-full text-center edit rounded-3xl overflow-hidden">
                <tr class="bg-bg-sub">
                    <td>項目</td>
                    <td></td>
                    <td>公開/非公開</td>
                    <td>更新</td>
                    <td>削除</td>
                </tr>
                <tr>
                    <form>
                        <td style="width: 200px">誕生日</td>
                        <td><input style="width: 80%" type="text"></td>
                        <td style="width: 100px"><input style="width: 80%" type="text"></td>
                        <td style="width: 80px"><input type="submit" value="更新"></td>
                        <td style="width: 80px"><input type="submit" value="削除"
                                style="background-color: red; color: #fff;"></td>
                    </form>
                </tr>
                <tr>
                    <form>
                        <td style="width: 200px">趣味</td>
                        <td><input style="width: 80%" type="text"></td>
                        <td style="width: 100px">-</td>
                        <td style="width: 80px"><input type="submit" value="更新"></td>
                        <td style="width: 80px"><input type="submit" value="削除"
                                style="background-color: red; color: #fff;"></td>
                    </form>
                </tr>
                <tr>
                    <form>
                        <td style="width: 200px">興味</td>
                        <td><input style="width: 80%" type="text"></td>
                        <td style="width: 100px">-</td>
                        <td style="width: 80px"><input type="submit" value="更新"></td>
                        <td style="width: 80px"><input type="submit" value="削除"
                                style="background-color: red; color: #fff;"></td>
                    </form>
                </tr>
                <tr>
                    <form>
                        <td style="width: 200px">座右の銘</td>
                        <td><input style="width: 80%" type="text"></td>
                        <td style="width: 100px">-</td>
                        <td style="width: 80px"><input type="submit" value="更新"></td>
                        <td style="width: 80px"><input type="submit" value="削除"
                                style="background-color: red; color: #fff;"></td>
                    </form>
                </tr>
                <tr>
                    <td colspan="5">
                        <p>
                            ででーんと書いちゃってください
                        </p>
                    </td>
                </tr>
            </table>
        </div>
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
                    <form>
                        <td style="width: 40px">1</td>
                        <td style="width: 250px"><input style="width: 80%" type="url"></td>
                        <td style="width: 250px"><input style="width: 80%" type="text"></td>
                        <td style="width: 300px"><textarea style="width: 80%; padding:.5rem;"></textarea></td>
                        <td style="width: 80px"><input type="submit" value="更新"></td>
                        <td style="width: 80px"><input type="submit" value="削除"
                                style="background-color: red; color: #fff;"></td>
                    </form>
                </tr>
                <tr>
                    <form>
                        <td style="width: 40px">2</td>
                        <td style="width: 250px"><input style="width: 80%" type="url"></td>
                        <td style="width: 250px"><input style="width: 80%" type="text"></td>
                        <td style="width: 300px"><textarea style="width: 80%; padding:.5rem;"></textarea></td>
                        <td style="width: 80px"><input type="submit" value="更新"></td>
                        <td style="width: 80px"><input type="submit" value="削除"
                                style="background-color: red; color: #fff;"></td>
                    </form>
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
                    <form>
                        <td style="width: 40px">1</td>
                        <td style="width: 200px"><input style="width: 80%" type="url"></td>
                        <td style="width: 300px">
                            <textarea style="width: 80%; padding:.5rem;"></textarea>
                        </td>
                        <td style="width: 150px"><input style="width: 80%" type="text"></td>
                        <td style="width: 150px; font-size:.875rem; ">
                            開始日 : <input style="width:50%" type="date"><br>
                            終了日 : <input style="width:50%" type="date">
                        </td>
                        <td style="width: 80px"><input type="submit" value="更新"></td>
                        <td style="width: 80px">
                            <input type="submit" value="削除" style="background-color: red; color: #fff;">
                        </td>
                    </form>
                </tr>
                <tr>
                    <form>
                        <td style="width: 40px">2</td>
                        <td style="width: 200px"><input style="width: 80%" type="url"></td>
                        <td style="width: 300px">
                            <textarea style="width: 80%; padding:.5rem;"></textarea>
                        </td>
                        <td style="width: 150px"><input style="width: 80%" type="text"></td>
                        <td style="width: 150px; font-size:.875rem; ">
                            開始日 : <input style="width:50%" type="date"><br>
                            終了日 : <input style="width:50%" type="date">
                        </td>
                        <td style="width: 80px"><input type="submit" value="更新"></td>
                        <td style="width: 80px">
                            <input type="submit" value="削除" style="background-color: red; color: #fff;">
                        </td>
                    </form>
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
