<?php

declare(strict_types=1);

namespace App\Http\Controllers\Security;

use App\Http\Controllers\Controller;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class ShowSecurityController extends Controller
{
    /**
     * セキュリティページを表示するコントローラー
     *
     * @return  View|Factory
     */
    public function __invoke(): View|Factory
    {
        $userId = Auth::id();

        // usersテーブルからログインユーザーのレコードを取得
        $user = User::where('id', $userId)->first();

        return view('security.index', ['user' => $user]);
    }
}
