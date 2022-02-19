<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class ShowAdminController extends Controller
{
    /**
     * 管理者トップを表示するコントローラー
     *
     * @return  View|Factory
     */
    public function __invoke(): View |Factory
    {
        return view('admin.index', []);
    }
}