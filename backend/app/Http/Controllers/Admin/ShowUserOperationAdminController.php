<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class ShowUserOperationAdminController extends Controller
{
    /**
     *  ユーザーの情報を編集するコントローラー
     *
     * @return View|Factory
     */
    public function __invoke(): View|Factory
    {
        return view('admin.userOperation', []);
    }
}