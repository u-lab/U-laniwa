<?php

declare(strict_types=1);

namespace App\Http\Controllers\Notice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;


class ShowAllNoticeController extends Controller
{
    /**
     * お知らせを表示するコントローラー(ジャンル問わず全て)
     *
     * @return View|Factory
     */
    public function __invoke(): View|Factory
    {
        return view('notice.index', []);
    }
}