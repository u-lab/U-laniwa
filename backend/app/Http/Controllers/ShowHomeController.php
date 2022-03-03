<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Project;
use App\Models\ProjectBelonged;
use App\Models\User;
use App\Models\UserInfo;
use App\Models\UserTimeline;
use App\Models\UUMajor;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;

class ShowHomeController extends Controller
{
    /**
     * ホーム画面を表示するコントローラー
     *
     * @return View|Factory
     */
    public function __invoke(): View|Factory
    {
        $userId = Auth::id();
        //
        //get->firstの順にすることでフロント側で使いやすくする
        /**
         * ログイン中のユーザー情報
         *  @var UserInfo|null
         */
        $userInfo = UserInfo::where('user_id',  $userId)->first();
        if (empty($userInfo)) {
            $userMajor = null;
            $userAreas = null;
            $userBirthArea = null;
            $userLiveArea = null;
        } else {
            $userMajor = UUMajor::find($userInfo->u_u_major_id);
            $userAreas = Area::whereIn('id', [$userInfo->birth_area_id, $userInfo->live_area_id])->get();
            //在住と出身が同じだった場合、返り値1つなので
            $userBirthArea = $userAreas->first(fn (Area $area) => $area->id === $userInfo->birth_area_id);
            $userLiveArea = $userAreas->first(fn (Area $area) => $area->id === $userInfo->live_area_id);
        }

        $now = date('Y-m-d');
        /**
         * まだ開始していないor終了していないor終了日がないプロジェクトを表示
         *  @var ProjectBelonged|null
         */
        $userProjects = Project::whereNull('end_date')->orWhere('start_date', ">=", $now)->orWhere('end_date', ">=", $now)->get();



        /**
         * U-lab民の最近のタイムライン
         * @var UserTimeline|null
         */
        $timelines = UserTimeline::with('User:id,name')->orderBy('start_date', 'desc')->take(10)->get();
        foreach ($timelines as $timeline) {
            $timeline->genreName = $timeline->genre->label();
        }
        //お知らせは初回リリース未実装
        return view('home', ['userInfo' => $userInfo, 'userMajor' => $userMajor, 'userLiveArea' => $userLiveArea, 'userBirthArea' => $userBirthArea, 'userProjects' => $userProjects, 'timelines' => $timelines]);
    }
}
