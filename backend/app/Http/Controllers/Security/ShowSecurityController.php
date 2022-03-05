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

        /**
         * usersテーブルからログインユーザーのレコードを取得
         * @var User
         * @property string $created_at
         */
        $loginUser = User::where('id', $userId)->first();

        // 一応エラーを防ぐためcreated_atが存在しているときのみformatをかける
        $registerDate = $loginUser->created_at ? $loginUser->created_at->format('Y/n/j') : '-----';

        return view('security.index', ['registerDate' => $registerDate]);
    }
}
