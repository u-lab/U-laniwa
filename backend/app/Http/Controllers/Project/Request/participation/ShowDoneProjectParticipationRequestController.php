<?php

declare(strict_types=1);

namespace App\Http\Controllers\Project\Request\participation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class ShowDoneProjectParticipationRequestController extends Controller
{
    /**
     * プロジェクト参加リクエストを送信完了しましたよって伝える表示をするコントローラー
     *
     * @return View|Factory
     */
    public function __invoke(): View|Factory
    {
        return view('project.request.participation.done', []);
    }
}