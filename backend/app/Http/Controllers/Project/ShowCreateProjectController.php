<?php

declare(strict_types=1);

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class ShowCreateProjectController extends Controller
{
    /**
     * プロジェクト作成ページを表示するコントローラー
     *
     * @return void
     */
    public function __invoke(): View |Factory
    {
        return view('project.create', []);
    }
}