<?php

declare(strict_types=1);

namespace App\Http\Controllers\Procedure;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

class DoRetireProcedureController extends Controller
{

    /**
     * ユーザーを引退させるコントローラー
     *
     * @return Redirector|RedirectResponse
     */
    public function __invoke(): Redirector | RedirectResponse
    {
        return redirect('/procedure');
    }
}