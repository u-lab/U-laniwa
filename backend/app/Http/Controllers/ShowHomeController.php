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

        /**
         * ログイン中のユーザーの所属プロジェクト
         *  @var ProjectBelonged|null
         */
        $userProjects = DB::table('projects')
            ->leftJoin('project_belongeds', 'projects.id', '=', 'project_belongeds.project_id')
            ->where('projects.representative_id', $userId) //後ほど学部順で使うため
            ->orWhere('project_belongeds.user_id', $userId) //後ほど学部順で使うため
            ->select('projects.id', 'projects.thumbnail', 'projects.title', 'projects.subtitle', 'projects.start_date', 'projects.end_date', 'projects.created_at', 'projects.updated_at')
            ->get();



        /**
         * U-lab民の最近のタイムライン
         * @var UserTimeline|null
         */
        $timelines = UserTimeline::with('User:id,name')->orderBy('start_date', 'desc')->take(10)->get();

        //お知らせは初回リリース未実装
        return view('home', ['userInfo' => $userInfo, 'userMajor' => $userMajor, 'userLiveArea' => $userLiveArea, 'userBirthArea' => $userBirthArea, 'userProjects' => $userProjects, 'timelines' => $timelines]);
    }
}