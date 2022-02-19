<?php

declare(strict_types=1);

namespace App\Http\Controllers\Procedure;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DoRegenerateInviteCodeController extends Controller
{

    /**
     * 招待コード生成・再生成
     *
     * @return void
     */
    public function __invoke()
    {
        return redirect('/procedure');
    }
}