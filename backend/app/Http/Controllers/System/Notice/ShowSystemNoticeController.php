<?php

declare(strict_types=1);

namespace App\Http\Controllers\System\Notice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class ShowSystemNoticeController extends Controller
{
    /**
     * システム管理者からのお知らせ編集ページを表示するコントローラー
     *
     * @return View|Factory
     */
    public function __invoke(): View|Factory
    {
        return view('system.notice', []);
    }
}