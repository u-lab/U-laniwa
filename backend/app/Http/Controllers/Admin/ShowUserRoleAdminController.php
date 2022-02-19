<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class ShowUserRoleAdminController extends Controller
{
    /**
     *  仮入部ユーザーを本入部ユーザーにするコントローラー
     *
     * @return View|Factory
     */
    public function __invoke(): View |Factory
    {
        return view('admin.userRole', []);
    }
}