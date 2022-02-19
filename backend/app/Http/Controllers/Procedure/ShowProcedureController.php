<?php

namespace App\Http\Controllers\Procedure;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;


class ShowProcedureController extends Controller
{
    /**
     * 手続きページを表示するコントローラー
     *
     * @return View|Factory
     */
    public function __invoke(): View|Factory
    {
        return view('procedure.index', []);
    }
}