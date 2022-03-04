<?php

declare(strict_types=1);

namespace App\Http\Controllers\Procedure;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Contracts\Auth\Access\Gate;

class DoRetireProcedureController extends Controller
{
    /** @var Gate*/
    private $gate;
    public function __construct(Gate $gate)
    {
        $this->gate = $gate;
    }
    /**
     * ユーザーを引退させるコントローラー
     *
     * @return Redirector|RedirectResponse
     */
    public function __invoke(): Redirector | RedirectResponse
    {
        if ($this->gate->allows('level4~')) {
            //本入部以上の場合
            /**ユーザーのランクをOB・OGに。retired_atを追加 */
            User::where('id', Auth::id())->update(['user_role_id' => 30, 'retired_at' => now()]);
        }
        return redirect('/procedure');
    }
}