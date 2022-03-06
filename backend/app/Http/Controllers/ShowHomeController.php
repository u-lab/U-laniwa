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
        $timelines = UserTimeline::with('User:id,name,profile_photo_path')->orderBy('start_date', 'desc')->take(10)->get();
        foreach ($timelines as $timeline) {
            $timeline->genreName = $timeline->genre->label();
        }
        //お知らせは初回リリース未実装
        return view('home', ['userProjects' => $userProjects, 'timelines' => $timelines]);
    }
}