<?php

declare(strict_types=1);

namespace App\Http\Controllers\Statistic;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserInfo;
use App\Models\UserRole;
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
            //
            $userRoleCounter[$userRoles->where('id', $perUserRole->user_role_id)->first()->name] = $perUserRole->user_role_count;
        }

        /**
         * 学年ごと、学部ごと、学科ごと、出身地、現住地、性別ごとの取得
         * @var UserInfo
         */
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
        $perUserInfos = UserInfo::groupBy('grade', 'u_u_major_id', 'birth_area_id', 'live_area_id', 'gender')
            ->select(['grade', DB::raw('count(*) as grade_count'), 'u_u_major_id', DB::raw('count(*) as u_u_major_count'), 'birth_area_id', DB::raw('count(*) as birth_area_count'), 'live_area_id', DB::raw('count(*) as live_area_count'), 'gender', DB::raw('count(*) as gender_count')])
            ->get();
        \Log::debug($perUserInfos);
        foreach ($perUserInfos as $perUserInfo) {
        }


        return view('statistic.user', ["userRoleCounter" => $userRoleCounter]);
    }
}