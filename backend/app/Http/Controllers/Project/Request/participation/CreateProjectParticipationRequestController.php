<?php

declare(strict_types=1);

namespace App\Http\Controllers\Project\Request\participation;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Http\Request;

class CreateProjectParticipationRequestController extends Controller
{
    /**
     * プロジェクト参加リクエストを作成するコントローラー
     *
     * @return Redirector|RedirectResponse
     */
    public function __invoke(): Redirector|RedirectResponse
    {
        return redirect('/project/' . '$project_id' . '/request/participation');
    }
}
