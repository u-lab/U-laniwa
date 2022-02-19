<?php

declare(strict_types=1);

namespace App\Http\Controllers\Procedure;

use App\Http\Controllers\Controller;
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
        return redirect('/procedure');
    }
}