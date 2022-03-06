<?php

declare(strict_types=1);

namespace App\Http\Controllers\User;

use App\Enums\Country;
use App\Enums\Gender;
use App\Enums\Grade;
use App\Enums\UserTimelineGenre;
use App\Enums\UUFaculty;
use App\Http\Controllers\Controller;
use App\Models\Area;
use App\Models\User;
use App\Models\UserInfo;
use App\Models\UserLink;
use App\Models\UserTimeline;
use App\Models\UUMajor;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class ShowEditUserController extends Controller
{
    /**
     * ユーザー情報の編集ページを表示するコントローラー
     *
     * @return View|Factory
     */
    public function __invoke(): View|Factory
    {
        /**
         * @var User
         */
        $user = Auth::user();
        $userId = $user->id;

        /**
         * @var mixed $userInfo
         * @property string $company
         * @property string $position
         * @property string $university
         * @property string $faculty
         * @property string $major
         * @property int $u_u_faculty_id
         * @property int $birth_country_id
         * @property int $birth_prefecture_id
         * @property int $live_country_id
         * @property int $live_prefecture_id
         * @property int $id
         * @property int $user_id
         * @property string $birth_day — 誕生日
         * @property string|null $last_name — 姓
         * @property string $first_name — 名
         * @property \App\Enums\Grade $grade — enum学年
         * @property int|null $u_u_major_id
         * @property mixed|null $university_meta — 大学情報
         * @property mixed|null $company_meta — 企業情報
         * @property \App\Enums\Gender $gender — enum性別
         * @property int $live_area_id
         * @property int $birth_area_id
         * @property int $is_dark_mode — ダークモードにするか？
         * @property int $is_publish_birth_day — 誕生日公開するか？
         * @property string $description — 自己紹介
         * @property string|null $group_affiliation — 所属団体
         * @property string|null $status — ひとこと(GitHubのstatusと同じ)
         * @property string|null $github_id — GitHubのid
         * @property string|null $line_name — LINEでのユーザー名
         * @property string|null $slack_name — Slackでのユーザー名
         * @property string|null $discord_name — Discordでのユーザー名
         * @property string|null $hobbies — 趣味
         * @property string|null $interests — 興味
         * @property string|null $motto — 座右の銘
         * @property \Illuminate\Support\Carbon|null $created_at
         * @property \Illuminate\Support\Carbon|null $updated_at
         */
        $userInfo = UserInfo::where('user_id', $userId)->first();

        /**
         * company_metaをデコード
         */
        if ($userInfo->company_meta) {
            $decodedArray = json_decode($userInfo->company_meta);
            $userInfo->company = $decodedArray['company_name'];
            $userInfo->position = $decodedArray['position'];
        } else {
            $userInfo->company = '';
            $userInfo->position = '';
        }

        /**
         * university_metaをデコード
         */
        if ($userInfo->university_meta) {
            $decodedArray = json_decode($userInfo->university_meta);
            $userInfo->university = $decodedArray['university'];
            $userInfo->faculty = $decodedArray['faculty'];
            $userInfo->major = $decodedArray['major'];
        } else {
            $userInfo->university = '';
            $userInfo->faculty = '';
            $userInfo->major = '';
        }


        /**
         * DBに格納していないEnum型のデータを取得する
         */
        //性別
        $genderEnum = Gender::cases();
        $genders = array_map(fn (Gender $genderCode): array => [
            'name' => $genderCode->label(), //名前
        ], $genderEnum);

        //学年
        $gradeEnum = Grade::cases();
        $grades = array_map(fn (Grade $gradeCode): array => [
            'grade_code' => $gradeCode, //学年 名前がスネークケースなのはDBの都合
            'name' => $gradeCode->label(), //名前
        ], $gradeEnum);

        //国
        //都道府県、市区町村に関しては動的に取得する(api.php参照)
        $countryEnum = Country::cases();
        $countries =  array_map(fn (Country $countryCode): array => [
            'country_code' => $countryCode, //国コード 名前がスネークケースなのはDBの都合
            'name' => $countryCode->label(), //名前
        ], $countryEnum);

        //学部
        $uuFacultyEnum = UUFaculty::cases();
        $uuFaculties =  array_map(fn (UUFaculty $id): array => [
            'id' => $id, //学部id(学科の取得に用いる)
            'name' => $id->label(), //学部名
        ], $uuFacultyEnum);

        /**
         * ユーザー情報追加取得
         */
        //学科
        /** @var UUMajor */
        $uuMajor = UUMajor::where('id', $userInfo->u_u_major_id)->first();
        $userInfo->u_u_faculty_id = $uuMajor->faculty_id;

        $userAreas = Area::whereIn('id', [$userInfo->birth_area_id, $userInfo->live_area_id])->get();
        // 在住と出身が同じだった場合、返り値1つなので
        /** @var Area */
        $userBirthArea = $userAreas->first(fn (Area $area) => $area->id === $userInfo->birth_area_id);
        /** @var Area */
        $userLiveArea = $userAreas->first(fn (Area $area) => $area->id === $userInfo->live_area_id);
        // userにbirthとliveプロパティを追加
        $userInfo->live_prefecture_id = $userLiveArea->prefecture_code;
        $userInfo->live_country_id =  $userLiveArea->country_code;
        $userInfo->birth_prefecture_id = $userBirthArea->prefecture_code;
        $userInfo->birth_country_id =  $userBirthArea->country_code;


        //リンク
        $links = UserLink::where('user_id', $userId)->orderBy('id', 'desc')->get();
        //タイムライン
        $timelines = UserTimeline::where('user_id', $userId)->orderBy('start_date', 'desc')->get();
        //タイムラインジャンル
        $timelineGenreEnum = UserTimelineGenre::cases();
        $timelineGenres = array_map(fn (UserTimelineGenre $timelineGenre): array => [
            'id' => $timelineGenre->value,
            'name' => $timelineGenre->label(), //名前
        ], $timelineGenreEnum);
        return view('user.edit', [
            'user' => $user,
            'userInfo' => $userInfo,
            'genders' => $genders,
            'grades' => $grades,
            'countries' => $countries,
            'uuFaculties' => $uuFaculties,
            'links' => $links,
            'timelines' => $timelines,
            'timelineGenres' => $timelineGenres,
        ]);
    }
}