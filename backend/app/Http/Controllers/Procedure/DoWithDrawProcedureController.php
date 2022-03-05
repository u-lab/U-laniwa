<?php

declare(strict_types=1);

namespace App\Http\Controllers\Procedure;

use App\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

class DoWithDrawProcedureController extends Controller
{

    /**
     * ユーザーを退会させるコントローラー
     *
     * @return Redirector|RedirectResponse
     */
    public function __invoke(): Redirector | RedirectResponse
    {
        User::where('id', Auth::id())->delete();
        return redirect('/procedure');
    }
}