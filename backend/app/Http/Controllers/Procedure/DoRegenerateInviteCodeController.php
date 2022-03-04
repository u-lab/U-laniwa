<?php

declare(strict_types=1);

namespace App\Http\Controllers\Procedure;

use App\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserInviteCode;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Str;
use Illuminate\Contracts\Auth\Access\Gate;

class DoRegenerateInviteCodeController extends Controller
{
    /** @var Gate*/
    private $gate;
    public function __construct(Gate $gate)
    {
        $this->gate = $gate;
    }
    /**
     * 招待コード生成・再生成するコントローラー
     *
     * @return Redirector|RedirectResponse
     */
    public function __invoke(): Redirector | RedirectResponse
    {
        /** @var User */
        $user = Auth::user();
        if ($this->gate->allows('level4~')) {
            //本入部以上の場合
            /**招待コード無ければ生成、あれば再生成 */
            UserInviteCode::updateOrCreate([
                'user_id'   => $user->id,
            ], [
                'user_id'   => $user->id,
                'code'   => Str::uuid(),
            ]);
        }
        return redirect('/procedure');
    }
}