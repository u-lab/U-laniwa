<?php

declare(strict_types=1);

namespace App\Http\Controllers\Statistic;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class ShowAllStatisticController extends Controller
{
    /**
     * 全体の統計を表示するコントローラー
     *
     * @return View|Factory
     */
    public function __invoke(): View|Factory
    {
        return view('statistic.index', []);
    }
}