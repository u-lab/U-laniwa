<?php

declare(strict_types=1);

namespace App\Http\Controllers\Management\Notice;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Http\Request;

class CreateManagementNoticeController extends Controller
{
    /**
     * 運営からのお知らせを作成するコントローラー
     *
     * @return Redirector|RedirectResponse
     */
    public function __invoke(): Redirector|RedirectResponse
    {
        return redirect('/management/notice');
    }
}
