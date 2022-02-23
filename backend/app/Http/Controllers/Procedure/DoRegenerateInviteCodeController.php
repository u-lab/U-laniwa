<?php

declare(strict_types=1);

namespace App\Http\Controllers\Procedure;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserInviteCode;
use Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Str;

class DoRegenerateInviteCodeController extends Controller
{

    /**
     * 招待コード生成・再生成するコントローラー
     *
     * @return Redirector|RedirectResponse
     */
    public function __invoke(): Redirector | RedirectResponse
    {
        /** @var User */
        $user = Auth::user();
        //権限レベルが足りなければボタンは表示されないが、念の為の実装
        if ($user->user_role_id >= 40) {
            //無かったら作成、あれば上書きする
            UserInviteCode::updateOrCreate([
                'user_id' => $user->id,
            ], [
                'user_id'   => $user->id,
                'code' => Str::uuid(),
            ]);
        }
        return redirect('/procedure');
    }
}