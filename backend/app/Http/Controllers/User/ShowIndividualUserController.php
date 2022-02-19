<?php

declare(strict_types=1);

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class ShowIndividualUserController extends Controller
{
    /**
     * 個別のユーザー情報ページを表示するコントローラー
     *
     * @return View|Factory
     */
    public function __invoke(): View|Factory
    {
        return view('user.individual', []);
    }
}