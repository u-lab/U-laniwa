<?php

declare(strict_types=1);

namespace App\Http\Controllers\Project\Request\participation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class ShowProjectParticipationRequestController extends Controller
{
    /**
     * プロジェクト参加リクエストを表示するコントローラー
     *
     * @return View|Factory
     */
    public function __invoke(): View|Factory
    {
        return view('project.request.participation.index', []);
    }
}