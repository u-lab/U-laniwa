<?php

namespace App\Http\Controllers\Procedure;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserInviteCode;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\Auth\Access\Gate;

class ShowProcedureController extends Controller
{
    /** @var Gate*/
    private $gate;
    public function __construct(Gate $gate)
    {
        $this->gate = $gate;
    }
    /**
     * 手続きページを表示するコントローラー
     *
     * @return View|Factory
     */
    public function __invoke(): View|Factory
    {
        $userId = Auth::id();

        /**
         * ログインユーザーの招待コードを取得
         * @var UserInviteCode
         * @property string $code
         */
        $inviteCodeTable = UserInviteCode::where('user_id', $userId)->first();

        // ログインユーザーが招待したユーザーの一覧を取得
        $invitedUsers = User::where('invited_id', $userId)
            ->orderBy('created_at', 'desc')
            ->take(20)
            ->get();

        /**
         * https://github.com/u-lab/U-laniwa/wiki/507_%E8%AA%8D%E5%8F%AF%E3%81%AB%E3%81%A4%E3%81%84%E3%81%A6
         * 認可をフロントで用いることをおすすめします。。
         */
        return view('procedure.index', ['gate' => $this->gate, 'inviteCode' => $inviteCodeTable, 'invitedUsers' => $invitedUsers]);
    }
}