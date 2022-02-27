<?php

declare(strict_types=1);

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserInfo;
use Auth;
use Illuminate\Contracts\Auth\Access\Gate;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class ShowIndividualUserController extends Controller
{
    /** @var Gate*/
    private $gate;
    public function __construct(Gate $gate)
    {
        $this->gate = $gate;
    }
    /**
     * 個別のユーザー情報ページを表示するコントローラー
     *
     * @return View|Factory
     */
    public function __invoke(int $user_id): View|Factory
    {
        $userInfo = UserInfo::where('user_id', $user_id)->first();
        return view('user.individual', ['gate' => $this->gate, 'userInfo' => $userInfo]);
    }
}