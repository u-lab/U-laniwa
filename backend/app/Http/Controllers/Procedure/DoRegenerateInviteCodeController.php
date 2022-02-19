<?php

declare(strict_types=1);

namespace App\Http\Controllers\Procedure;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

class DoRegenerateInviteCodeController extends Controller
{

    /**
     * 招待コード生成・再生成
     *
     * @return Redirector|RedirectResponse
     */
    public function __invoke(): Redirector | RedirectResponse
    {
        return redirect('/procedure');
    }
}
