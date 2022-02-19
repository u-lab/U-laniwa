<?php

declare(strict_types=1);

namespace App\Http\Controllers\DetailSearch;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ShowUserDetailSearchController extends Controller
{
    /**
     *  ユーザー詳細検索の結果を表示するコントローラー
     *
     * @return View|Factory
     */
    public function __invoke(): View| Factory
    {
        return view('detailSearch.user', []);
    }
}