<?php

declare(strict_types=1);

namespace App\Http\Controllers\Timeline;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class ShowProjectTimelineController extends Controller
{
    /**
     * プロジェクトのタイムラインを表示するコントローラー
     *
     * @return View|Factory
     */
    public function __invoke(): View|Factory
    {
        return view('timeline.project', []);
    }
}