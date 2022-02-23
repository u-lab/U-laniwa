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

class ShowHomeController extends Controller
{
    /**
     * ホーム画面を表示するコントローラー
     *
     * @return View|Factory
     */
    public function __invoke(): View|Factory
    {
        $user_id = Auth::id();
        //ログイン中のユーザー情報
        //get->firstの順にすることでフロント側で使いやすくする
        /** @var UserInfo|null */
        $userInfo = UserInfo::where('user_id',  $user_id)->first();
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
        //ログイン中のユーザーの所属プロジェクト
        $userProjects = ProjectBelonged::where('user_id', $user_id)->limit(20)->get();
        $timelines = UserTimeline::orderBy('start_date', 'desc')->take(10);
        //お知らせは初回リリース未実装
        return view('home', ['userInfo' => $userInfo, 'userMajor' => $userMajor, 'userLiveArea' => $userLiveArea, 'userBirthArea' => $userBirthArea, 'userProjects' => $userProjects, 'timelines' => $timelines]);
    }
}