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
        $userInfo = UserInfo::where('user_id', $user_id)->get()->first();
        $userMajor = UUMajor::where('id', $user_id)->get()->first();
        $userBirthArea = Area::where('id', $userInfo->birth_area_id)->get()->first();
        $userLiveArea = Area::where('id', $userInfo->live_area_id)->get()->first();
        //ログイン中のユーザーの所属プロジェクト
        $userProjects = ProjectBelonged::where('user_id', $user_id)->get()->all();
        $timelines = UserTimeline::orderBy('start_date', 'desc')->take(10)->get();
        //お知らせは初回リリース未実装
        return view('home', ['userInfo' => $userInfo, 'userMajor' => $userMajor, 'userBirthArea' => $userBirthArea, 'userLiveArea' => $userLiveArea, 'userProjects' => $userProjects, 'timelines' => $timelines]);
    }
}