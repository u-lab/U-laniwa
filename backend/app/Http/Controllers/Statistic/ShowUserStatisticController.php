<?php

declare(strict_types=1);

namespace App\Http\Controllers\Statistic;

use App\Enums\Grade;
use App\Enums\UUFaculty;
use App\Http\Controllers\Controller;
use App\Models\Area;
use App\Models\User;
use App\Models\UserInfo;
use App\Models\UserRole;
use App\Models\UUMajor;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;

class ShowUserStatisticController extends Controller
{
    /**
     * ユーザーの統計を表示するコントローラー
     *
     * @return View|Factory
     */
    public function __invoke(): View|Factory
    {
        /**
         * ユーザーランクごとの情報取得
         * @var User
         */
        $perUserRoles = User::groupBy('user_role_id')->select('user_role_id', DB::raw('count(*) as user_role_count'))->get();
        /** @var UserRole */
        $userRoles = UserRole::all();
        /** @var array<string,int> 権限名:数 の連想配列 */
        $userRoleCounter = [];
        foreach ($perUserRoles as $perUserRole) {
            /** @var UserRole */
            $userRole = $userRoles->where('id', $perUserRole->user_role_id)->first();
            $userRoleCounter[$userRole->name] = $perUserRole->user_role_count;
        }

        /**
         * 学年ごと、学部ごと、学科ごと、出身地、現住地、性別ごとの取得
         * @var UserInfo
         */
        $perUserInfos = UserInfo::groupBy('grade', 'u_u_major_id', 'birth_area_id', 'live_area_id', 'gender')
            ->select(['grade', DB::raw('count(*) as grade_count'), 'u_u_major_id', DB::raw('count(*) as u_u_major_count'), 'birth_area_id', DB::raw('count(*) as birth_area_count'), 'live_area_id', DB::raw('count(*) as live_area_count'), 'gender', DB::raw('count(*) as gender_count')])
            ->get();
        /** @var array<string,int> 学年名:数 の連想配列 */
        $userGradeCounter = [];
        /** @var array<string,int> 性別名:数 の連想配列 */
        $userGenderCounter = [];
        /** @var array<string,int> 学部名:数 の連想配列 */
        $userFacultyCounter = [];
        /** @var array<string,int> 学科名:数 の連想配列 */
        $userMajorCounter = [];
        /** @var array<string,int> 現住地:数 の連想配列 */
        $userLiveAreaCounter = [];
        /** @var array<string,int> 出身地:数 の連想配列 */
        $userBirthAreaCounter = [];

        /**予め取得 */
        $uuMajors = UUMajor::all();
        foreach ($perUserInfos as $perUserInfo) {
            /**
             * 学年処理
             */
            $userGradeCounter[$perUserInfo->grade->label()] = $perUserInfo->grade_count;
            /**
             * 性別処理
             */
            $userGenderCounter[$perUserInfo->gender->label()] = $perUserInfo->gender_count;

            /**
             * 学部学科処理
             */
            //学部はenumに変換して加算する
            if ($perUserInfo->u_u_major_id) {
                /** @var UUMajor */
                $major = $uuMajors->where('id', $perUserInfo->u_u_major_id)->first();
                $MajorName = $major->name;
                $facultyName = $major->faculty_id->label();
                //学部計測
                if (!array_key_exists($facultyName, $userFacultyCounter)) {
                    $userFacultyCounter[$facultyName] = 0;
                    $userFacultyCounter[$facultyName] += $perUserInfo->u_u_major_count;
                } else {
                    $userFacultyCounter[$facultyName] += $perUserInfo->u_u_major_count;
                }
                //学科計測
                if (!array_key_exists($MajorName, $userMajorCounter)) {
                    $userMajorCounter[$MajorName] = 0;
                    $userMajorCounter[$MajorName] += $perUserInfo->u_u_major_count;
                } else {
                    $userMajorCounter[$MajorName] += $perUserInfo->u_u_major_count;
                }
            }

            /**
             * 現住と出身の都道府県処理
             */
            $userAreas = Area::whereIn('id', [$perUserInfo->birth_area_id, $perUserInfo->live_area_id])->get();
            // 在住と出身が同じだった場合、返り値1つなので

            /** @var Area */
            $userBirthArea = $userAreas->first(fn (Area $area) => $area->id === $perUserInfo->birth_area_id);
            /** @var Area */
            $userLiveArea = $userAreas->first(fn (Area $area) => $area->id === $perUserInfo->live_area_id);
            //三項演算子してるのはLarastanエラー回避のため

            $userLiveAreaPrefecture = $userBirthArea->prefecture_code == null ?  "-" : $userLiveArea->prefecture_code->label();
            $userBirthAreaPrefecture = $userLiveArea->prefecture_code == null ?  "-" : $userBirthArea->prefecture_code->label();
            //現住地
            if (!array_key_exists($userLiveAreaPrefecture, $userLiveAreaCounter)) {
                $userLiveAreaCounter[$userLiveAreaPrefecture] = 0;
                $userLiveAreaCounter[$userLiveAreaPrefecture] += $perUserInfo->live_area_count;
            } else {
                $userLiveAreaCounter[$userLiveAreaPrefecture] += $perUserInfo->live_area_count;
            }
            //出身地
            if (!array_key_exists($userBirthAreaPrefecture, $userBirthAreaCounter)) {
                $userBirthAreaCounter[$userBirthAreaPrefecture] = 0;
                $userBirthAreaCounter[$userBirthAreaPrefecture] += $perUserInfo->live_area_count;
            } else {
                $userBirthAreaCounter[$userBirthAreaPrefecture] += $perUserInfo->live_area_count;
            }
        }


        return view('statistic.user', ["userRoleCounter" => $userRoleCounter, "userGradeCounter" => $userGradeCounter, "userGenderCounter" => $userGenderCounter, "userFacultyCounter" => $userFacultyCounter, "userMajorCounter" => $userMajorCounter, "userLiveAreaCounter" => $userLiveAreaCounter, "userBirthAreaCounter" => $userBirthAreaCounter]);
    }
}