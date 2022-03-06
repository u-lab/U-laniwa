<?php

declare(strict_types=1);

namespace App\Http\Controllers\User;

use App\Enums\Country;
use App\Enums\Gender;
use App\Enums\Grade;
use App\Enums\UserTimelineGenre;
use App\Enums\UUFaculty;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserInfo;
use App\Models\UserLink;
use App\Models\UserTimeline;
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
        $userId = Auth::id();

        $user = User::where('id', $userId)->first();

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
            'gender_code' => $genderCode, //学年 名前がスネークケースなのはDBの都合
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

        //リンク
        $links = UserLink::where('user_id', $userId)->get();
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