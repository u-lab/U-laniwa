<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

class DoChangeGenerationAdminController extends Controller
{
    /**
     * 盛大交代をするコントローラー
     *
     *
     */
    public function __invoke()
    {
        return redirect('/admin');
    }
}