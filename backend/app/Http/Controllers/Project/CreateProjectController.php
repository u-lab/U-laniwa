<?php

declare(strict_types=1);

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;

class CreateProjectController extends Controller
{
    /**
     * プロジェクトを作成するコントローラー
     *
     * @return Redirector|RedirectResponse
     */
    public function __invoke(): Redirector|RedirectResponse
    {
        return redirect('/project');
    }
}
