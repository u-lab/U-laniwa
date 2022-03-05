<?php

declare(strict_types=1);

namespace App\Http\Controllers\Management\Notice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class ShowManagementNoticeController extends Controller
{
    /**
     * 運営からのお知らせ編集ページを表示するコントローラー
     *
     * @return View|Factory
     */
    public function __invoke(): View|Factory
    {
        return view('management.notice', []);
    }
}