<?php

declare(strict_types=1);

namespace App\Http\Controllers\Timeline;

use App\Http\Controllers\Controller;
use App\Models\UserTimeline;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class ShowAllTimelineController extends Controller
{
    /**
     * 全体タイムラインを表示するコントローラー
     *
     * @return View|Factory
     */
    public function __invoke(): View|Factory
    {
        /**
         * @var UserTimeline
         * @property string $genreName
         */
        $timelines = UserTimeline::with('User:id,name')
            ->orderBy('start_date', 'desc')
            ->take(10)
            ->get();
        foreach ($timelines as $timeline) {
            $timeline->genreName = $timeline->genre->label();
        }
        return view('timeline.index', ['timelines' => $timelines]);
    }
}