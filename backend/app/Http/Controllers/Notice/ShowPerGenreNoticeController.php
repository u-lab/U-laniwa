<?php

declare(strict_types=1);

namespace App\Http\Controllers\Notice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class ShowPerGenreNoticeController extends Controller
{
    /**
     * URLに該当するジャンル別のお知らせを表示するコントローラー
     *
     * @return View|Factory
     */
    public function __invoke(): View|Factory
    {
        return view('notice.genre', []);
    }
}