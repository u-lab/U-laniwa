<?php

declare(strict_types=1);

namespace App\Http\Controllers\Security;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class ShowSecurityController extends Controller
{
    /**
     * セキュリティページを表示するコントローラー
     *
     * @return  View|Factory
     */
    public function __invoke(): View|Factory
    {
        return view('security.index', []);
    }
}