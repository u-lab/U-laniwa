<?php

declare(strict_types=1);

namespace App\Http\Controllers\System\Notice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;

class UpdateSystemNoticeController extends Controller
{
    /**
     * システム管理者からのお知らせを更新するコントローラー
     *
     * @return Redirector|RedirectResponse
     */
    public function __invoke(): Redirector|RedirectResponse
    {
        return redirect('/system/notice');
    }
}